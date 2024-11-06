<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User | Profile Page</title>

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
  <div class="login-logo">
    <a href="#"><b>Edit Your Profile</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Edit Your Profile</p>
<!-- Learn with this vedio :- https://www.youtube.com/watch?v=4_scUW-e5OQ -->
<!-- (NULL, 'Pranshu', 'pranshusoftgetix@gmail.com', NULL, MD5('pranshusoftgetix')-->
  <form method="POST" action="{{ route('profile') }}">
      @csrf
      <div class="mb-3">
          <label for="name">Name</label>
          <input type="text" id="name" class="form-control" name="name" value="{{ auth()->user()->name }}" required autofocus>
      </div>

      <div>
          <label for="email">Email</label>
          <input type="email" id="email" class="form-control" disabled name="email" value="{{ auth()->user()->email }}" required>
      </div>

      <div>
          <label for="password">Password</label>
          <input type="password" id="password" class="form-control" name="password"  required>
      </div>

      <button type="submit" class="btn btn-success btn-block mt-2">Update</button>
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