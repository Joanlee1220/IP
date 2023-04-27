<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>User Index Page</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <br />
            @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
            @endif
            <td>
                <a href="http://localhost:8000/accs/create" class="btn btn-warning">Add User</a>
            </td>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                        <th>Vehicle Model</th>
                        <th>Vehicle Plate Number</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($accs as $acc)
                    <tr>
                        <td>{{$acc->id}}</td>
                        <td>{{$acc->full_name}}</td>
                        <td>{{$acc->email_address}}</td>
                        <td>{{$acc->phone_number}}</td>
                        <td>{{$acc->vehicle_model}}</td>
                        <td>{{$acc->vehicle_plate}}</td>
                        <td>
                            <a href="" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form action="" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
