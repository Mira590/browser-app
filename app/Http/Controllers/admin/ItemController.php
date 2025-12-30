<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $item=Item::all();
        return view('admin.item.index',compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $branch= Branch::all();
        $category=Category::all();
        return view('admin.item.create',compact('branch','category'));
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
        'location' => 'required|string|max:100',
        'branch_id' => 'nullable|exists:branches,id',
        'category_id' => 'required|exists:categories,id',
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
        $item = Item::with(['branch', 'category'])->findOrFail($id);
         $branch = Branch::all();
         $category = Category::all();

        return view('admin.item.edit',compact('item','branch','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $item = Item::findOrFail($id);

    // ✅ Validation
    $request->validate([
        'name'          => 'required|string|max:255',
        'model'         => 'required|string|max:255',
        'tag_number'    => 'required|string|max:255',
        'serial_number' => 'required|string|max:255',
        'status'        => 'required|in:New,Used,Damaged',
        'location'      => 'required|in:Stock,Branch,Data_Center',
        'branch_id'     => 'nullable|exists:branches,id',
        'category_id'   => 'required|exists:categories,id',
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
}
