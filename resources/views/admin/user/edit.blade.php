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
								<li class="breadcrumb-item active" aria-current="page">User Profile</li>
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
                                         src="{{ asset( Auth::user()->photo) }}"
                                         alt="Admin"
                                         class=""
                                         width="200">
											<div class="mt-3">
												<h4>{{Auth::user()->first_name}}</h4>
												<p class="text-secondary mb-1">{{$user->email}}</p>
												
											</div>
										</div>
										<hr class="my-4" />
										
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								

								<div class="card">
									<form method="POST" enctype="multipart/form-data" action="{{ route('admin.updateUser',$user->id) }}">

										@csrf
										@method('PUT')
									<div class="card-body">
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name='first_name' value="{{$user->first_name}}" />
												        @error('first_name')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Username</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="username" value="{{$user->username}}" />
												 @error('username')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">email</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="email" value="{{$user->email}}" />
												           @error('email')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Position</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="job_title" value="{{$user->job_title}}" /> 
												          @error('job_title')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Password</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="password" value="" />
												             @error('password')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0"> Confirm Password</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="password_confirmation" value="" />
												             @error('password_confirmation')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Role</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												
												 <select name="role" id="role" class="form-select">
                                              <option value="user" {{ $user->role=='user' ? 'selected' : '' }}>User</option>
                                             <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                             <option value="superuser" {{ $user->role == 'superuser' ? 'selected' : '' }}>Superuser</option>
                                               </select>
												 @error('role')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
											</div>
										</div>
										
                                         	<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Status</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												
												 <select name="status" id="status" class="form-select">
                                              <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Enable</option>
                                             <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Disable</option>
                                             
                                               </select>
												 @error('status')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
											</div>
										</div>

										 <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">AZB Number</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="azbid" placeholder="ex: AZ#" value="{{$user->azbid}}" />
												       @error('azbid')
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