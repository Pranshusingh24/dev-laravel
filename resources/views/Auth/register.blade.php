<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User | Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  <style>
    p.error-message{color: red;}
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Register</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Register Your Account</p>
<!-- Learn with this vedio :- https://www.youtube.com/watch?v=4_scUW-e5OQ -->
<!-- (NULL, 'Pranshu', 'pranshusoftgetix@gmail.com', NULL, MD5('pranshusoftgetix')-->
  <form method="POST" action="{{ route('register') }}">
    <!-- Cross-Site Request Forgery @csrf -->
      @csrf
      <div class="mb-3">
          <label for="name">Name</label>
          <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}">
          @error('name')
            <p class="error-message">{{$message}}</p>
          @enderror
        </div>

      <div>
          <label for="email">Email</label>
          <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}">
          @error('email')
            <p class="error-message">{{$message}}</p>
          @enderror
        </div>

      <div>
          <label for="password">Password</label>
          <input type="password" id="password" class="form-control" name="password">
          @error('password')
            <p class="error-message">{{$message}}</p>
          @enderror
        </div>

      <div>
          <label for="password_confirmation">Confirm Password</label>
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
          @error('password_confirmation')
            <p class="error-message">{{$message}}</p>
          @enderror
      </div>

      <button type="submit" class="btn btn-success btn-block mt-2">Register</button>
      <p class="mb-0">
        <a href="{{route('login')}}" class="text-center">Log In</a>
      </p>
  </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>