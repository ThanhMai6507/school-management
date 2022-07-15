<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subjects</title>
</head>
<body>

<a href="{{ route('students.subjects.attach', $student->id) }}">Add subject</a>
    <table>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
        @foreach($subjects as $subject)
            <tr>
                <td>{{ $subject->name }}</td>
                <td>
                    <form action="{{ route('students.subjects.delete', ['studentId' => $student->id, 'subjectId' => $subject->id]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
