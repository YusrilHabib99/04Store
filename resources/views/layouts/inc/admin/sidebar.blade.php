<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <!-- Dashboard-->
      <li class="nav-item {{ Request::is('admin/dashboard') ? 'active':'' }}">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
          <i class="mdi mdi-speedometer menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <!-- End Dashboard-->

      <!-- Sales -->
      <li class="nav-item {{ Request::is('admin/orders') ? 'active':'' }}">
        <a class="nav-link" href="{{url('admin/orders')}}">
          <i class="mdi mdi mdi-sale menu-icon"></i>
          <span class="menu-title">Pesanan</span>
        </a>
      </li>
      <!-- End Sales -->

      <!-- Kategori-->
      <li class="nav-item {{ Request::is('admin/category*') ? 'active':'' }}">
        <a class="nav-link" data-bs-toggle="collapse"
          href="#category"
          aria-expanded="{{ Request::is('admin/category*') ? 'true':'false' }}">

          <i class="mdi mdi mdi-view-list menu-icon"></i>
          <span class="menu-title">Kategori</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ Request::is('admin/category*') ? 'show':'' }}" id="category">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> 
              <a class="nav-link {{ Request::is('admin/category/create') ? 'active':'' }}" href="{{ url('admin/category/create') }}">Tambah Kategori</a>
            </li>
            <li class="nav-item"> 
              <a class="nav-link {{ Request::is('admin/category') || Request::is('admin/category/*/edit') ? 'active':'' }}" href="{{ url('admin/category') }}">Lihat Kategori</a>
            </li>
          </ul>
        </div>
      </li>
      <!-- End Kategori-->

      <!-- Produk-->
      <li class="nav-item {{ Request::is('admin/products*') ? 'active':'' }}">
        <a class="nav-link" data-bs-toggle="collapse" 
          href="#products"
          aria-expanded="{{ Request::is('admin/products*') ? 'true':'false' }}"
          >

          <i class="mdi mdi-plus-circle menu-icon"></i>
          <span class="menu-title">Produk</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ Request::is('admin/products*') ? 'show':'' }}" id="products">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> 
              <a class="nav-link {{ Request::is('admin/products/create') ? 'active':'' }}" href="{{ url('admin/products/create') }}">Tambah Produk</a>
            </li>
            <li class="nav-item"> 
              <a class="nav-link {{ Request::is('admin/products') || Request::is('admin/products/*/edit') ? 'active':'' }}" href="{{ url('admin/products') }}">Lihat Produk</a>
            </li>
          </ul>
        </div>
      </li>
      <!-- End Produk-->

      <!-- Brand -->
      <li class="nav-item {{ Request::is('admin/brands') ? 'active':'' }}">
        <a class="nav-link" href="{{ url('admin/brands') }}">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Brands</span>
        </a>
      </li>
      <!-- End Brand -->

      <!-- User -->
      <li class="nav-item {{ Request::is('admin/users*') ? 'active':'' }}">
        <a class="nav-link" data-bs-toggle="collapse" 
          href="#users" 
          aria-expanded="{{ Request::is('admin/users*') ? 'true':'false' }}" 
          aria-controls="users"
          >
          <i class="mdi mdi-account-multiple-plus menu-icon"></i>
          <span class="menu-title">Users</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ Request::is('admin/users*') ? 'show':'' }}" id="users">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> 
              <a class="nav-link {{ Request::is('admin/users/create') ? 'active':'' }}" href="{{ url('admin/users/create') }}">Tambah User</a>
            </li>
            <li class="nav-item"> 
              <a class="nav-link {{ Request::is('admin/users') || Request::is('admin/users/*/edit') ? 'active':'' }}" href="{{ url('admin/users') }}">Lihat User</a>
            </li>
          </ul>
        </div>
      </li>
      <!-- End User -->

      <!-- Home Slider -->
      <li class="nav-item {{ Request::is('admin/sliders') ? 'active':'' }}">
        <a class="nav-link" href="{{ url('admin/sliders') }}">
          <i class="mdi mdi-view-carousel menu-icon"></i>
          <span class="menu-title">Home Slider</span>
        </a>
      </li>
      <!-- End Home Slider -->

      <!-- Settings -->
      <li class="nav-item {{ Request::is('admin/settings') ? 'active':'' }}">
        <a class="nav-link" href="{{ url('admin/settings') }}">
          <i class="mdi mdi-settings menu-icon"></i>
          <span class="menu-title">Settings</span>
        </a>
      </li>
      <!-- End Settings -->

    </ul>
  </nav>
