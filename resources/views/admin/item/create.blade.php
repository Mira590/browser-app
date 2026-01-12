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

                         <div class="card-header" style="background-color:lightslategrey">
        <h5 class="card-title mb-3" style="color: white">New Item</h5>
    </div>
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
                                        <input type="text" class="form-control" name="model"
                                            value="{{ old('model') }}" required>
                                        @error('model')
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
                                        @error('tag_number')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Serial Number</label>
                                        <input type="text" class="form-control" name="serial_number"
                                            value="{{ old('serail_number') }}" required>
                                        @error('serial_number')
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
                                            <option value="Used">Used</option>
                                            <option value="Damaged">Damaged</option>

                                        </select>
                                        @error('status')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                     <div class="col-md-6">
                                        <label class="form-label">Item Type </label>
                                        <select class="form-select" name="product_id">
                                            <option value="">-- Select Item Type --</option>
                                            @foreach ($product as $pro)
                                                <option value="{{ $pro->id }}">{{ $pro->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    
                                </div>

                                <!-- Bio & Experience -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Location </label>
                                        <select class="form-select" name="branch_id">
                                            <option value="">-- Select Location --</option>
                                            @foreach ($branch as $br)
                                                <option value="{{ $br->id }}">{{ $br->name }}</option>
                                            @endforeach


                                        </select>
                                        @error('branch_id')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">

                                        
                                        <label class="form-label">Section </label>
                                        <select class="form-select" name="category_id">
                                            <option value="">-- Select section --</option>
                                            @foreach ($category as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach


                                        </select>
                                        @error('category_id')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Item Life</label>
                                        <input type="date" class="form-control" name="life" value="{{old('life')}}">
                                        @error('life')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                     <div class="col-md-6">

                                        
                                        <label class="form-label">Supplier </label>
                                        <select class="form-select" name="supplier_id">
                                            <option value="">-- Select Supplier --</option>
                                            @foreach ($supplier as $sup)
                                                <option value="{{ $sup->id }}">{{ $sup->name }}</option>
                                            @endforeach


                                        </select>
                                        @error('category_id')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                   
                                </div>


                                <!-- Address -->
                                <div class="row mb-3">
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Purchase date</label>
                                        <input type="date" class="form-control" name="pur_date" value="">
                                        @error('pur_date')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                     <div class="col-md-6">
                                        <label class="form-label">Remark</label>
                                        <input type="text" class="form-control" name="remark"
                                            value="" >
                                        @error('remark')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                   
                                </div>

                                <!-- Profile Image -->
                                 <div class="row mb-3">

                                    <div class="col-md-6" hidden>
                                        <label class="form-label">Author</label>
                                        <input type="text" class="form-control" name="author"
                                            value="{{ Auth::user()->username }}" readonly>
                                        @error('author')
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
