<?php
namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function create(Course $course)
    {
        return view('instructor.lessons.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'nullable',
            'video_url' => 'nullable|url',
        ]);

        Lesson::create([
            'course_id' => $course->id,
            'title' => $request->title,
            'content' => $request->content,
            'video_url' => $request->video_url,
        ]);

        return redirect()
            ->route('instructor.courses.index')
            ->with('success', 'Lesson added successfully');
    }
}
