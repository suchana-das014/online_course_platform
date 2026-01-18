<h1>Available Courses</h1>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

@foreach($courses as $course)
    <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px">
        <h3>{{ $course->title }}</h3>
        <p>{{ $course->description }}</p>

        <form method="POST" action="{{ route('student.courses.enroll', $course) }}">
            @csrf
            <button type="submit">Enroll</button>
        </form>
    </div>
@endforeach
