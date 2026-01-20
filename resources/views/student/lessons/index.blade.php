<h1>{{ $course->title }}</h1>

@if($lessons->count())
    <ul>
        @foreach($lessons as $lesson)
            <li>
                {{ $lesson->title }}
                @if($lesson->video_url)
                    - <a href="{{ $lesson->video_url }}" target="_blank">Watch Video</a>
                @endif
            </li>
        @endforeach
    </ul>
@else
    <p>No lessons added yet.</p>
@endif
