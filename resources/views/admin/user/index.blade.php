@extends('admin.master')
@section('content')
<div class="page-content" style="margin-top: -70px">

    <!-- Breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
        <div class="breadcrumb-title pe-3">Create User</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">New User</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Form Container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">

                <div class="card shadow-sm rounded-4 border-0">
                    <!-- Card Header -->
                    <div class="card-header rounded-top p-4" style="background-color:gray;">
                        <h4 class="mb-0"><i class="bx bx-user-plus"></i> New User</h4>
                        <p class="mb-0 small text-dark">Fill in the information below to create a new user account.</p>
                    </div>

                    <form action="{{ route('admin.userCreate') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body p-4">

                            <div class="row g-3">

                                <!-- Name -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bx bx-user"></i></span>
                                        <input type="text" class="form-control" name="first_name" value="" placeholder="Name">
                                    </div>
                                    @error('first_name')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <!-- Username -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bx bx-id-card"></i></span>
                                        <input type="text" class="form-control" name="username" value="" placeholder="username">
                                    </div>
                                    @error('username')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bx bx-envelope"></i></span>
                                        <input type="email" class="form-control" name="email" value="" placeholder="Email">
                                    </div>
                                    @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <!-- Position -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Position</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bx bx-briefcase"></i></span>
                                        <input type="text" class="form-control" name="job_title" value="" placeholder="Position">
                                    </div>
                                    @error('job_title')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <!-- Password -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bx bx-lock"></i></span>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Confirm Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bx bx-lock-alt"></i></span>
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                    </div>
                                    @error('password_confirmation')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <!-- Role -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Role</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bx bx-user-circle"></i></span>
                                        <select name="role" id="role" class="form-select">
                                            <option value="user">User</option>
                                            <option value="admin">Admin</option>
                                            <option value="superuser">Superuser</option>
                                        </select>
                                    </div>
                                    @error('role')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <!-- Department -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Department</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bx bx-building"></i></span>
                                        <select name="department_id" id="department_id" class="form-select" required>
                                            <option value="">-- Select Department --</option>
                                            @foreach ($dep as $depart)
                                                <option value="{{ $depart->id }}">{{ $depart->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('department_id')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <!-- Bio -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Bio</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bx bx-comment"></i></span>
                                        <input type="text" class="form-control" name="bio" placeholder="BIO">
                                    </div>
                                    @error('bio')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <!-- AZB Number -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">AZB Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bx bx-hash"></i></span>
                                        <input type="text" class="form-control" name="azbid" placeholder="ex: AZ#">
                                    </div>
                                    @error('azbid')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <!-- Profile Image -->
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Profile Image</label>
                                    <input type="file" class="form-control" name="photo" id="photo">
                                    @error('photo')<small class="text-danger">{{ $message }}</small>@enderror
                                    <div class="mt-2">
                                        <img id="pre" src="{{ asset('backend/assets/images/avatars/avatar-2.png') }}"
                                             alt="Preview" class="rounded-circle" width="100">
                                    </div>
                                </div>

                            </div>

                            <!-- Submit -->
                            <div class="mt-4 text-end">
                                <input type="submit" class="btn btn-primary btn-lg px-5" value="Save">
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>

<!-- Image Preview Script -->
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
