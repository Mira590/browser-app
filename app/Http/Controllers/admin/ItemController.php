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
