<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User | Forget Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">

  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Forget Password</p>
<!-- Learn Forget Password vedio :- https://www.youtube.com/watch?v=XiARKCj6Sgc&t=226s !-->
      <form action="{{ route('stepforgetpassword') }}" method="POST">
      @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" id="email">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
            <p class="error-message">{{$message}}</p>
          @enderror
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col">
            <button type="submit" class="btn btn-danger btn-block">Forget Password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3">
        <a href="{{route('login')}}" class="btn btn-success btn-block">Log In</a>
      </p>
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