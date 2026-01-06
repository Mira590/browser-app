@extends('admin.master')

@section('content')
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Details</h6>
        <hr />
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Model</p>
                                <h6 class="my-1">{{ $item->model }}</h6>

                            </div>
                            <div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-wallet"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Name</p>
                                <h6 class="my-1">{{ $item->name }}</h6>

                            </div>
                            <div class="widgets-icons bg-light-info text-info ms-auto"><i class='bx bxs-group'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Created By</p>
                                <h6 class="my-1">{{ $item->author }}</h6>

                            </div>
                            <div class="widgets-icons bg-light-danger text-danger ms-auto"><i class='bx bxs-binoculars'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Remark</p>
                                <h7 class="my-1">{{ $item->remark }}</h7>

                            </div>
                            <div class="widgets-icons bg-light-warning text-warning ms-auto"><i
                                    class='bx bx-line-chart-down'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Status</p>
                                <h6 class="my-1">{{ $item->status }}</h6>

                            </div>
                            <div class="widgets-icons bg-light-warning text-warning ms-auto"><i
                                    class='bx bx-line-chart-down'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Locatoin</p>
                                <h6 class="my-1">{{ $item->location }}</h6>

                            </div>
                            <div class="widgets-icons bg-light-warning text-warning ms-auto"><i
                                    class='bx bx-line-chart-down'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Location</p>
                                <h6 class="my-1">{{ $item->branch->name }}</h6>

                            </div>
                            <div class="widgets-icons bg-light-warning text-warning ms-auto"><i
                                    class='bx bx-line-chart-down'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Section</p>
                                <h6 class="my-1">{{ $item->category->name }}</h6>

                            </div>
                            <div class="widgets-icons bg-light-warning text-warning ms-auto"><i
                                    class='bx bx-line-chart-down'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Purchas Date</p>
                                <h6 class="my-1">{{ $item->pur_date }}</h6>

                            </div>
                            <div class="widgets-icons bg-light-warning text-warning ms-auto"><i
                                    class='bx bx-line-chart-down'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Issue Date</p>
                                <h6 class="my-1">{{ $item->issue_date }}</h6>

                            </div>
                            <div class="widgets-icons bg-light-warning text-warning ms-auto"><i
                                    class='bx bx-line-chart-down'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">imported in Stock</p>
                                <h6 class="my-1">{{ $item->created_at }}</h6>

                            </div>
                            <div class="widgets-icons bg-light-warning text-warning ms-auto"><i
                                    class='bx bx-line-chart-down'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    @endsection
