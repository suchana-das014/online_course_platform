<?php
namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('user_id', auth()->id())->get();
        return view('instructor.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('instructor.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Course::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'price' => $request->price ?? 0,
            'status' => 'published',
        ]);

        return redirect()->route('instructor.courses.index');
    }

            public function destroy(Course $course)
        {
            if ($course->user_id !== auth()->id()) {
                abort(403);
            }

            $course->delete();

            return redirect()
                ->route('instructor.courses.index')
                ->with('success', 'Course deleted successfully');
        }


}

