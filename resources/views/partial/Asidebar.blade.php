<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src='{{ asset('assets/images/logo-icon.png') }}' class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">IT Asset</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i></div>
    </div>

    <ul class="metismenu" id="menu">
        <!-- Dashboard is visible to all roles -->
        <li>
            <a href="{{ route('admin.dashboard') }}" class="">
                <div class="parent-icon"><i class='bx bx-home-alt'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>


        <!-- User Management - Admin Only -->
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-user"></i></div>
                <div class="menu-title">User Management</div>
            </a>
            <ul>
                <li><a href="{{ route('admin.userIndex') }}"><i class='bx bx-user-plus'></i>Create User</a></li>
                <li><a href="{{ route('admin.allUsers') }}"><i class='bx bx-menu'></i>All Users</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-folder'></i></div>
                <div class="menu-title">Browser Settings</div>
            </a>
            <ul>

                <li><a href="{{ route('admin.link') }}"><i class='bx bx-plus-circle'></i>Create Link</a></li>
                <li><a href="{{ route('admin.link.list') }}"><i class='bx bx-menu'></i>All links</a></li>
                <li><a href="{{ route('admin.slider') }}"><i class='bx bx-plus-circle'></i>Create Slider</a></li>
                <li><a href="{{ route('admin.slider.list') }}"><i class='bx bx-menu'></i>All Sliders</a></li>

            </ul>
        </li>



        <!-- Asset Management - Admin, Superuser, User -->


        <!-- Reports - Admin & Superuser only -->



    </ul>
</div>
