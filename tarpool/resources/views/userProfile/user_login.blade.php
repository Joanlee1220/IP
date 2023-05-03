<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Carpool System | Tarpool</title>
  <!-- Link to your style.css file -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <!-- Link to Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>

<body>
  <div class="wrapper">
    <section class="form login">
      <header>Tarpool</header>
      <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="field input">
          <label>Email</label>
          <input id="email" type="text" class="input1 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          <!--<input class="input1" type="text" id="email" name="email" placeholder="Enter your email" required>-->
          @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="field input">
          <label>Password</label>
          <input id="password" type="password" class="input1 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          <!--<input class="input1" type="password" id="password" name="password" placeholder="Enter your password" required>-->
          <i class="fas fa-eye" onclick="togglePasswordVisibility()"></i>
          @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Login">
        </div>
        @if (Route::has('password.request'))
          <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
          </a>
        @endif
      </form>
      <div class="link">Not yet signed up? <a href="http://localhost:8000/cp_users/create">Signup now</a></div>
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
</script>
</body>
</html>