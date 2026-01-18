<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $courses = auth()->user()->enrolledCourses;
        return view('student.dashboard', compact('courses'));
    }
}
