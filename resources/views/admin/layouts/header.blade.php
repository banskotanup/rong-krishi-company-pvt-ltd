<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="/admin/#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('admin_dashboard')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> --}}

      <!-- Messages Dropdown Menu -->
      {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="/admin/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="/admin/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="/admin/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> --}}
      <!-- Notifications Dropdown Menu -->

      @php
       $getUnreadNotification = App\Models\Notification::getUnreadNotification();   
      @endphp
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          @if($getUnreadNotification->count() > 0)
          <span class="badge badge-warning navbar-badge">{{$getUnreadNotification->count()}}</span>
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{$getUnreadNotification->count()}} Notifications</span>
          
          @foreach($getUnreadNotification as $noti)
          <div class="dropdown-divider"></div>
          <a href="{{$noti->url}}?noti_id={{$noti->id}}" class="dropdown-item" >
            <div style="height: 100%; width: 100%; overflow: hidden;">
              {{$noti->message}}
            </div>
            <span class="text-muted text-sm">{{$noti->created_at}}</span>
          </a>
          @endforeach
          <div class="dropdown-divider"></div>
          <a href="{{url('/notification')}}" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="logout_confirmation(event)" href="{{url('log_out')}}" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/admin/index3.html" class="brand-link">
          <span class="brand-text font-weight-light" style="margin:10px;"><img style="height: 50px; width:50px;" src="/trslogo.png" alt=""><strong style="font-weight: 500; color: white;"> Rongkrishi Admin</strong></span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="/user_logo.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="/admin/#" class="d-block">{{ Auth::user()->name ?? 'None'}}</a>
              {{-- {{ Auth::user()->name }} use it later & create a profile section--}}  
            </div>
          </div>
    
    
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="{{url('admin_dashboard')}}" class="nav-link {{ Request::is('admin_dashboard') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('inventory')}}" class="nav-link {{ Request::is('inventory') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-store-alt"></i>
                  <p>
                    Our Inventory
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin_list')}}" class="nav-link {{ Request::is('admin_list') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-user-shield"></i>
                  <p>
                    Admin
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('member_list')}}" class="nav-link {{ Request::is('member_list') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-user-plus"></i>
                  <p>
                    Member
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('order_list')}}" class="nav-link {{ Request::is('order_list') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-shopping-bag"></i>
                  <p>
                    Orders
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('category_list')}}" class="nav-link {{ Request::is('category_list') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-list"></i>
                  <p>
                    Category
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('sub_category_list')}}" class="nav-link {{ Request::is('sub_category_list') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-layer-group"></i>
                  <p>
                    Sub-Category
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('product_list')}}" class="nav-link {{ Request::is('product_list') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-list-alt"></i>
                  <p>
                    Product List
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('discount_list')}}" class="nav-link {{ Request::is('discount_list') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-code"></i>
                  <p>
                    Discount Code
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('shipping_charge_list')}}" class="nav-link {{ Request::is('shipping_charge_list') ? 'active' : ''}}">
                  <i class="nav-icon fab fa-gg"></i>
                  <p>
                    Shipping Charge
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('blog_category_list')}}" class="nav-link {{ Request::is('blog_category_list') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-align-justify"></i>
                  <p>
                    Blog Category
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin_blog')}}" class="nav-link {{ Request::is('admin_blog') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-blog"></i>
                  <p>
                    Blog
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('contactus')}}" class="nav-link {{ Request::is('contactus') ? 'active' : ''}}">
                  <i class="nav-icon 	fas fa-inbox"></i>
                  <p>
                    Contact Us
                  </p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{url('aboutus')}}" class="nav-link {{ Request::is('aboutus') ? 'active' : ''}}">
                  <i class="nav-icon 	fas fa-info"></i>
                  <p>
                    About Us
                  </p>
                </a>
              </li>

              
              <li class="nav-item">
                <a href="{{url('our_team')}}" class="nav-link {{ Request::is('our_team') ? 'active' : ''}}">
                  <i class="nav-icon 	fas fa-users"></i>
                  <p>
                    Our Team
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('system_setting')}}" class="nav-link {{ Request::is('system_setting') ? 'active' : ''}}">
                  <i class="nav-icon 	fas fa-cog"></i>
                  <p>
                    System Setting
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('payment_setting')}}" class="nav-link {{ Request::is('payment_setting') ? 'active' : ''}}">
                  <i class="nav-icon 	fas fa-cogs"></i>
                  <p>
                    Payment Setting
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('smtp')}}" class="nav-link {{ Request::is('smtp') ? 'active' : ''}}">
                  <i class="nav-icon 	fas fa-server"></i>
                  <p>
                    SMTP Setting
                  </p>
                </a>
              </li>
    
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>