<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Item;
use App\Models\Product;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  /* public function index()
{
    $item = Item::with('branch')->paginate(8);
    return view('admin.item.index', compact('item'));
}
*/


public function index(Request $request)
{
    $productTypes = Product::select('id', 'name')
        ->orderBy('name')
        ->get();

    $item = Item::query()
        ->with(['branch', 'product'])
        ->when($request->name, fn ($q) =>
            $q->where('name', 'like', "%{$request->name}%")
        )
        ->when($request->model, fn ($q) =>
            $q->where('model', 'like', "%{$request->model}%")
        )
        ->when($request->tag_number, fn ($q) =>
            $q->where('tag_number', 'like', "%{$request->tag_number}%")
        )
        ->when($request->product_id, function ($q) use ($request) {
            $q->whereHas('product', function ($p) use ($request) {
                $p->where('id', $request->product_id);
            });
        })
        ->paginate(8)
        ->withQueryString();

    return view('admin.item.index', compact('item', 'productTypes'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $branch= Branch::all();
        $category=Category::all();
        $product=Product::all();
        return view('admin.item.create',compact('branch','category','product'));
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'tag_number' => 'required|string|max:100|unique:items,tag_number',
        'serial_number' => 'nullable|string|max:100',
        'status' => 'required|in:New,Used,Damaged',
        //'location' => 'required|string|max:100',
        'branch_id' => 'nullable|exists:branches,id',
        'category_id' => 'required|exists:categories,id',
        'product_id' => 'required|exists:products,id',
        'author' => 'required|string|max:100',
        'remark' => 'nullable|string|max:500',
        'pur_date' => 'required|date',
        'issue_date' => 'nullable|date|after_or_equal:pur_date',
    ]);

    Item::create($validated);

    return redirect()->back()->with('success', 'Item created successfully');
}
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Item::with(['branch', 'category','product'])->findOrFail($id);
         $branch = Branch::all();
         $category = Category::all();
         $product=Product::all();

        return view('admin.item.edit',compact('item','branch','category','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $item = Item::findOrFail($id);

   
    $request->validate([
        'name'          => 'required|string|max:255',
        'model'         => 'required|string|max:255',
        'tag_number'    => 'required|string|max:255',
        'serial_number' => 'required|string|max:255',
        'status'        => 'required|in:New,Used,Damaged',
        'location'      => 'required|in:Stock,Branch,Data_Center',
        'branch_id'     => 'nullable|exists:branches,id',
        'category_id'   => 'required|exists:categories,id',
        'product_id'   => 'required|exists:products,id',
        'pur_date'      => 'nullable|date',
        'remark'        => 'nullable|string|max:500',
    ]);

    
    $item->update([
        'name'          => $request->name,
        'model'         => $request->model,
        'tag_number'    => $request->tag_number,
        'serial_number' => $request->serial_number,
        'status'        => $request->status,
        'location'      => $request->location,
        'branch_id'     => $request->branch_id,
        'product_id'     => $request->product_id,
        'category_id'   => $request->category_id,
        'pur_date'      => $request->pur_date,
        'remark'        => $request->remark,
        'author'        => auth()->user()->username,
    ]);

    return redirect()
        ->route('admin.allitem')
        ->with('success', 'Item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item= Item::findorFail($id);

        $item->delete();
        return redirect()->back()->with('success','Item Deleted Successfully!');
    }

    public function detail(string $id){
        $item = Item::with(['branch', 'category'])->findOrFail($id);

        return view('admin.item.detail',compact('item'));
    }

    public function issue(Request $request,string $id){
         $item = Item::with(['branch', 'category'])->findOrFail($id);
         $branch= Branch::all();
         return view('admin.item.issue',compact('item','branch'));

    }

    public function issued(Request $request , string $id){


        $item = Item::findorFail($id);

        

        $item->update([

            'branch_id'=>$request->branch_id,
            'location'=>$request->location,
            'author'=>$request->author,
            'issue_date'=>$request->issue_date,
            
        ]);

        return redirect()->back()->with('success','Item issued Successfully!');
        


    }
    public function stock(){
        $item = Item::whereHas('branch', function ($query) {
    $query->where('name', 'Stock');
})->with('branch')->get();

       // $item=Item::where('location','Stock')->get();
        return view('admin.item.stock',compact('item'));
    }
}
