@extends('admin.master')

@section('content')
<div class="page-content">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

    <!-- Breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
        <div class="breadcrumb-title pe-3">User Profile</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="#"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Change Password
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">

                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-header bg-white border-0 pt-4">
                        <h4 class="fw-bold mb-0">
                            <i class="bx bx-lock text-primary"></i> Change Password
                        </h4>
                        <p class="text-muted small mb-0">
                            Enter your current password and choose a new secure password
                        </p>
                    </div>

                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('admin.updatepassword') }}">
                            @csrf

                            <!-- Current Password -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Current Password
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="bx bx-lock-open"></i>
                                    </span>
                                    <input
                                        type="password"
                                        name="current_password"
                                        class="form-control"
                                        placeholder="Enter current password">
                                </div>
                                @error('current_password')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- New Password -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    New Password
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="bx bx-key"></i>
                                    </span>
                                    <input
                                        type="password"
                                        name="password"
                                        class="form-control"
                                        placeholder="Enter new password">
                                </div>
                                @error('password')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Confirm New Password -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Confirm New Password
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="bx bx-check-shield"></i>
                                    </span>
                                    <input
                                        type="password"
                                        name="password_confirmation"
                                        class="form-control"
                                        placeholder="Confirm new password">
                                </div>
                                @error('password_confirmation')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bx bx-save"></i> Update Password
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
