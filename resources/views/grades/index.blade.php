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
            /* margin-left: 100px; */
        }
        .form{
            /*margin-left: 30px;*/
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
    </style>
</head>
<body>
<div class="form">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Grade</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($grades as $grade)
            <tr>
                <td>{{ $grade->name }}</td>
                <td>
                    <div class="button">
                            <form class="action" action="{{ route('grades.edit', $grade->id) }}" method="get">
                                <input class="btn btn-primary btn-lg" type="submit" name="form_click" value="Edit" type="submit" value="Edit">
                            </form>

                            <form class="action delete" action="{{ route('grades.delete', $grade->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-primary btn-lg" type="submit" name="form_click" value="Delete" type="submit" value="Delete">
                            </form>
                    </div>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<a class="btn btn-success" href="{{ route('grades.create') }}">Create</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
