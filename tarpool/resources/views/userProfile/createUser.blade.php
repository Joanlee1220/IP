<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Link to your style.css file -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <!-- Link to Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <title>Carpool System | Tarpool</title>
</head>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Tarpool</header>
      <form method="post" action="{{url('cp_users')}}">
      @csrf
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input class="input1" type="text" id="fname" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input class="input1" type="text" id="lname" name="lname" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input class="input1" type="text" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input class="input1" type="password" id="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye" onclick="togglePasswordVisibility()"></i>
        </div>
        <!--<div class="field input">
          <label>Confirm Password</label>
          <input class="input1" type="password" id="confirmPass" name="confirmPass" placeholder="Confirm your password" required>
          <i class="fas fa-eye" onclick="togglePasswordVisibility()"></i>
        </div>-->
        <div class="field input">
            <label>Gender</label>
            <div>
                <input class="inputradio" type="radio" id="gender" name="gender" value="female">  Female
                <input class="inputradio" type="radio" id="gender" name="gender" value="male">  Male
            </div>
        </div>
        <div class="field input">
          <label>Phone Number</label>
          <input class="input1" type="text" id="phone_number" name="phone_number" placeholder="Enter new phone number" required>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" id="img" name="img" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
          <input class="input1" type="hidden" id="status" name="status" value="active">
        <!--<div class="field input">
          <label>Owner</label>
          <input class="input1" type="text" id="is_vehicle_owner" name="is_vehicle_owner" placeholder="1" required>
        </div>
        <div class="field input">
          <label>Model</label>
          <input class="input1" type="text" id="vehicle_model" name="vehicle_model" placeholder="Honda" required>
        </div>
        <div class="field input">
          <label>Color</label>
          <input class="input1" type="text" id="vehicle_color" name="vehicle_color" placeholder="Black" required>
        </div>
        <div class="field input">
          <label>Plate</label>
          <input class="input1" type="text" id="vehicle_plate" name="vehicle_plate" placeholder="CCC1111" required>
        </div>-->
          <input class="input1" type="hidden" id="verification_status" name="verification_status" value="verified">
        <!--<div class="field input">
          <label>Created</label>
          <input class="input1" type="date" id="created_at" name="created_at" required>
        </div>
        <div class="field input">
          <label>Updated</label>
          <input class="input1" type="date" id="updated_at" name="updated_at" required>
        </div>-->
        <div class="field button">
          <input type="submit" name="submit" value="Register">
        </div>
      </form>
      <div class="link">Already signed up? <a href="http://localhost:8000/cp_users">Login now</a></div>
    </section>
  </div>

<script>
    function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
    }


/*function validatePasswords() {
    var password = document.getElementById("password").value;
    var confirmPass = document.getElementById("confirmPass").value;
    if (password !== confirmPass) {
        alert("Passwords do not match!");
    } 
}*/
</script>
</body>
</html>