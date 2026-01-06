<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class AdminController extends Controller
{
    public function login(){

        return view('admin.login.index');
    }

    public function index()
    {


        //$stock=Item::where('location','Stock')->count();
        //$data=Item::where('location','Data_Center')->count();
        $stock = Item::whereHas('branch', function ($query) {
        $query->where('name', 'Stock'); })->count();

          $data = Item::whereHas('branch', function ($query) {
         $query->where('name', 'Data_Center');
          })->count();


     
        // $pc = Item::where('product_id', 1)
          //->where('location', 'Stock')
          //->count();


        return view('admin.dashboard.index',compact('stock','data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
   
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
