<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand gap-3">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>

					  <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
						

					  </div>


					  <div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center gap-1">
							<li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
								<a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
								</a>
							</li>
							
								
							
							<li class="nav-item dark-mode d-none d-sm-flex">
								<a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
								</a>
							</li>

							<li class="nav-item dropdown dropdown-app">
								
								<div class="dropdown-menu dropdown-menu-end p-0">
									
								</div>
							</li>

							<li class="nav-item dropdown dropdown-large">
								
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											
										</a>
										<a class="dropdown-item" href="javascript:;">
											
										</a>
										<a class="dropdown-item" href="javascript:;">
											
										</a>
										<a class="dropdown-item" href="javascript:;">
											
										</a>
										<a class="dropdown-item" href="javascript:;">
											
											
										</a>
										<a class="dropdown-item" href="javascript:;">
											
										</a>
										<a class="dropdown-item" href="javascript:;">
											
										</a>
										<a class="dropdown-item" href="javascript:;">
											
										</a>
										<a class="dropdown-item" href="javascript:;">
											
													
										</a>
									</div>
									<a href="javascript:;">
									
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											
										</a>
									
									</div>
									<a href="javascript:;">
										
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown px-3">
						<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							 <img src="{{ asset('storage/' . Auth::user()->photo) }}"
             class="user-img"
             alt="user avatar">
							<div class="user-info">
								<p class="user-name mb-0">Mira jan Najme</p>
								<p class="designattion mb-0">Web Developer</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-user fs-5"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-cog fs-5"></i><span>Settings</span></a>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-home-circle fs-5"></i><span>Dashboard</span></a>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-dollar-circle fs-5"></i><span>Earnings</span></a>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-download fs-5"></i><span>Downloads</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<form method="POST" action="{{ route('admin.logout') }}">
    @csrf
    <button type="submit" class="dropdown-item d-flex align-items-center">
        <i class="bx bx-log-out-circle"></i>
        <span>Logout</span>
    </button>
</form>

						</ul>
					</div>
				</nav>
			</div>
		</header>