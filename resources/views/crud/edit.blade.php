<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}Crud laravel 8</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
</head>

<body>
    <div class="row">
        <div class="col-md-6 md-offset-3 container">
            @if (Session::get('success'))
                <div class="alert alert-success mt-2">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
            @endif
            <h3 class="mt-5">{{$title}} your information</h3>
            <hr>
            <form action="{{ route('update.crud',$data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="cid" value="$data->id">
                <div class="form-group">
                    <label for="">Name :</label>
                    <input type="text" name="name" class="form-control"
                        value="{{ $data->name }}">
                    <span style="color:red">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="">favourite color :</label>
                    <input type="text" name="color" class="form-control"
                     value="{{ $data->color }}">
                    <span style="color:red">
                        @error('color')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="">Email :</label>
                    <input type="email" name="email" class="form-control"
                        value="{{$data->email }}">
                    <span style="color:red">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="">Image :</label>

                    <img src="/storage/{{ $data->image}}" height="200" class="img-fit m-2  border p-3 ">
                        <input type="file" name="image" class="form-control" >
                    <span style="color:red">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </div>


        </div>
    </div>
    </form>
</body>

</html>
