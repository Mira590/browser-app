@extends('admin.master')

@section('content')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <h5>Sliders List</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Picture</th>
                        <th width="180">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sliders as $key => $slider)
                        <tr id="row{{ $slider->id }}">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $slider->title }}</td>
                            <td>
                                @if($slider->pic)
                                    <img src="{{ asset('uploads/sliders/'.$slider->pic) }}"
                                         width="80"
                                         height="50"
                                         style="object-fit:cover;border-radius:5px;">
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-warning btn-sm editBtn" data-id="{{ $slider->id }}">Edit</button>
                                <button class="btn btn-danger btn-sm deleteBtn" data-id="{{ $slider->id }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Slider</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="edit_id">
                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" id="edit_title" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Picture</label>
                    <input type="file" id="edit_pic" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updateBtn">Update</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function () {
    $(document).on('click', '.editBtn', function () {
        let id = $(this).data('id');

        $.ajax({
            url: "/admin/edit-slider/" + id,
            type: "GET",
            success: function (data) {
                $('#edit_id').val(data.id);
                $('#edit_title').val(data.title);

                let modal = new bootstrap.Modal(document.getElementById('editModal'));
                modal.show();
            }
        });
    });

    $(document).on('click', '#updateBtn', function () {
        let id = $('#edit_id').val();

        let formData = new FormData();
        formData.append('title', $('#edit_title').val());
        formData.append('_token', '{{ csrf_token() }}');

        if ($('#edit_pic')[0].files[0]) {
            formData.append('pic', $('#edit_pic')[0].files[0]);
        }

        $.ajax({
            url: "/admin/update-slider/" + id,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                let modalEl = document.getElementById('editModal');
                let modal = bootstrap.Modal.getInstance(modalEl);
                modal.hide();

                Swal.fire('Updated!', res.message, 'success');
                location.reload();
            }
        });
    });

    $(document).on('click', '.deleteBtn', function () {
        let id = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes delete'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/admin/delete-slider/" + id,
                    type: "DELETE",
                    data: { _token: '{{ csrf_token() }}' },
                    success: function (res) {
                        $('#row' + id).remove();
                        Swal.fire('Deleted!', res.message, 'success');
                    }
                });
            }
        });
    });
});
</script>

@endsection
