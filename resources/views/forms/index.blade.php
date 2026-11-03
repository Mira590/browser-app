@extends('admin.master')

@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Manage Forms</div>
</div>

<div class="container-fluid">
    @if (session('status'))
        <div class="alert alert-success" role="status">{{ session('status') }}</div>
    @endif

    <div class="card shadow-sm mb-4">
        <div class="card-header">
            <h5 class="mb-0">Upload a form</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.forms.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label for="formTitle" class="form-label">Form name</label>
                        <input id="formTitle" name="title" type="text" class="form-control" value="{{ old('title') }}" maxlength="255" required>
                        @error('title')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="formCategory" class="form-label">Category</label>
                        <select id="formCategory" name="category" class="form-select" required>
                            @foreach ($categories as $value => $label)
                                <option value="{{ $value }}" @selected(old('category', 'operation') === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="formFile" class="form-label">File</label>
                        <input id="formFile" name="file" type="file" class="form-control" accept=".pdf,.doc,.docx,.odt,.xls,.xlsx,.ods" required>
                        <div class="form-text">PDF, Word, or Excel documents up to 10 MB.</div>
                        @error('file')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Upload form</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="mb-0">Available forms</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Form name</th>
                            <th>Category</th>
                            <th>File type</th>
                            <th>Added</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($forms as $form)
                            <tr>
                                <td>{{ $form->title }}</td>
                                <td>{{ $categories[$form->category] ?? $categories['operation'] }}</td>
                                <td>{{ strtoupper(pathinfo($form->file_path, PATHINFO_EXTENSION)) }}</td>
                                <td>{{ $form->created_at->format('Y-m-d') }}</td>
                                <td class="text-nowrap">
                                    <a class="btn btn-sm btn-outline-primary" href="{{ asset('forms/'.rawurlencode($form->file_path)) }}" download>Download</a>
                                    <form action="{{ route('admin.forms.destroy', $form) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this form?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No forms have been uploaded.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($forms->hasPages())
                <div class="mt-3">
                    {{ $forms->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
