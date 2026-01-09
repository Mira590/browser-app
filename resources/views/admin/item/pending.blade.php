@extends('admin.master')

@section('content')
 


<div class="container">
    <h3>Pending Items for Verification</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Model</th>
                <th>Added By</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->model }}</td>
                <td>{{ $item->creator->username }}</td>
                <td>{{ $item->creator->department->name ?? '-' }}</td>
                <td>
                    <form action="{{ route('admin.approve',$item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="btn btn-success btn-sm">Approve</button>
                    </form>

                    <form action="/items/{{ $item->id }}/reject" method="POST" style="display:inline;">
                        @csrf
                        <button class="btn btn-danger btn-sm">Reject</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


    @endsection
