<x-app-layout>
<h1>Browse Courses</h1>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

@if($courses->count())
    <ul>
        @foreach($courses as $course)
            <li style="margin-bottom:20px">
                <h3>{{ $course->title }}</h3>
                <p>{{ $course->description }}</p>
                <p>Price: ${{ $course->price }}</p>

                @if(auth()->user()->enrolledCourses->contains($course->id))
                    <button disabled>Enrolled ✅</button>
                    <a href="{{ route('student.course.view', $course) }}">Go to Course</a>
                @else
                    <form action="{{ route('student.courses.enroll', $course) }}" method="POST" style="display:inline">
                        @csrf
                        <button type="submit">Enroll ➕</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
@else
    <p>No courses available yet.</p>
@endif
</x-app-layout>
