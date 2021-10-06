  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{asset('public/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar overflow-hidden">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-header">GENERAL</li> 
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cart-arrow-down"></i>
              <p>
                Orders
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview pl-3" id="open-tab-order">
              <li class="nav-item">
                <a href="{{route('orders')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All orders</p> 
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('abandoned-checkouts')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Abandoned checkouts</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-store"></i>
              <p>
                Artworks
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview pl-3" id="open-tab-product">
              <li class="nav-item">
                <a href="{{route('artworks')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All artworks</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('collections')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Collections</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('tags')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tags</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('customers')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Customers
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('analytics')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Analytics
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('discounts')}}" class="nav-link">
              <i class="nav-icon fas fa-percent"></i>
              <p>
                Discounts
              </p>
            </a>
          </li>
          <li class="nav-header">SETTINGS</li> 
          <li class="nav-item">
            <a href="{{route('preferences')}}" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Preferences
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>