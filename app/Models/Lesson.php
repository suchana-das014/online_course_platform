<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['course_id', 'title', 'content', 'video_url'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function completedByUsers()
{
    return $this->belongsToMany(
        \App\Models\User::class,
        'lesson_user'
    )->withPivot('completed_at');
}

}
