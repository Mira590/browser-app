@extends('admin.master')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3" style="margin-top: -50px;">

        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Supplier</li>
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

                        <div class="card-header" style="background-color:whitesmoke">
                            <h5 class="card-title mb-3" style="color:black">Supplier</h5>
                        </div>
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.savesupplier') }}">
                            @csrf

                            <div class="card-body">

                                <!-- Full Name & Email -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}" required>
                                        @error('name')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Contact Person</label>
                                        <input type="text" class="form-control" name="cont_person"
                                            value="{{ old('cont_person') }}" required>
                                        @error('cont_person')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Phone & City -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Website</label>
                                        <input type="text" class="form-control" name="website"
                                            value="{{ old('website') }}" required>
                                        @error('website')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email"
                                            value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Country & Gender -->


                                <!-- Bio & Experience -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Type</label>

                                        <select class="form-select" name="type">
                                            <option value="">-- Select Type --</option>

                                            <option value="serivec_provider"
                                                {{ old('type') == 'serivec_provider' ? 'selected' : '' }}>
                                                Service Provider
                                            </option>

                                            <option value="Govermental_Services"
                                                {{ old('type') == 'Govermental_Services' ? 'selected' : '' }}>
                                                Governmental Services
                                            </option>

                                            <option value="Distributer"
                                                {{ old('type') == 'Distributer' ? 'selected' : '' }}>
                                                Distributer
                                            </option>

                                            <option value="Infrastructure"
                                                {{ old('type') == 'Infrastructure' ? 'selected' : '' }}>
                                                Infrastructure
                                            </option>
                                        </select>

                                        @error('type')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Licence Number</label>
                                        <input type="text" class="form-control" name="licence"
                                            value="{{ old('licence') }}">
                                        @error('licence')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="row mb-3">

                                    <div class="col-md-6">
                                        <label class="form-label">Expire of Licence</label>
                                        <input type="date" class="form-control" name="exp_licence"
                                            value="{{ old('exp_licence') }}">
                                        @error('exp_licence')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ old('phone') }}" placeholder="+937XXXXXXX">
                                        @error('phone')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <!-- Profile Image -->

                                <div class="row mb-3">



                                    <div class="col-md-12">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ old('address') }}" placeholder="Address">
                                        @error('address')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>



                                </div>
                                <div class="row mb-3">



                                    <div class="col-md-12">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="desc" value="{{ old('desc') }}" placeholder="Description"></textarea>
                                        @error('desc')
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
