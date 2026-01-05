<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Product;
use App\Models\Category;
use App\Models\Branch;
use Barryvdh\DomPDF\Facade\Pdf;


class ItemReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products= Product::all();
        $items=Item::all();
        $categories=Category::all();
        $branches=Branch::all();
        return view('admin.report.report',compact('products','items','categories','branches'));
    }
   public function generate(Request $request)
    {
        $query = Item::query();

        if ($request->product_id) {
            $query->where('product_id', $request->product_id);
        }

        if ($request->location) {
            $query->where('location', $request->location);
        }

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->branch_id) {
            $query->where('branch_id', $request->branch_id);
        }

        $items = $query->get();

        if ($request->type === 'csv') {
            return $this->exportCSV($items);
        }

        if ($request->type === 'pdf') {
            return $this->exportPDF($items);
        }

        return back();
    }
       private function exportCSV($items)
    {
        $filename = "items_report.csv";

        $headers = [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename"
        ];

        $callback = function () use ($items) {
            $file = fopen('php://output', 'w');

            fputcsv($file, [
                'Name', 'Model', 'Product', 'Tag', 'Serial', 'Location'
            ]);

            foreach ($items as $item) {
                fputcsv($file, [
                    $item->name,
                    $item->model,
                    optional($item->product)->name,
                    $item->tag_number,
                    $item->serial_number,
                    $item->location
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    private function exportPDF($items)
    {
       $pdf = Pdf::loadView('admin.report.report_pdf', compact('items'));

        return $pdf->download('items_report.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
