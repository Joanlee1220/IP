<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add New User</title> 
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body>
        <h2>Add New User</h2><br/> 
        <form method="post" action="{{ url('accs') }}"> 
            @csrf 
            <p> 
                <label for="full_name">Full Name:</label> 
                <input type="text" name="full_name"> 
            </p>
            <p> 
                <label for="email_address">Email Address:</label> 
                <input type="email" name="email_address"> 
            </p> 
            <p> 
                <label for="password">Password:</label> 
                <input type="password" name="password"> 
            </p>
            <p> 
                <label for="gender">Gender:</label> 
                <select name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </p>
            <p> 
                <label for="phone_number">Phone Number:</label> 
                <input type="tel" name="phone_number"> 
            </p> 
            <p> 
                <label for="profile_picture_url">Profile Picture URL:</label> 
                <input type="text" name="profile_picture_url"> 
            </p> 
            <p> 
                <label for="is_vehicle_owner">Are you a vehicle owner?</label> 
                <input type="checkbox" name="is_vehicle_owner" value="1"> 
            </p>
            <p> 
                <label for="vehicle_model">Vehicle Model:</label> 
                <input type="text" name="vehicle_model"> 
            </p> 
            <p> 
                <label for="vehicle_color">Vehicle Color:</label> 
                <input type="text" name="vehicle_color"> 
            </p> 
            <p> 
                <label for="vehicle_plate">Vehicle Plate Number:</label> 
                <input type="text" name="vehicle_plate"> 
            </p> 
            <p> 
                <button type="submit">Submit</button> 
            </p> 
        </form>
    </body>
</html>
