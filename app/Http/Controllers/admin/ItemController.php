<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Category;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
        $data=$request->validate([

            'name' =>'required|string|max:255',
            'Model'  =>'required|string|max:255',
            'tag_number' =>'nullable|unique:items,tag_number',
            'serial_number'  =>'required|string|max:255|unique:items,serial_number',
            'status'  =>'required|in:New,Normal,OutOfUse',
            'location'     =>'required|in:Stock,Branch',
            'branch_id'      =>'nullable|string|max:255',
            'category_id'       =>'required|string',
            
            'remark'        =>'nullable|string|max:255',
            'Pur_date'   =>'required|max:255',
            
        ]);


        Item::create($data);
        return redirect()->back()->with('success','Item imported in stock!');
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
