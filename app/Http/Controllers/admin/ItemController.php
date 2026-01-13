<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Item;
use App\Models\Product;
use App\Models\ItemHistory;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ItemController extends Controller
{
    public function __construct()
    {
        // Apply policy to all resource methods
      
    }

    public function index(Request $request)
    {
        $productTypes = Product::select('id', 'name')->orderBy('name')->get();

        $item = Item::query()
            ->with(['branch', 'product', 'creator'])
            ->where('verification_status', 'approved')
            ->when($request->name, fn($q) => $q->where('name', 'like', "%{$request->name}%"))
            ->when($request->model, fn($q) => $q->where('model', 'like', "%{$request->model}%"))
            ->when($request->tag_number, fn($q) => $q->where('tag_number', 'like', "%{$request->tag_number}%"))
            ->when($request->product_id, fn($q) => $q->where('product_id', $request->product_id))
            ->paginate(8)
            ->withQueryString();

        return view('admin.item.index', compact('item', 'productTypes'));
    }

    public function create()
    {
      

        $branch = Branch::all();
        $category = Category::all();
        $product = Product::all();
        $supplier= Supplier::all();

        return view('admin.item.create', compact('branch', 'category', 'product','supplier'));
    }

    public function store(Request $request)
    {
       

        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'model'         => 'required|string|max:255',
            'tag_number'    => 'required|string|max:100|unique:items,tag_number',
            'serial_number' => 'nullable|string|max:100',
            'status'        => 'required|in:New,Used,Damaged',
            'branch_id'     => 'nullable|exists:branches,id',
            'category_id'   => 'required|exists:categories,id',
            'product_id'    => 'required|exists:products,id',
            'author'        => 'required|string|max:100',
            'remark'        => 'nullable|string|max:500',
            'pur_date'      => 'required|date',
            'issue_date'    => 'nullable|date|after_or_equal:pur_date',
            'supplier_id'   => 'nullable|exists:suppliers,id',
            'life'          => 'required|date',
        ]);

        $validated['created_by'] = auth()->id();

        // Auto-verify for admin and Superuser, else pending
        if (auth()->user()->isAdmin() || auth()->user()->isSuperuser() ) {
            $validated['verification_status'] = 'approved';
            $validated['verified_by'] = auth()->id();
        } else {
            $validated['verification_status'] = 'pending';
            $validated['verified_by'] = null;
        }

        Item::create($validated);

        $message = auth()->user()->isAdmin() || auth()->user()->isSuperuser()
            ? 'Item created successfully and automatically approved.'
            : 'Item created successfully and sent for verification.';

        return redirect()->back()->with('success', $message);
    }

    public function edit(string $id)
    {
        $item = Item::with(['branch', 'category', 'product','supplier'])->findOrFail($id);
    

        $branch = Branch::all();
        $category = Category::all();
        $product = Product::all();
        $supplier=Supplier::all();

        return view('admin.item.edit', compact('item', 'branch', 'category', 'product','supplier'));
    }

public function update(Request $request, string $id)
{
    $item = Item::findOrFail($id);

    // Fields we want to track
    $trackedFields = [
        'name', 'model', 'tag_number', 'serial_number', 'status',
        'branch_id', 'category_id', 'product_id', 'pur_date',
        'remark', 'supplier_id', 'life'
    ];

    // Capture OLD values
    $oldData = $item->only($trackedFields);

   $validated = $request->validate([
    'name'          => 'required|string|max:255',
    'model'         => 'required|string|max:255',
    'tag_number'    => 'required|string|max:255',
    'serial_number' => 'required|string|max:255',
    'status'        => 'required|in:New,Used,Damaged',
    'branch_id'     => 'nullable|exists:branches,id',
    'category_id'   => 'required|exists:categories,id',
    'product_id'    => 'required|exists:products,id',
    'pur_date'      => 'nullable|date',
    'remark'        => 'nullable|string|max:500',
    'supplier_id'   => 'nullable|exists:suppliers,id',
    'life'          => 'required|date',
]);

$item->update($validated + [
    'author' => auth()->user()->username
]);


    // Capture NEW values
    $newData = $item->only($trackedFields);

    // Detect changes
    $changes = array_diff_assoc($newData, $oldData);

    if (!empty($changes)) {
        $descriptions = [];

        foreach ($changes as $field => $newValue) {
            $oldValue = $oldData[$field];

            // Convert foreign keys to names
            switch ($field) {
                case 'category_id':
                    $oldValue = optional(\App\Models\Category::find($oldValue))->name ?? 'None';
                    $newValue = optional(\App\Models\Category::find($newValue))->name ?? 'None';
                    break;

                case 'supplier_id':
                    $oldValue = optional(\App\Models\Supplier::find($oldValue))->name ?? 'None';
                    $newValue = optional(\App\Models\Supplier::find($newValue))->name ?? 'None';
                    break;

                case 'branch_id':
                    $oldValue = optional(\App\Models\Branch::find($oldValue))->name ?? 'None';
                    $newValue = optional(\App\Models\Branch::find($newValue))->name ?? 'None';
                    break;
            }

            $descriptions[] = "updated {$field} ({$oldValue} → {$newValue})";
        }

        ItemHistory::create([
            'item_id'        => $item->id,
            'user_id'        => auth()->id(),
            'action'         => 'updated',
            'from_branch_id' => $oldData['branch_id'],
            'to_branch_id'   => $item->branch_id,
            'description'    => auth()->user()->username . ' ' . implode(', ', $descriptions),
        ]);
    }

    return redirect()
        ->route('admin.allitem')
        ->with('success', 'Item updated successfully!');
}


    public function destroy(string $id)
    {
        $item = Item::findOrFail($id);
       

        $item->delete();

        return redirect()->back()->with('success', 'Item deleted successfully!');
    }

    public function detail(string $id)
    {
        $item = Item::with(['branch', 'category','supplier'])->findOrFail($id);
       

        return view('admin.item.detail', compact('item'));
    }

    public function issue(Request $request, string $id)
    {
        $item = Item::with(['branch', 'category'])->findOrFail($id);
       

        $branch = Branch::all();
        return view('admin.item.issue', compact('item', 'branch'));
    }

    public function issued(Request $request, string $id)
    {
        $item = Item::findOrFail($id);
        

        $oldBranch = $item->branch_id;

        $item->update([
            'branch_id'  => $request->branch_id,
            'location'   => $request->location,
            'author'     => $request->author,
            'issue_date' => $request->issue_date,
        ]);

        ItemHistory::create([
            'item_id'        => $item->id,
            'user_id'        => Auth::id(),
            'action'         => 'issued',
            'from_branch_id' => $oldBranch,
            'to_branch_id'   => $request->branch_id,
            'description'    => Auth::user()->name . ' issued this item',
        ]);

        return redirect()->back()->with('success', 'Item issued successfully!');
    }

  // make sure to import

public function stock(Request $request)
{
    $query = Item::where('verification_status', 'approved')
        ->whereHas('branch', fn($q) => $q->where('name', 'Stock'))
        ->with('branch');

    // Filters
    if ($request->filled('name')) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }
    if ($request->filled('model')) {
        $query->where('model', 'like', '%' . $request->model . '%');
    }
    if ($request->filled('tag_number')) {
        $query->where('tag_number', 'like', '%' . $request->tag_number . '%');
    }
    if ($request->filled('product_id')) {
        $query->where('product_id', $request->product_id);
    }
    if ($request->filled('search')) {
        $query->where(fn($q) => 
            $q->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('model', 'like', '%' . $request->search . '%')
              ->orWhere('tag_number', 'like', '%' . $request->search . '%')
              ->orWhere('serial_number', 'like', '%' . $request->search . '%')
        );
    }

    $item = $query->get();

    // Get all product types for the filter dropdown
    $productTypes = Product::all();

    return view('admin.item.stock', compact('item', 'productTypes'));
}



    public function lifecycle(string $id)
    {
        $item = Item::with([
            'histories.user',
            'histories.fromBranch',
            'histories.toBranch'
        ])->findOrFail($id);

      

        return view('admin.item.lifecycle', compact('item'));
    }
}
