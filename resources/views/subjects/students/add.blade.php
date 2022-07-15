<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{ route('subjects.students.attach', $subjectId) }}" method="post">
    @csrf
    @foreach($students as $student)
    <div>
        <label for="subject-{{ $student->id }}">{{ $student->name }}</label>
        <input type="checkbox" id="student-{{ $student->id }}" name="students[]" value="{{ $student->id }}">
    </div>
    @endforeach

    <input type="submit">
</form>
</body>
</html>
