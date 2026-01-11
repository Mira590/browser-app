@extends('admin.master')

@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<!-- breadcrumb -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3" style="margin-top: -50px;">
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item">
                    <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active">Reporting</li>
            </ol>
        </nav>
    </div>
</div>
<!-- end breadcrumb -->

<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-header" style="background-color:lightslategrey">
                        <h5 class="card-title mb-3 text-white">Generate Reports</h5>
                    </div>

                    <form method="GET" action="{{ route('admin.items.report') }}">
                        <div class="card-body">

                            <!-- Product & Location -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Product</label>
                                    <select class="form-select" name="product_id">
                                        <option value="">-- All Products --</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}"
                                                {{ request('product_id') == $product->id ? 'selected' : '' }}>
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                  <div class="col-md-6">
                                    <label class="form-label">Location</label>
                                    <select class="form-select" name="branch_id">
                                        <option value="">-- All Location --</option>
                                        @foreach($branches as $branch)
                                            <option value="{{ $branch->id }}"
                                                {{ request('branch_id') == $branch->id ? 'selected' : '' }}>
                                                {{ $branch->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                
                            </div>

                            <!-- Branch & Category -->
                            <div class="row mb-3">
                              

                            
                                    <label class="form-label">Category</label>
                                    <select class="form-select" name="category_id">
                                        <option value="">-- All Categories --</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                
                            </div>

                            <!-- Purchase Date -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Purchase Date From</label>
                                    <input type="date" class="form-control" name="date_from"
                                        value="{{ request('date_from') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Purchase Date To</label>
                                    <input type="date" class="form-control" name="date_to"
                                        value="{{ request('date_to') }}">
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="row">
                                <div class="col-md-12 text-end">
                                    <button type="submit" name="type" value="pdf" class="btn btn-danger px-4">
                                        Generate PDF
                                    </button>

                                    <button type="submit" name="type" value="csv" class="btn btn-success px-4">
                                        Generate CSV
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

@endsection
