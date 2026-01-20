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

                 <!-- DELETE BUTTON -->
                <form action="{{ route('instructor.courses.destroy', $course) }}"
                      method="POST"
                      style="display:inline"
                      onsubmit="return confirm('Are you sure you want to delete this course?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="color:red">
                        🗑 Delete
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
@else
    <p>No courses created yet.</p>
@endif
