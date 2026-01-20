<h1>{{ $course->title }}</h1>

<h3>Lessons</h3>

@if($lessons->count())
    <ul>
        @foreach($lessons as $lesson)
            <li>
                <strong>{{ $lesson->title }}</strong>
                <p>{{ $lesson->content }}</p>

                @if($lesson->video_url)
                    <a href="{{ $lesson->video_url }}" target="_blank">Watch Video</a>
                @endif
            </li>
        @endforeach
    </ul>
@else
    <p>No lessons available yet.</p>
@endif
