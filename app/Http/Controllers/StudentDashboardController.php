<?php

namespace App\Http\Controllers;
use App\Models\Course;

use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $courses = auth()->user()->enrolledCourses;
        return view('student.dashboard', compact('courses'));
    }


    public function viewCourse(Course $course)
    {
        $lessons = $course->lessons;
        return view('student.course', compact('course', 'lessons'));
    }


}
