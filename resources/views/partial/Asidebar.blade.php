<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src='{{ asset('assets/images/logo-icon.png') }}' class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">IT STOCK</h4>
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

        @if(auth()->user()->isAdmin())
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
        @endif

        <li class="menu-label">Setting</li>

        <!-- Asset Management - Admin, Superuser, User -->
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-folder'></i></div>
                <div class="menu-title">Asset Management</div>
            </a>
            <ul>
                @if(auth()->user()->isAdmin())
                    <li><a href="{{ route('admin.addBranch') }}"><i class='bx bx-plus-circle'></i>Add Branch</a></li>
                    <li><a href="{{ route('admin.allbranch') }}"><i class='bx bx-menu'></i>All Branches</a></li>
                     <li><a href="{{ route('admin.supplier') }}"><i class='bx bx-menu'></i>Suppliers</a></li>
                @endif

                @if(auth()->user()->isAdmin())
                    <li><a href="{{ route('admin.addcategory') }}"><i class='bx bx-plus-circle'></i>Add Department</a></li>
                    <li><a href="{{ route('admin.allcategory') }}"><i class='bx bx-category'></i>All Departments</a></li>
                @endif

                <!-- Items - All roles -->
                <li><a href="{{ route('admin.additem') }}"><i class='bx bx-plus-circle'></i>New Item</a></li>
                <li><a href="{{ route('admin.allitem') }}"><i class='bx bx-laptop'></i>All Items</a></li>
                <li><a href="{{ route('admin.stock') }}"><i class='bx bx-category'></i>Stock</a></li>
            </ul>
        </li>

        <!-- Reports - Admin & Superuser only -->
        @if(auth()->user()->isAdmin() || auth()->user()->isSuperuser())
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-menu'></i></div>
                    <div class="menu-title">Reports</div>
                </a>
                <ul>
                    <li><a href="{{ route('admin.report') }}"><i class='bx bx-radio-circle'></i>Reports</a></li>
                     <li><a href="{{ route('admin.pending') }}"><i class='bx bx-radio-circle'></i>Verification</a></li>
                </ul>
            </li>
        @endif
    </ul>
</div>
