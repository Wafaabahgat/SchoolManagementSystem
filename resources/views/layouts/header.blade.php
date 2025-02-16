   <!--begin::Header-->
   <nav class="app-header navbar navbar-expand bg-body">
       <div class="container-fluid">
           <!--begin::Start Navbar Links-->
           <ul class="navbar-nav">
               <li class="nav-item">
                   <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                       <i class="bi bi-list"></i>
                   </a>
               </li>
           </ul>
           <!--end::Start Navbar Links-->
           <!--begin::End Navbar Links-->
           <ul class="navbar-nav ms-auto">
               <!--begin::Navbar Search-->
               <li class="nav-item">
                   <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                       <i class="bi bi-search"></i>
                   </a>
               </li>
               <!--end::Navbar Search-->
               <!--begin::Messages Dropdown Menu-->
               <li class="nav-item dropdown">
                   <a class="nav-link" data-bs-toggle="dropdown" href="#">
                       <i class="bi bi-chat-text"></i>
                       <span class="navbar-badge badge text-bg-danger">3</span>
                   </a>
                   <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                       <a href="#" class="dropdown-item">
                           <!--begin::Message-->
                           <div class="d-flex">
                               <div class="flex-shrink-0">
                                   <img src="{{ asset('dist/assets/img/user1-128x128.jpg') }}" alt="User Avatar"
                                       class="img-size-50 rounded-circle me-3" />
                               </div>
                               <div class="flex-grow-1">
                                   <h3 class="dropdown-item-title">
                                       Brad Diesel
                                       <span class="float-end fs-7 text-danger"><i class="bi bi-star-fill"></i></span>
                                   </h3>
                                   <p class="fs-7">Call me whenever you can...</p>
                                   <p class="fs-7 text-secondary">
                                       <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                   </p>
                               </div>
                           </div>
                           <!--end::Message-->
                       </a>
                       <div class="dropdown-divider"></div>
                       <a href="#" class="dropdown-item">
                           <!--begin::Message-->
                           <div class="d-flex">
                               <div class="flex-shrink-0">
                                   <img src="{{ asset('dist/assets/img/user8-128x128.jpg') }}" alt="User Avatar"
                                       class="img-size-50 rounded-circle me-3" />
                               </div>
                               <div class="flex-grow-1">
                                   <h3 class="dropdown-item-title">
                                       John Pierce
                                       <span class="float-end fs-7 text-secondary">
                                           <i class="bi bi-star-fill"></i>
                                       </span>
                                   </h3>
                                   <p class="fs-7">I got your message bro</p>
                                   <p class="fs-7 text-secondary">
                                       <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                   </p>
                               </div>
                           </div>
                           <!--end::Message-->
                       </a>
                       <div class="dropdown-divider"></div>
                       <a href="#" class="dropdown-item">
                           <!--begin::Message-->
                           <div class="d-flex">
                               <div class="flex-shrink-0">
                                   <img src="{{ asset('dist/assets/img/user3-128x128.jpg') }}" alt="User Avatar"
                                       class="img-size-50 rounded-circle me-3" />
                               </div>
                               <div class="flex-grow-1">
                                   <h3 class="dropdown-item-title">
                                       Nora Silvester
                                       <span class="float-end fs-7 text-warning">
                                           <i class="bi bi-star-fill"></i>
                                       </span>
                                   </h3>
                                   <p class="fs-7">The subject goes here</p>
                                   <p class="fs-7 text-secondary">
                                       <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                   </p>
                               </div>
                           </div>
                           <!--end::Message-->
                       </a>
                       <div class="dropdown-divider"></div>
                       <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                   </div>
               </li>
               <!--end::Messages Dropdown Menu-->
               <!--begin::Notifications Dropdown Menu-->
               <li class="nav-item dropdown">
                   <a class="nav-link" data-bs-toggle="dropdown" href="#">
                       <i class="bi bi-bell-fill"></i>
                       <span class="navbar-badge badge text-bg-warning">15</span>
                   </a>
                   <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                       <span class="dropdown-item dropdown-header">15 Notifications</span>
                       <div class="dropdown-divider"></div>
                       <a href="#" class="dropdown-item">
                           <i class="bi bi-envelope me-2"></i> 4 new messages
                           <span class="float-end text-secondary fs-7">3 mins</span>
                       </a>
                       <div class="dropdown-divider"></div>
                       <a href="#" class="dropdown-item">
                           <i class="bi bi-people-fill me-2"></i> 8 friend requests
                           <span class="float-end text-secondary fs-7">12 hours</span>
                       </a>
                       <div class="dropdown-divider"></div>
                       <a href="#" class="dropdown-item">
                           <i class="bi bi-file-earmark-fill me-2"></i> 3 new reports
                           <span class="float-end text-secondary fs-7">2 days</span>
                       </a>
                       <div class="dropdown-divider"></div>
                       <a href="#" class="dropdown-item dropdown-footer"> See All Notifications </a>
                   </div>
               </li>
               <!--end::Notifications Dropdown Menu-->
               <!--begin::Fullscreen Toggle-->
               <li class="nav-item">
                   <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                       <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                       <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                   </a>
               </li>
               <!--end::Fullscreen Toggle-->
               <!--begin::User Menu Dropdown-->
               <li class="nav-item dropdown user-menu">
                   <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                       <img src="{{ asset('dist/assets/img/user2-160x160.jpg') }}"
                           class="user-image rounded-circle shadow" alt="User Image" />
                       <span class="d-none d-md-inline"> {{ auth()->user()->name }} </span>
                   </a>
                   <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                       <!--begin::User Image-->
                       <li class="user-header text-bg-primary">
                           <img src="{{ asset('dist/assets/img/user2-160x160.jpg') }}" class="rounded-circle shadow"
                               alt="User Image" />
                           <p>
                               {{ auth()->user()->name }} - Web Developer
                               <small>Member since Nov. 2023</small>
                           </p>
                       </li>
                       <!--end::User Image-->
                       <!--begin::Menu Body-->
                       <li class="user-body">
                           <!--begin::Row-->
                           <div class="row">
                               <div class="col-4 text-center"><a href="#">Followers</a></div>
                               <div class="col-4 text-center"><a href="#">Sales</a></div>
                               <div class="col-4 text-center"><a href="#">Friends</a></div>
                           </div>
                           <!--end::Row-->
                       </li>
                       <!--end::Menu Body-->
                       <!--begin::Menu Footer-->
                       <li class="user-footer">
                           <a href="#" class="btn btn-default btn-flat">Profile</a>
                           <form action="{{ url('logout') }}" method="POST">
                               @csrf
                               <button type="submit" class="btn btn-danger btn-flat float-end">Sign out</button>
                           </form>
                       </li>
                   </ul>
               </li>
           </ul>
       </div>
   </nav>
   <!--end::Header-->

   <!--begin::Sidebar-->
   <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
       <div class="sidebar-brand">
           {{-- Admin --}}
           @if (auth()->user()->role === 'admin')
               <a href="{{ url('admin/dashboard') }}" class="brand-link">
                   <span class="brand-text fw-light">School Mangment</span>
               </a>
           @endif

           {{-- Student --}}
           @if (auth()->user()->role === 'student')
               <a href="{{ url('student/dashboard') }}" class="brand-link">
                   <span class="brand-text fw-light">School Mangment</span>
               </a>
           @endif

           {{-- Instructor --}}
           @if (auth()->user()->role === 'instructor')
               <a href="{{ url('instructor/dashboard') }}" class="brand-link">
                   <span class="brand-text fw-light">School Mangment</span>
               </a>
           @endif

           {{-- Parent --}}
           @if (auth()->user()->role === 'parent')
               <a href="{{ url('parent/dashboard') }}" class="brand-link">
                   <span class="brand-text fw-light">School Mangment</span>
               </a>
           @endif
       </div>

       <!--begin::Sidebar Wrapper-->
       <div class="sidebar-wrapper">
           <nav class="mt-2">
               <!--begin::Sidebar Menu-->
               <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu"
                   data-accordion="false">

                   {{-- Admin --}}
                   @if (auth()->user()->role === 'admin')
                       <li class="nav-item">
                           <a href="{{ url('admin/dashboard') }}"
                               class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                               <i class="nav-icon fas fa-tachometer-alt"></i>
                               <p>Dashboard</p>
                           </a>
                       </li>
                       <li class="nav-item">
                           <a href="{{ url('admin/admin/list') }}"
                               class="nav-link {{ Request::is('admin/admin/list') ? 'active' : '' }}">
                               <i class="nav-icon fas fa-user"></i>
                               <p>Admin</p>
                           </a>
                       </li>
                   @endif

                   {{-- Student --}}
                   @if (auth()->user()->role === 'student')
                       <li class="nav-item">
                           <a href="{{ url('student/dashboard') }}"
                               class="nav-link {{ Request::is('student/dashboard') ? 'active' : '' }}">
                               <i class="nav-icon fas fa-tachometer-alt"></i>
                               <p>Dashboard</p>
                           </a>
                       </li>
                       {{-- <li class="nav-item">
                           <a href="{{ url('admin/student/list') }}"
                               class="nav-link {{ Request::is('admin/student/list') ? 'active' : '' }}">
                               <i class="nav-icon fas fa-user"></i>
                               <p>Student</p>
                           </a>
                       </li> --}}
                   @endif

                   {{-- Instructor --}}
                   @if (auth()->user()->role === 'instructor')
                       <li class="nav-item">
                           <a href="{{ url('instructor/dashboard') }}"
                               class="nav-link {{ Request::is('instructor/dashboard') ? 'active' : '' }}">
                               <i class="nav-icon fas fa-tachometer-alt"></i>
                               <p>Dashboard</p>
                           </a>
                       </li>
                       {{-- <li class="nav-item">
                           <a href="{{ url('admin/instructor/list') }}"
                               class="nav-link {{ Request::is('admin/instructor/list') ? 'active' : '' }}">
                               <i class="nav-icon fas fa-user"></i>
                               <p>Instructor</p>
                           </a>
                       </li> --}}
                   @endif

                   {{-- Parent --}}
                   @if (auth()->user()->role === 'parent')
                       <li class="nav-item">
                           <a href="{{ url('parent/dashboard') }}"
                               class="nav-link {{ Request::is('parent/dashboard') ? 'active' : '' }}">
                               <i class="nav-icon fas fa-tachometer-alt"></i>
                               <p>Dashboard</p>
                           </a>
                       </li>
                       {{-- <li class="nav-item">
                           <a href="{{ url('admin/parent/list') }}"
                               class="nav-link {{ Request::is('admin/parent/list') ? 'active' : '' }}">
                               <i class="nav-icon fas fa-user"></i>
                               <p>Parent</p>
                           </a>
                       </li> --}}
                   @endif


                   <li class="nav-item">
                       <form action="{{ url('logout') }}" method="POST" class="nav-link">
                           @csrf
                           <button type="submit" class="btn">Logout</button>
                       </form>
                   </li>

               </ul>
               <!--end::Sidebar Menu-->
           </nav>
       </div>
       <!--end::Sidebar Wrapper-->
   </aside>
