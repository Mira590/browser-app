<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $category= Category::paginate(10);
        return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('admin.category.create');   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([

            'name'=>'string|max:255',
           ]);

           $category= new Category();


           $category->name=$request->name;

           $category->save();

           return redirect()->back()->with('sccess','Category Created Successfully!');
          


           
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
        $category= Category::findorFail($id);

        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([

            'name'=>'string|max:255',
            
        ]);

        $category=Category::findorFail($id);



        $category->name= $request->name;
        

        $category->update();

        return redirect()->route('admin.allcategory')->with('success','Category Updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $category=Category::findorFail($id);

        $category->delete();
        return redirect()->back()->with('success','Category Successfully Removed!');
    }
}
