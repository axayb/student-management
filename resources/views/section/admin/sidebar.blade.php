<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/adminboard/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ucfirst(auth()->user()->name)}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
  
    
          <li class="nav-item  {{ request()->is('*students*') || request()->is('*student-marks*') ? ' menu-open' :''}}">
            <a href="#" class="nav-link {{ request()->is('*students*') ? ' active' :''}} " >
              <i class="nav-icon fas fa-user-circle "></i>
              <p>
                Student Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{route('admin.students.index')}}" class="nav-link {{ request()->is('*students*') ? 'active' :''}}">
                  <i class="far fa-circle  nav-icon"></i>
                  <p>Students</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.student-marks.index')}}" class="nav-link {{request()->is('*student-marks*') ? 'active':''}}">
                  <i class="far fa-circle  nav-icon"></i>
                  <p>Student marks</p>
                </a>
              </li>
            </ul>
          </li>

       

          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          <i class="far fa-user nav-icon"></i>
             {{ __('Logout') }}
            </a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>