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
                    <li class="breadcrumb-item active" aria-current="page">Reporting</li>
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
        <h5 class="card-title mb-3" style="color: white">Generate Reports</h5>
    </div>
                        <form method="GET" action="">
                            <div class="card-body">




                                <!-- Filter by Status & Location -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Item Type</label>
                                        <select class="form-select" name="status">
                                            <option value="">-- All Status --</option>
                                            <option value="New" {{ request('status') == 'New' ? 'selected' : '' }}>PC
                                            </option>
                                            <option value="Used" {{ request('status') == 'Used' ? 'selected' : '' }}>Router
                                            </option>
                                            <option value="Damaged" {{ request('status') == 'Damaged' ? 'selected' : '' }}>
                                                Switch</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Location</label>
                                        <select class="form-select" name="location">
                                            <option value="">-- All Locations --</option>
                                            <option value="Stock" {{ request('location') == 'Stock' ? 'selected' : '' }}>
                                                Stock</option>
                                            <option value="Branch" {{ request('location') == 'Branch' ? 'selected' : '' }}>
                                                Branch</option>
                                            <option value="Data_Center"
                                                {{ request('location') == 'Data_Center' ? 'selected' : '' }}>Data Center
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Filter by Branch & Category -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Branch</label>
                                        <select class="form-select" name="branch_id">
                                            <option value="">-- All Branches --</option>


                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Category</label>
                                        <select class="form-select" name="category_id">
                                            <option value="">-- All Categories --</option>

                                        </select>
                                    </div>
                                </div>

                                <!-- Filter by Purchase Date Range -->
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

                                <!-- Filter by Item Type -->


                                <!-- Submit Button -->
                                <div class="row">
                                    <div class="col-md-12 text-end">
                                        <button type="submit" class="btn btn-primary px-4">Generate Report</button>
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
