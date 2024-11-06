<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
    <span class="brand-text font-weight-light">LOGO</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <!-- <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div> -->
      <div class="info">
        <!-- "auth()->user()->name" ka use karke user ka name get kar sakte hay & 'strtoupper' ke use se uppercase kar sakte hay  -->
        <a href="{{ route('dashboard') }}" class="d-block">Hello "{{ strtoupper(auth()->user()->name) }}"</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href=" {{ route('dashboard') }}" class="nav-link active">
          <i class="far fa-circle nav-icon"></i>
            <p>
          Dashboard
            </p>
          </a>
          <li class="nav-item">
              <a href=" {{ route('register') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Register</p>
              </a>
            </li>
            <li class="nav-item">
              <a href=" {{ route('login') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Login</p>
              </a>
            </li>
            <li class="nav-item">
              <a href=" {{ route('profile') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Edit Profile</p>
              </a>
            </li>
      
        </li>
        <li class="nav-item">
          <a href=" {{ route('logout') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Logout Account</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>