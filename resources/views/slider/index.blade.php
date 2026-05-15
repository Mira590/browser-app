@extends('admin.master')

@section('content')

<!-- breadcrumb -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Create Slider</div>

    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item">
                    <a href="javascript:;">
                        <i class="bx bx-home-alt"></i>
                    </a>
                </li>
                <li class="breadcrumb-item active">Create Slider</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid">
    <div class="main-body">
        <div class="d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-sm">
                    <form id="sliderForm" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Title</h6>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="title">
                                    <span class="text-danger small" id="titleError"></span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Picture</h6>
                                </div>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="pic">
                                    <span class="text-danger small" id="picError"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-4">Save</button>
                                </div>
                            </div>

                            <div class="mt-3" id="successMsg"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$('#sliderForm').on('submit', function(e) {
    e.preventDefault();

    $('#titleError').text('');
    $('#picError').text('');
    $('#successMsg').html('');

    let formData = new FormData(this);

    $.ajax({
        url: "{{ route('admin.store.slider') }}",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,

        success: function(response) {
            $('#successMsg').html('<div class="alert alert-success">' + response.message + '</div>');
            $('#sliderForm')[0].reset();
        },

        error: function(xhr) {
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                let errors = xhr.responseJSON.errors;

                if (errors.title) {
                    $('#titleError').text(errors.title[0]);
                }

                if (errors.pic) {
                    $('#picError').text(errors.pic[0]);
                }
            }
        }
    });
});
</script>

@endsection
