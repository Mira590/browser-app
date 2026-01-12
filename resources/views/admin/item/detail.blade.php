@extends('admin.master')

@section('content')
<div class="page-content">

    <!-- Header -->
    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('admin.allitem') }}" class="btn btn-secondary btn-sm me-3">
            <i class="bx bx-arrow-back"></i> Back
        </a>

        <h5 class="mb-0 text-uppercase">Item Details</h5>

        <div class="ms-auto">
            <a href="{{ route('admin.edititem', $item->id) }}"
               class="btn btn-primary btn-sm">
                <i class="bx bx-edit"></i> Edit
            </a>
        </div>
    </div>

    <div class="row">

        <!-- Item Information -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-light">
                    <strong>Basic Information</strong>
                </div>

                <div class="card-body">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <th width="30%">Item Name</th>
                            <td>{{ $item->name }}</td>
                        </tr>
                        <tr>
                            <th>Model</th>
                            <td>{{ $item->model }}</td>
                        </tr>
                        <tr>
                            <th>Tag Number</th>
                            <td>{{ $item->tag_number }}</td>
                        </tr>
                        <tr>
                            <th>Serial Number</th>
                            <td>{{ $item->serial_number }}</td>
                        </tr>
                        <tr>
                            <th>Item Type</th>
                            <td>{{ $item->product->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Supplier</th>
                            <td>{{ $item->supplier->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Current Location</th>
                            <td>
                                <span class="badge bg-info">
                                    {{ $item->branch->name ?? 'N/A' }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if ($item->branch && $item->branch->name === 'Stock')
                                    <span class="badge bg-success">In Stock</span>
                                @else
                                    <span class="badge bg-warning text-dark">Issued</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $item->created_at->format('d M Y') }}</td>
                        </tr>
                        <tr>
                            <th>Created By</th>
                            <td>{{ $item->author }}</td>
                        </tr>
                         <tr>
                            <th>Purchase Date</th>
                            <td>{{ $item->pur_date }}</td>
                        </tr>
                        <tr>
                            <th>Item expire on</th>
                            <td>{{ $item->life }}</td>
                        </tr>
                        
                    </table>
                </div>
            </div>
        </div>

        <!-- Right Side -->
        <div class="col-lg-4">

            <!-- Description -->
            <div class="card mb-3">
                <div class="card-header bg-light">
                    <strong>Description</strong>
                </div>
                <div class="card-body">
                    <p class="mb-0">
                        {{ $item->description ?? 'No description available.' }}
                    </p>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card">
                <div class="card-header bg-light">
                    <strong>Quick Actions</strong>
                </div>
                <div class="card-body d-grid gap-2">

                    <a href="{{ route('admin.itemlife', $item->id) }}"
                       class="btn btn-secondary btn-sm">
                        <i class="bx bx-history"></i> Item History
                    </a>

                    @if ($item->branch && $item->branch->name === 'Stock')
                        <a href="{{ route('admin.issue', $item->id) }}"
                           class="btn btn-primary btn-sm">
                            <i class="bx bx-log-out"></i> Issue Item
                        </a>
                    @else
                        <button class="btn btn-secondary btn-sm" disabled>
                            <i class="bx bx-check"></i> Already Issued
                        </button>
                    @endif

                </div>
            </div>

        </div>

    </div>
</div>
@endsection
