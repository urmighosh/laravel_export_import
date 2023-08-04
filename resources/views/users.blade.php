<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
        rel="stylesheet"crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>

<body>
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
            </div>

            <div class="col-md-12">
                <form class="row g-3" action="{{ route('import_user') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-auto">
                        <label class="Visually-hidden"></label>
                        <input type="file" class="form-control" name="excel_file">
                    <br>

                        <button type="submit" class="btn btn-primary mb">Upload excel file</button>
                    </div>

                    @error('excel_file')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </form>

                @if (Session::has('import_errors'))
                    @foreach (Session::get('import_errors') as $failure)
                        <div class="alert alert-danger" roe="alert">
                            {{ $failure->errors()[0] }} at line no-{{ $failure->row() }}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <div class="text-center">
                        <h3>USER LIST</h3>
                    </div>
                    <div>
                        <a href="{{route('export_user')}}">Export users to excel file</a>
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users))
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->password }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">No data found</td>
                            </tr>
                        @endif

            </div>
        </div>
    </div>
</body>
</html>
