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
    // ensure student is enrolled
    if (! auth()->user()->enrolledCourses()->where('course_id', $course->id)->exists()) {
        abort(403);
    }

    $course->load('lessons'); // eager load lessons

    $user = auth()->user();

    $totalLessons = $course->lessons->count();

    $completedLessons = $user->completedLessons()
        ->whereIn('lesson_id', $course->lessons->pluck('id'))
        ->count();

    $progress = $totalLessons > 0
        ? round(($completedLessons / $totalLessons) * 100)
        : 0;

    $completedLessonIds = $user->completedLessons
        ->pluck('lesson_id') // assuming pivot table or completed lessons relation
        ->toArray();

    return view('student.courses.show', compact(
        'course',
        'progress',
        'totalLessons',
        'completedLessons',
        'completedLessonIds'
    ));
}




}
