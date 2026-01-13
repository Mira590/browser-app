<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Items Report</title>
    <style>
        body { 
            font-family: DejaVu Sans, sans-serif; 
        }
        .header {
    display: flex;
    
    align-items: center;
}

.logo-icon {
    width: 80px; /* adjust size if needed */
    height: auto;
}
.logo-icon {
    width: 80px; /* adjust size if needed */
    height: auto;
}

        h5 {
            color: black;
            
            margin-top: 12px;
            margin-bottom: 20px;
        }

        table { 
            width: 105%; 
            border-collapse: collapse; 
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            font-size: 11px;
            text-align: left;
        }
      

        th { 
            background: #f2f2f2; 
        }
    </style>
</head>
<body>

<div class="header">
    <h3>Azizi Bank</h3>
   <h5>IT Fixed Asset Report</h5>
</div>

<p style="font-size: 10px">Generate Date - {{ now()->format('d-m-Y') }}</p>


<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Item Name</th>
            <th>Model</th>
            <th>Tag Number</th>
            <th>Item Type</th>
            <th>Section</th>  
            <th>location</th>
            <th>Supplier</th>
            <th>Status</th>
            <th>Purchase Date</th>
            <th>Expire Date</th>
            
           
        </tr>
    </thead>
    <tbody>
        @forelse($items as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->model }}</td>
                <td>{{ $item->tag_number }}</td>
                <td>{{ optional($item->product)->name }}</td>
                <td>{{ optional($item->category)->name }}</td>
                <td>{{ optional($item->branch)->name }}</td>
                <td>{{ optional($item->supplier)->name }}</td>
                <td>{{$item->status}}</td>
                <td>{{$item->pur_date}}</td>
                <td>{{$item->life}}</td>
              
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
