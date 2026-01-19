<h1>Add Lesson to {{ $course->title }}</h1>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('instructor.lessons.store', $course) }}">
    @csrf

    <label>Lesson Title</label><br>
    <input type="text" name="title"><br><br>

    <label>Video URL</label><br>
    <input type="text" name="video_url"><br><br>

    <button type="submit">Add Lesson</button>
</form>