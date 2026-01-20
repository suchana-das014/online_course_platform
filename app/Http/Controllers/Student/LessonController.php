<?php
namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function complete(Lesson $lesson)
    {
        auth()->user()->completedLessons()
            ->syncWithoutDetaching([
                $lesson->id => ['completed_at' => now()]
            ]);

        return back()->with('success', 'Lesson marked as completed!');
    }
}
