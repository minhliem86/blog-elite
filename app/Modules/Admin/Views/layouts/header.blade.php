  <header class="main-header">

    <!-- Logo -->
    <a href="{!!url('/admin/dashboard')!!}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>LITE</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>ELITE</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          @if(Auth::admin()->get()->hasRole('admin'))
          <!--MANAGE USER-->
        <!--
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user"></i> User Management
            </a>
            <ul class="dropdown-menu">
              <li>
                <ul class="menu">
                  <li><a href="{!!route('admin.getCreateUser')!!}"><i class="fa fa-plus-square"></i> Add User </a></li>
                  <li><a href="{!!route('admin.getListUser')!!}"><i class="fa fa-calendar-o" aria-hidden="true"></i> User Management</a></li>
                </ul>
              </li>
            </ul>
          </li>
          -->
          <!--END-->
          @endif





          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{!!asset('public/assets/backend')!!}/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{!!Auth::admin()->get()->name!!}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{!!asset('public/assets/backend')!!}/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <b>{!!Auth::admin()->get()->name!!}</b>
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                      <a href="{!!route('admin.getChangePass') !!}" class="btn btn-default btn-flat">Thay đổi mật khẩu</a>
                </div>
                <div class="pull-right">
                  <a href="{!!route('admin.getLogout')!!}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
