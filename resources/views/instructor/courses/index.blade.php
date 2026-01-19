<h1>My Courses</h1>

<a href="{{ route('instructor.courses.create') }}">
    ➕ Create New Course
</a>

<hr>

@if($courses->count())
    <ul>
        @foreach($courses as $course)
            <li style="margin-bottom:15px">
                <strong>{{ $course->title }}</strong>
                <br>

                <a href="{{ route('instructor.lessons.create', $course) }}">
                    ➕ Add Lessons
                </a>
            </li>
        @endforeach
    </ul>
@else
    <p>No courses created yet.</p>
@endif
