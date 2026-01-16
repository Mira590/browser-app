@extends('admin.master')

@section('content')
    <div class="page-content">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2 row-cols-xxl-4">
            <div class="col">
                <div class="card radius-10 bg-gradient-cosmic">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-auto">
                                <p class="mb-0 text-white">Total Items in stock</p>
                                <h4 class="my-1 text-white">{{ $stock }}</h4>

                            </div>
                            <div id="chart1"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-ibiza">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-auto">
                                <p class="mb-0 text-white">Total items in DataCenter</p>
                                <h4 class="my-1 text-white">{{ $data }}</h4>

                            </div>
                            <div id="chart2"></div>
                        </div>
                    </div>
                </div>
            </div>
            @if (auth()->user()->isAdmin())
                <div class="col">
                    <div class="card radius-10 bg-gradient-ohhappiness">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="me-auto">
                                    <p class="mb-0 text-white">Total Users</p>
                                    <h4 class="my-1 text-white">{{ $totalUsers }}</h4>

                                </div>
                                <div id="chart3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col">
                <div class="card radius-10 bg-gradient-kyoto">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-auto">
                                <p class="mb-0 text-dark">Total Fixed Assets</p>
                                <h4 class="my-1 text-dark">{{ $totalItems }}</h4>

                            </div>
                            <div id="chart4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->





        <div class="card radius-10">




            <div class="row row-cols-1 row-cols-lg-3">
                <div class="col d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-header bg-transparent">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">Stock</h6>
                                </div>

                            </div>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li
                                class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
                                PC
                                <span class="badge bg-gradient-quepal rounded-pill">{{ $pc }}</span>
                            </li>
                            <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                                Router
                                <span class="badge bg-gradient-ibiza rounded-pill">{{ $router }}</span>
                            </li>
                            <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                                Swtich <span class="badge bg-gradient-deepblue rounded-pill">{{ $switch }}</span>
                            </li>
                            <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                                Server <span class="badge bg-gradient-deepblue rounded-pill">{{ $server }}</span>
                            </li>
                            <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                                Firewall <span class="badge bg-gradient-deepblue rounded-pill">{{ $firewall }}</span>
                            </li>


                        </ul>
                    </div>
                </div>
                <div class="col d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-header bg-transparent">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">Data Center</h6>
                                </div>

                            </div>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li
                                class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
                                PC <span class="badge bg-gradient-quepal rounded-pill">25</span>
                            </li>
                            <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                                Router<span class="badge bg-gradient-ibiza rounded-pill">10</span>
                            </li>
                            <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                                Server <span class="badge bg-gradient-deepblue rounded-pill">65</span>
                            <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                                Switch <span class="badge bg-gradient-deepblue rounded-pill">65</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card">
                            <!-- Card Header -->
                            <div class="card-header bg-transparent">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0">Welcome!</h6>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body">

                                <!-- User Info Section -->
                                <div class="d-flex align-items-center mb-3">
                                    <!-- Square Profile Image -->
                                    <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="User Photo" class="me-3"
                                        style="width:100px; height:100px;  border-radius:4px;">

                                    <!-- Labels and Values -->
                                    <div class="d-flex flex-column">
                                        <div class="mb-1">
                                            <span class="fw-bold">Name:</span>
                                            <span>{{ Auth::user()->first_name }}</span>
                                        </div>
                                        <div class="mb-1">
                                            <span class="fw-bold">Position</span>
                                            <span>{{ Auth::user()->job_title }}</span>
                                        </div>
                                        <div>
                                            <span class="fw-bold">Date:</span>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Chart Section -->
                                <div class="chart-container-1">
                                    <canvas id="chart18"></canvas>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div><!--end row-->



            </tr>
            </table>
        </div>

    </div>
    </div>

    </div>

    </div>
@endsection
