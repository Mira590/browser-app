

@extends('admin.master')
@section('content')


<div class="page-content" style="margin-top: -70px">

				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3" >
					<div class="breadcrumb-title pe-3">Create User</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">New User</li>
							</ol>
						</nav>
					</div>

				</div>

				@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							
							<div class="col-lg-8">
								

								<div class="card">
									<form action="{{route('admin.userCreate')}}" method="POST" enctype="multipart/form-data">

										@csrf
									<div class="card-body">
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name='first_name' value="" />
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
												<input type="text" class="form-control" name="username" value="" />
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
												<input type="text" class="form-control" name="email" value="" />
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
												<input type="text" class="form-control" name="job_title" value="" /> 
												          @error('job_titl')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Password</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="password" class="form-control" name="password" value="" />
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
												<input type="password" class="form-control" name="password_confirmation" value="" require />
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
                                              <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                             <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                             <option value="superuser" {{ old('role') == 'superuser' ? 'selected' : '' }}>Superuser</option>
                                               </select>
												 @error('role')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
											</div>
										</div>
										
                                          <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">bio</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="bio" value="" />
												      @error('bio')
                                                          <span class="text-danger small">{{ $message }}</span>
                                                       @enderror
											</div>
										</div>

										 <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">AZB Number</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="azbid" placeholder="ex: AZ#" value="" />
												       @error('experience')
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

        <!-- IMAGE PREVIEW UNDER INPUT -->
        <div class="mt-2">
            <img id="pre" src="{{ asset('backend/assets/images/avatars/avatar-2.png') }}" 
                 alt="Preview" class="rounded-circle" width="100">
        </div>
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

		<script>
    const photoInput = document.getElementById('photo');
    const previewImg = document.getElementById('pre');

    photoInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>

		
@endsection