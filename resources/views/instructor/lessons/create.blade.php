<h1>Add Lesson for: {{ $course->title }}</h1>

<form method="POST" action="{{ route('instructor.lessons.store', $course) }}">
    @csrf

    <input type="text" name="title" placeholder="Lesson Title" required><br><br>

    <textarea name="content" placeholder="Lesson Content"></textarea><br><br>

    <input type="url" name="video_url" placeholder="Video URL"><br><br>

    <button type="submit">Save Lesson</button>
</form>
