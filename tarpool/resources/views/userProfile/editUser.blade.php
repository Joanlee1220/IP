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
      <form method="post" action="{{route('cp_users.update',$id)}}">
      @csrf
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input class="input1" type="text" id="fname" name="fname" value="{{$cpuser->fname}}">
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input class="input1" type="text" id="lname" name="lname" value="{{$cpuser->lname}}">
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input class="input1" type="text" id="email" name="email" value="{{$cpuser->email}}">
        </div>
        <div class="field input">
          <label>Password</label>
          <input class="input1" type="password" id="password" name="password" value="{{$cpuser->password}}">
          <i class="fas fa-eye" onclick="togglePasswordVisibility()"></i>
        </div>
        <div class="field input">
            <label>Gender</label>
            <div>
                <input class="inputradio" type="radio" id="gender" name="gender" value="female" {{$cpuser->gender == 'female' ? 'selected' : ''}}>  Female
                <input class="inputradio" type="radio" id="gender" name="gender" value="male" {{$cpuser->gender == 'male' ? 'selected' : ''}}>  Male
            </div>
        </div>
        <div class="field input">
          <label>Phone Number</label>
          <input class="input1" type="text" id="phone_number" name="phone_number" value="{{$cpuser->phone_number}}">
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" id="img" name="img" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
          <input class="input1" type="hidden" id="status" name="status" value="active">
          <input class="input1" type="hidden" id="verification_status" name="verification_status" value="verified">
        <div class="field button">
          <input type="submit" name="submit" value="Save">
        </div>
      </form>
    </section>
  </div>

<script>
    function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var confirmInput = document.getElementById("confirmPass");
    
    if (passwordInput.type === "password" || confirmInput.type === "password") {
        passwordInput.type = "text";
        confirmInput.type = "text";
    } else {
        passwordInput.type = "password";
        confirmInput.type = "password";
    }
    }
</script>
</body>
</html>