<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Items Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            font-size: 11px;
            text-align: left;
        }
        th { background: #f2f2f2; }
    </style>
</head>
<body>

<h3>Items Report</h3>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Item Name</th>
            <th>Model</th>
            <th>Product</th>
            <th>Category</th>
            <th>Branch</th>
            <th>Location</th>
        </tr>
    </thead>
    <tbody>
        @forelse($items as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->model }}</td>
                <td>{{ optional($item->product)->name }}</td>
                <td>{{ optional($item->category)->name }}</td>
                <td>{{ optional($item->branch)->name }}</td>
                <td>{{ $item->location }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="7" style="text-align:center;">No records found</td>
            </tr>
        @endforelse
    </tbody>
</table>

</body>
</html>
