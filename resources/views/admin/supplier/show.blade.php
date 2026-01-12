@extends('admin.master')

@section('content')
    <div class="page-content">

        <!-- Header -->
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('admin.suppliers') }}" class="btn btn-secondary btn-sm me-3">
                <i class="bx bx-arrow-back"></i> Back
            </a>

            <h5 class="mb-0 text-uppercase">
                Supplier Details
            </h5>


        </div>

        <!-- Supplier Information -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <strong>Basic Information</strong>
                    </div>

                    <div class="card-body">
                        <table class="table table-borderless mb-4">
                            <tr>
                                <th width="25%">Supplier Name</th>
                                <td>{{ $supplier->name }}</td>
                            </tr>
                            <tr>
                                <th>Contact Person</th>
                                <td>{{ $supplier->cont_person }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $supplier->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $supplier->phone }}</td>
                            </tr>
                            <tr>
                                <th>Website</th>
                                <td>
                                    <a href="{{ $supplier->website }}" target="_blank">
                                        {{ $supplier->website }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>License Number</th>
                                <td>{{ $supplier->licence }}</td>
                            </tr>
                            @php
                                use Carbon\Carbon;

                                $today = Carbon::today();
                                $expireDate = Carbon::parse($supplier->exp_licence);
                                $daysLeft = $today->diffInDays($expireDate, false);
                            @endphp

                            <tr>
                                <th>License Expire At</th>
                                <td>
                                    {{ $expireDate->format('d M Y') }}
                                </td>
                            </tr>

                            <tr>
                                <th>License Status</th>
                                <td>
                                    @if ($daysLeft < 0)
                                        <span class="badge bg-danger">
                                            Expired {{ abs($daysLeft) }} days ago
                                        </span>
                                    @elseif ($daysLeft <= 30)
                                        <span class="badge bg-warning text-dark">
                                            Expires in {{ $daysLeft }} days
                                        </span>
                                    @else
                                        <span class="badge bg-success">
                                            Expires in {{ $daysLeft }} days
                                        </span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>Created At</th>
                                <td>{{ $supplier->created_at->format('d M Y') }}</td>
                            </tr>
                        </table>

                        <!-- Description -->
                        <div>
                            <h6 class="text-uppercase mb-2">Description</h6>
                            <p class="mb-0">
                                {{ $supplier->desc ?? 'No description available.' }}
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
