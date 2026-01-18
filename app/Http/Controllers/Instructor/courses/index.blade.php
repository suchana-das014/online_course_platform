<h1>My Courses</h1>

<a href="{{ route('instructor.courses.create') }}">Create Course</a>

@foreach($courses as $course)
    <p>{{ $course->title }}</p>
@endforeach
