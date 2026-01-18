<h1>Create Course</h1>

<form method="POST" action="{{ route('instructor.courses.store') }}">
    @csrf
    <input type="text" name="title" placeholder="Course Title"><br><br>
    <textarea name="description" placeholder="Course Description"></textarea><br><br>
    <input type="number" name="price" placeholder="Price"><br><br>
    <button type="submit">Save</button>
</form>
