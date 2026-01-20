@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $course->title }}</h1>
    <p>{{ $course->description }}</p>
    <hr>

    @php
        $totalLessons = $course->lessons->count();
        $completedLessons = auth()->user()->completedLessons->whereIn('id', $course->lessons->pluck('id'))->count();
        $progress = $totalLessons ? round(($completedLessons / $totalLessons) * 100) : 0;
    @endphp

    <h4>Course Progress: {{ $progress }}%</h4>
    <div style="background:#eee; width:100%; height:20px; border-radius:10px; margin-bottom:20px;">
        <div style="background:green; width:{{ $progress }}%; height:100%; border-radius:10px;"></div>
    </div>

    <h3>Lessons</h3>
    @if($totalLessons)
        <ul>
            @foreach($course->lessons as $lesson)
                @php
                    $completed = auth()->user()->completedLessons->contains($lesson->id);
                @endphp
                <li style="margin-bottom:15px">
                    <strong>{{ $lesson->title }}</strong>
                    @if($completed)
                        <span style="color:green">✔ Completed</span>
                    @else
                        <form action="{{ route('student.lesson.complete', $lesson) }}" method="POST" style="display:inline">
                            @csrf
                            <button type="submit" style="background:blue;color:white;padding:2px 5px;border:none;border-radius:3px;">
                                Mark as Complete
                            </button>
                        </form>
                    @endif

                    @if($lesson->video_url)
                        <br>
                        <video width="400" controls>
                            <source src="{{ $lesson->video_url }}" type="video/mp4">
                            Your browser does not support HTML5 video.
                        </video>
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <p>No lessons added yet.</p>
    @endif
</div>
@endsection
