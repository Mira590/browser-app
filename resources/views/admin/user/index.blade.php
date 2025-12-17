@extends('admin.master')
@section('content')
<div class="page-content" style="margin-top: -70px">

				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3" >
					<div class="breadcrumb-title pe-3">User Profile</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">User Profilep</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
									<img id="pre" 
          src="{{ auth()->user()->photo ? Storage::url(auth()->user()->photo) : asset('backend/assets/images/avatars/avatar-2.png') }}" 
          alt="Admin" class="rounded-circle p-1 bg-primary" width="110">

											<div class="mt-3">
												<h4>{{Auth::user()->name}}</h4>
												<p class="text-secondary mb-1">{{Auth::user()->email}}</p>
												<p class="text-muted font-size-sm">{{Auth::user()->address}}</p>
												<button class="btn btn-primary">Follow</button>
												<button class="btn btn-outline-primary">Message</button>
											</div>
										</div>
										<hr class="my-4" />
										
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								

								<div class="card">
									<form method="POST" enctype="multipart/form-data" action="">

										@csrf
									<div class="card-body">
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name='first_name' value="{{Auth::user()->first_name}}" />
												        @error('name')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Username</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="username" value="{{Auth::user()->username}}" />
												 @error('email')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Role</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="role" value="{{Auth::user()->role}}" />
												           @error('phone')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Position</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="job_title" value="{{Auth::user()->city}}" /> 
												          @error('city')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Country</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="country" value="{{Auth::user()->country}}" />
												             @error('country')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Gender</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<select class="form-select" name="gender">
													<option>Male</option>
													<option>Female</option>
													<option>others</option>
												</select>
												 @error('gender')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
											</div>
										</div>
										
                                          <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">bio</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="bio" value="{{Auth::user()->bio}}" />
												      @error('bio')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
											</div>
										</div>

										 <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Experience</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="experience" placeholder="ex: Python ,Java" value="{{Auth::user()->experience}}" />
												       @error('experience')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
											</div>
										</div>
										     <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Address</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="address" value="{{Auth::user()->address}}" />
												      @error('address')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
											</div>
										</div>
										     <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Profile Image</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="file" class="form-control" name="photo" id="photo" />
												         @error('photo')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
												
											</div>
										</div>


										
										
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-primary px-4" value="Save Changes" />

											</div>
										</div>
									</div>
									</form>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection