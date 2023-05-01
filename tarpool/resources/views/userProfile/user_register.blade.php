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
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input class="input1" type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input class="input1" type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input class="input1" type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
            <label>Gender</label>
            <div>
                <input class="inputradio" type="radio" name="gender" value="Female">  Female
                <input class="inputradio" type="radio" name="gender" value="Male">  Male
            </div>
        </div>
        <div class="field input">
          <label>Phone Number</label>
          <input class="input1" type="text" name="phone" placeholder="Enter new phone number" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field input">
          <label>Password</label>
          <input class="input1" type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field input">
          <label>Confirm Password</label>
          <input class="input1" type="password" name="confirmPass" placeholder="Confirm your password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Register">
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </section>
  </div>

</body>
</html>