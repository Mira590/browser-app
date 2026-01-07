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
                    <li class="breadcrumb-item active" aria-current="page">Edit ITEM</li>
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
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.updateitem',$item->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <!-- Full Name & Email -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{$item->name}}" required>
                                        @error('name')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Model</label>
                                        <input type="text" class="form-control" name="model"
                                            value="{{$item->model}}" required>
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
                                            value="{{$item->tag_number}}" required>
                                        @error('phone')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Serial Number</label>
                                        <input type="text" class="form-control" name="serial_number"
                                            value="{{$item->serial_number}}" required>
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
                                            <option value="New" {{ $item->status == 'New' ? 'selected' : '' }}>New</option>
                                            <option value="Used" {{ $item->status == 'Used' ? 'selected' : '' }}>Used</option>
                                            <option value="Damaged" {{ $item->status == 'Damaged' ? 'selected' : '' }}>Damaged</option>

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
                                                <option value="{{ $pro->id }}"{{ $item->product_id=$pro->id ?'selected' :'' }}>{{ $pro->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                   
                                </div>

                                <!-- Bio & Experience -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Branch </label>
                                        <select class="form-select" name="branch_id">
                                            <option value="">-- Select Branch --</option>
                                            @foreach ($branch as $br)
                                                <option value="{{ $br->id }}"{{ $item->branch_id == $br->id ? 'selected' : '' }}>{{ $br->name }}</option>
                                            @endforeach


                                        </select>
                                        @error('branch_id')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Category </label>
                                        <select class="form-select" name="category_id">
                                            <option value="">-- Select Category --</option>
                                            @foreach ($category as $cat)
                                                <option value="{{ $cat->id }}"{{$item->category_id ==$cat->id ? 'selected':'' }}>{{ $cat->name }}</option>
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
                                        <label class="form-label">Remark</label>
                                        <input type="text" class="form-control" name="remark"
                                            value="{{ $item->remark }}" >
                                        @error('remark')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                   
                                    <div class="col-md-6">
                                        <label class="form-label">Purchase date</label>
                                        <input type="date" class="form-control" name="pur_date" value="{{$item->pur_date}}">
                                        @error('pur_date')
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
