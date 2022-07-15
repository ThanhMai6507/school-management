<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .delete{
            float:right;
        }
        .form{
            width: 100%;
        }
        .button{
        }
        .action{
            float: left;
        }
        .delete{
            margin-left: 20px;
        }
        .btn{
            height: 48px !important;
        }
    </style>
</head>
<body>
<div class="form">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Grade</th>
            <th scope="col">Classroom</th>
            <th scope="col">Gender</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->classroom->grade->name }}</td>
                <td>{{ $student->classroom->name }}</td>
                <td>{{ \App\Models\Student::GENDER_MAP[$student->gender] }}</td>
                <td>{{ $student->address }}</td>

                <td>
                    <div class="action">
                        <a class="btn btn-primary" href="{{ route('students.edit', $student->id) }}">Edit</a>

                        <form class="delete" action="{{ route('students.delete', $student->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-primary btn-lg" type="submit" name="form_click" value="Delete" type="submit" value="Delete">
                        </form>

                        <a class="btn btn-primary" href="{{ route('students.subjects.index', $student->id) }}">Subjects</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<a class="btn btn-success" href="{{ route('students.create') }}">Create</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
