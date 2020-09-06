
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 wrapper">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('images/profile_img.jpg') }}" alt="admin pic" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      
      <p>pashupatisah</p>
    </a>

    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link active">
              <i class="fa fa-th-list"></i> <p>Highlights</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('user.index')}}" class="nav-link ">
              <i class="fas fa-users"></i> <p>Users</p>
            </a>
          </li>  
          <li class="nav-item">
            <a href="{{ route('product.index')}}" class="nav-link ">
              <i class="fas fa-cart-arrow-down"></i> <p>Products</p>
            </a>
          </li>  
          <li class="nav-item">
            <a href="{{ route('room.index')}}" class="nav-link ">
              <i class="fas fa-home"></i> <p>Rooms</p>
            </a>
          </li>  
          <li class="nav-item has-treeview">
            <a href="{{ route('vehicle.index')}}" class="nav-link ">
              <i class="fas fa-truck-monster"></i> <p>Vehicles</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('category.index')}}" class="nav-link ">
              <i class="fas fa-layer-group"></i> <p>Category</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('city.index')}}" class="nav-link ">
              <i class="fas fa-city"></i> <p>City</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('street.index')}}" class="nav-link ">
              <i class="fas fa-road"></i> <p>Streets</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('advertisement.index')}}" class="nav-link ">
              <i class="fas fa-ad"></i> <p>Advertisement</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('searchRequest.index')}}" class="nav-link ">
              <i class="fab fa-searchengin"></i> <p>Product Search</p>
            </a>
          </li> 
        </ul>
      </nav>
    </div>
  </aside>