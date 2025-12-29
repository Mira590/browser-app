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
                    <li class="breadcrumb-item active" aria-current="page">Issue Item</li>
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
                                            @foreach ($branch as $br)
                                                <option value="{{ $br->id }}">{{ $br->name }}</option>
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
                                        <input type="text" class="form-control" name="author"
                                            value="{{ Auth::user()->username }}" readonly>
                                        @error('author')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Issue Date date</label>
                                        <input type="date" class="form-control" name="pur_date" value="">
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
