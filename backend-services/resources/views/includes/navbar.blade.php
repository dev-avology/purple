<!-- Navbar -->
<nav class="main-header navbar navbar-expand fixed-top navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- SEARCH FORM -->
  <form class="form-inline ml-3 w-100">
    <div class="input-group input-group-md w-100">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Administrator
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
        <a class="dropdown-item" href="#">Update Password</a>
        <a 
          class="dropdown-item" 
          href="javascript:void(0)" 
          onclick="event.preventDefault();
          document.getElementById('user-logout-form').submit();"  >
          Logout
        </a>
        <form id="user-logout-form" action="{{ route('logout') }}" method="POST"
                style="display: none;">
              @csrf
          </form>
      </div>
    </li>
  </ul>
</nav>
<!-- /.navbar -->