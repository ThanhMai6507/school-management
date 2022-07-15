<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .error {
            color: red;
            font-size: 12px;
        }
    </style>
</head>

<body>
<section class=" gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Edit</h3>

                        <form action="{{ route('students.store') }}" method="post" id="register-form">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Classroom</label>
                                <select name="classroom_id" style="margin-bottom: 20px !important;" class="custom-select mr-sm-2" >
                                    @foreach($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">

                                <p @error('name') class="error" @enderror>
                                    @error('name')
                                    <span>{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>

                            <div class="mb-3 col-md-6 mb-4">

                                <h6 class="mb-2 pb-1">Gender: </h6>

                                @foreach(\App\Models\Student::GENDER_MAP as $key => $gender)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="{{ 'gender' . $key }}"
                                           value="{{ $key }}" />
                                    <label class="form-check-label" for="{{ 'gender' . $key }}">{{ $gender }}</label>
                                </div>
                                @endforeach

                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">

                                <p @error('name') class="error" @enderror>
                                    @error('name')
                                    <span>{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>

                            <div class="mt-4 pt-2">
                                <input class="btn btn-primary btn-lg" type="submit" name="form_click" value="Gửi" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>



