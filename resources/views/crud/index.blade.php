<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud laravel 8</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
            <h3 class="mt-5">Enter your information</h3>
            <hr>
            <form action="{{ route('store.crud') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Name :</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name"
                        value="{{ old('name') }}">
                    <span style="color:red">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="">favourite color :</label>
                    <input type="text" name="color" class="form-control"
                        placeholder="Enter color"value="{{ old('color') }}">
                    <span style="color:red">
                        @error('color')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="">Email :</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email"
                        value="{{ old('email') }}">
                    <span style="color:red">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="">Image :</label>
                    <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                    <span style="color:red">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>

                <br>
                <table class="table table-striped">
                    <thead>
                        <th>Name:</th>
                        <th>Color:</th>
                        <th>Email:</th>
                        <th>Image:</th>
                        <th>Actions:</th>
                    </thead>
                    @foreach ($data as $list)
                        <tr>

                            <td>{{ $list->name }}</td>
                            <td>{{ $list->color }}</td>
                            <td>{{ $list->email }}</td>
                            <td><img src="/storage/{{ $list->image}}" height="100" class="img-fit m-2  border p-3 ">
                            </td>
                            <td>
                             <div class="btn-group">
                                <a href="{{ route('edit.crud',$list->id) }}" class="btn btn-primary btn-xs">Edit</a>
                                <a href="{{ route('destroy.crud',$list->id) }}" class="btn btn-danger btn-xs">Delete</a>

                                {{-- <form action=" {{route('destroy.crud',[$list->id])}}" method="post">
                                  @csrf

                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form> --}}
                             </div>
                            </td>
                        </tr>
                            {{-- <td><img src="{{ $list->image }}" width="100px"></td>        </tr> --}}
                    @endforeach
                </table>
        </div>
    </div>
    </form>
</body>

</html>
