<h1>My Courses</h1>

<a href="{{ route('instructor.courses.create') }}">
    ➕ Create New Course
</a>

<hr>

@if($courses->count())
    <ul>
        @foreach($courses as $course)
            <li>
                <strong>{{ $course->title }}</strong>
            </li>
        @endforeach
    </ul>
@else
    <p>No courses created yet.</p>
@endif
