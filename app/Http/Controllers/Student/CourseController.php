<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('student.courses.index', compact('courses'));
    }

    public function enroll(Course $course)
    {
        Enrollment::firstOrCreate([
            'user_id' => auth()->id(),
            'course_id' => $course->id,
        ]);

        return redirect()->back()->with('success', 'Enrolled successfully!');
    }
}
