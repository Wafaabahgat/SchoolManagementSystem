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
                <li class="nav-item">
                    <a href="{{ url('admin/class') }}"
                        class="nav-link {{ Request::is('admin/class') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Class</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/subject') }}"
                        class="nav-link {{ Request::is('admin/subject') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Subject</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/assign-subject') }}"
                        class="nav-link {{ Request::is('admin/assign-subject') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Assign Subject</p>
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
