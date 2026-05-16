@extends('admin.master')

@section('content')

<!-- breadcrumb -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Create Paths</div>

    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item">
                    <a href="javascript:;">
                        <i class="bx bx-home-alt"></i>
                    </a>
                </li>
                <li class="breadcrumb-item active">Create Link</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid">
    <div class="main-body">

        <div class="d-flex justify-content-center align-items-center">

            <div class="col-lg-6 col-md-8">

                <div class="card shadow-sm">

                    <!-- AJAX FORM -->
                    <form id="linkForm" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">

                            <!-- Name -->
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Path Name</h6>
                                </div>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name">
                                    <span class="text-danger small" id="nameError"></span>
                                </div>
                            </div>

                            <!-- Path -->
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Path</h6>
                                </div>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="path">
                                    <span class="text-danger small" id="pathError"></span>
                                </div>
                            </div>

                            <!-- Icon -->
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Icon</h6>
                                </div>

                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="icon">
                                    <span class="text-danger small" id="iconError"></span>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="row">
                                <div class="col-sm-3"></div>

                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-4">
                                        Save
                                    </button>
                                </div>
                            </div>

                            <!-- Success Message -->
                            <div class="mt-3" id="successMsg"></div>

                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>

<script>
$('#linkForm').on('submit', function(e) {
    e.preventDefault();

    // clear old errors
    $('#nameError').text('');
    $('#pathError').text('');
    $('#iconError').text('');
    $('#successMsg').html('');

    let formData = new FormData(this);

    $.ajax({
        url: "{{ route('admin.store.link') }}",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,

        success: function(response) {

            $('#successMsg').html(
                '<div class="alert alert-success">' + response.message + '</div>'
            );

            $('#linkForm')[0].reset();
        },

        error: function(xhr) {

            if (xhr.responseJSON.errors) {

                let errors = xhr.responseJSON.errors;

                if (errors.name) {
                    $('#nameError').text(errors.name[0]);
                }

                if (errors.path) {
                    $('#pathError').text(errors.path[0]);
                }

                if (errors.icon) {
                    $('#iconError').text(errors.icon[0]);
                }
            }
        }
    });
});
</script>

@endsection