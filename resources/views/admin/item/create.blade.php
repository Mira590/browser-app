@extends('admin.master')
@section('content')


				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3" style="margin-top: -50px;">
					
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">New Item</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							
							<div class="col-lg-8">
								

								<div class="card">
    <form method="POST" enctype="multipart/form-data" action="">
        @csrf

        <div class="card-body">

            <!-- Full Name & Email -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name"
                        value="{{ Auth::user()->username }}">
                    @error('name')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Model</label>
                    <input type="text" class="form-control" name="Model"
                        value="{{ Auth::user()->email }}">
                    @error('email')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Phone & City -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Tag#</label>
                    <input type="text" class="form-control" name="tag_number"
                        value="{{ Auth::user()->phone }}">
                    @error('phone')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Serial Number</label>
                    <input type="text" class="form-control" name="serial_number"
                        value="{{ Auth::user()->city }}">
                    @error('city')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Country & Gender -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">status </label>
                    <select class="form-select" name="status">
                        <option value="New" {{ Auth::user()->gender == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Normal" {{ Auth::user()->gender == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="out of use" {{ Auth::user()->gender == 'Others' ? 'selected' : '' }}>Others</option>
                    </select>
                    @error('country')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                  
                    <label class="form-label">location </label>
                    <select class="form-select" name="location">
                        <option value="stock" {{ Auth::user()->gender == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ Auth::user()->gender == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Others" {{ Auth::user()->gender == 'Others' ? 'selected' : '' }}>Others</option>
                    </select>
                    @error('gender')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Bio & Experience -->
            <div class="row mb-3">
                <div class="col-md-6">
                   <label class="form-label">Branch </label>
                    <select class="form-select" name="gender">
                        <option value="00010" {{ Auth::user()->gender == 'Male' ? 'selected' : '' }}>00010</option>
                        <option value="00030" {{ Auth::user()->gender == 'Female' ? 'selected' : '' }}>00030</option>
                        <option value="Others" {{ Auth::user()->gender == 'Others' ? 'selected' : '' }}>Others</option>
                    </select>
                    @error('bio')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Category </label>
                    <select class="form-select" name="gender">
                        <option value="Network"  selected='Network'>Network</option>
                        <option value="Female" >system admin</option>
                        <option value="Others">Others</option>
                    </select>
                    @error('experience')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Address -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Author</label>
                    <input type="text" class="form-control" name="address"
                        value="{{ Auth::user()->username }}" readonly>
                    @error('address')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Purchase date</label>
                    <input type="date" class="form-control" name="address"
                        value="{{ Auth::user()->address }}">
                    @error('address')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Profile Image -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <label class="form-label">Profile Image</label>
                    <input type="file" class="form-control" name="photo">
                    @error('photo')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-primary px-4">
                      save 
                    </button>
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