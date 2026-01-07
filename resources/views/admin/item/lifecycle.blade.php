@extends('admin.master')

@section('content')
<div class="page-content">
  <h4 class="mb-3">
    Lifecycle – {{ $item->name }} ({{ $item->tag_number }})
</h4>

<table class="table table-bordered" style="background-color: #f8f9fa; border-color: #dee2e6;">
    <thead style="background-color: #e9ecef;">
        <tr>
            <th>#</th>
            <th>User</th>
            <th>Action</th>
            <th>From</th>
            <th>To</th>
            <th>Description</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody style="background-color: #f8f9fa;">

        @forelse($item->histories->sortByDesc('created_at') as $key => $log)
            <tr style="transition: background-color 0.2s;" 
    onmouseover="this.style.backgroundColor='#e2e6ea';" 
    onmouseout="this.style.backgroundColor='#f8f9fa';">
                <td>{{ $key + 1 }}</td>
                <td>{{ $log->user->username ?? 'System' }}</td>
                <td>
                    <span class="badge bg-info text-dark">
                        {{ ucfirst($log->action) }}
                    </span>
                </td>
                <td>{{ optional($log->fromBranch)->name ?? 'Stock' }}</td>
                <td>{{ optional($log->toBranch)->name ?? '-' }}</td>
                <td>{{ $log->description }}</td>
                <td>{{ $log->created_at->format('d M Y h:i A') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center text-muted">
                    No lifecycle history found
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<a href="{{ route('admin.allitem') }}" class="btn btn-secondary mt-3">
    Back
</a>
    @endsection
