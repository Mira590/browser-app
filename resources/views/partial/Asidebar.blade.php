<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src='{{asset("assets/images/logo-icon.png")}}' class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">IT STOCK</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			 </div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
					<ul>
						
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-user"></i>
						</div>
						<div class="menu-title">User Management</div>
					</a>
					<ul>
						<li> <a href="{{route('admin.userIndex')}}"><i class='bx bx-user-plus'></i>Create User</a>
						</li>
						<li> <a href="{{route('admin.allUsers')}}"><i class='bx bx-menu'></i>All Users</a>
						</li>
						
					</ul>
				</li>
				<li class="menu-label">Setting</li>
				
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-folder'></i>
						</div>
						<div class="menu-title">Asset Management</div>
					</a>
					<ul>
						<li> <a href="ecommerce-products.html"><i class='bx bx-plus-circle'></i>Add Branch</a>
						</li>
						<li> <a href="ecommerce-products-details.html"><i class='bx bx-menu'></i>All Branches</a>
						</li>
						<li> <a href="ecommerce-add-new-products.html"><i class='bx bx-plus-circle'></i> Add Category</a>
						</li>
						<li> <a href="ecommerce-orders.html"><i class='bx bx-category'></i>All Categories</a>
							<li> <a href="ecommerce-orders.html"><i class='bx bx-plus-circle'></i>New Item</a>
								<li> <a href="ecommerce-orders.html"><i class='bx bx-laptop'></i>All Items</a>
						</li>
					</ul>
				</li>
            </ul>
			<!--end navigation-->
		</div>