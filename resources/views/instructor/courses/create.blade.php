<h1>Create Course</h1>

<form method="POST" action="{{ route('instructor.courses.store') }}">
    @csrf

    <label>Course Title</label><br>
    <input type="text" name="title"><br><br>

    <label>Description</label><br>
    <textarea name="description"></textarea><br><br>

    <button type="submit">Create Course</button>
</form>
