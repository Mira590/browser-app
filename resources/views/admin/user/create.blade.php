@extends('admin.master');
@section('content');


				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
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
							
							</div>
							<div class="col-lg-8">
								

								<div class="card">
									 <div class="card-header" style="background-color:lightslategrey">
        <h5 class="card-title mb-3" style="color: white">Generate Reports</h5>
    </div>
									<form method="POST" enctype="multipart/form-data" action="">

										@csrf
									<div class="card-body">
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Full Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name='name' value="{{Auth::user()->name}}" />
												        @error('name')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Email</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" />
												 @error('email')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Phone</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}" />
												           @error('phone')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">city</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="city" value="{{Auth::user()->city}}" /> 
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

@endsection