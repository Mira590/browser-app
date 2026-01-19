@extends('admin.master')

@section('content')
<div class="page-content">

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
                        Profile
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-5">
                        <div class="row align-items-center">

                            <!-- Profile Photo -->
                            <div class="col-md-4 text-center text-md-start mb-4 mb-md-0">
                                <img src="{{ asset(Auth::user()->photo) }}" 
                                     class=""
                                     width="180" height="180" alt="Profile Photo">
                            </div>

                            <!-- Profile Information -->
                            <div class="col-md-8">
                                <h3 class="fw-bold mb-2">{{ auth()->user()->first_name }}</h3>
                                <p class="text-muted mb-1"><i class="bx bx-envelope"></i> {{ auth()->user()->email }}</p>
                                <p class="text-muted mb-3"><i class="bx bx-calendar"></i> Joined: {{ auth()->user()->created_at->format('d M, Y') }}</p>

                                <div class="row">
                                    <div class="col-sm-6 mb-2">
                                        <h6 class="fw-semibold text-dark">Job Title</h6>
                                        <p class="text-secondary">{{ auth()->user()->job_title ?? '-' }}</p>
                                    </div>
                                    <div class="col-sm-6 mb-2">
                                        <h6 class="fw-semibold text-dark">Username</h6>
                                        <p class="text-secondary">{{ auth()->user()->username ?? 'User' }}</p>
                                    </div>
                                    
                                    <div class="col-12 mb-2">
                                        <h6 class="fw-semibold text-dark">Azb Number</h6>
                                        <p class="text-secondary">{{ auth()->user()->azbid ?? '-' }}</p>
                                    </div>
                                    
                                </div>

                            </div>

                        </div> <!-- row -->
                    </div> <!-- card-body -->
                </div> <!-- card -->

            </div>
        </div>
    </div>

</div>
@endsection
