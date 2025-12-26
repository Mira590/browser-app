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
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.saveitem') }}">
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
                                        <label class="form-label">Model</label>
                                        <input type="text" class="form-control" name="Model"
                                            value="{{ old('Model') }}" required>
                                        @error('email')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Phone & City -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Tag Number</label>
                                        <input type="text" class="form-control" name="tag_number"
                                            value="{{ old('tag_number') }}" required>
                                        @error('phone')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Serial Number</label>
                                        <input type="text" class="form-control" name="serial_number"
                                            value="{{ old('serail_number') }}" required>
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
                                            <option value="New">New</option>
                                            <option value="Normal">Normal</option>
                                            <option value="OutOfUse">Normal</option>

                                        </select>
                                        @error('country')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">

                                        <label class="form-label">location </label>
                                        <select class="form-select" name="location">
                                            <option value="Stock" {{ old('location') == 'Stock' ? 'selected' : '' }}>Stock
                                            </option>
                                            <option value="Branch" {{ old('location') == 'Branch' ? 'selected' : '' }}>
                                                Branch</option>

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
                                        <select class="form-select" name="branch_id">
                                            <option value="">-- Select Branch --</option>
                                            @foreach ($branch as $br)
                                                <option value="{{ $br->id }}">{{ $br->br_code }}</option>
                                            @endforeach


                                        </select>
                                        @error('bio')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Category </label>
                                        <select class="form-select" name="category_id">
                                            <option value="">-- Select Category --</option>
                                            @foreach ($category as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach


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
                                        <input type="text" class="form-control" name="Author"
                                            value="{{ Auth::user()->username }}" readonly>
                                        @error('author')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Purchase date</label>
                                        <input type="date" class="form-control" name="Pur_date" value="">
                                        @error('address')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Profile Image -->
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <label class="form-label">Remark</label>
                                        <input type="text" class="form-control" name="remark">
                                        @error('remark')
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
