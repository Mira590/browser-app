<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier=Supplier::paginate(8);
        return view('admin.supplier.index',compact('supplier'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.supplier.supp');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

   $valid= $request->validate([
            
           
            'name'  =>'required|string|unique:suppliers,name',
            'cont_person'     =>'nullable|string|max:20',
            'website'      =>'nullable|string|max:255',
            'email'      =>'nullable|email|unique:suppliers,email',
            'type'      =>'required|string',
            'licence'  =>'required|string|unique:suppliers,licence',
            'exp_licence'  =>'required|date',
            'phone'  =>'required|max:14',
            'desc'  =>'nullable|string',
            'address'  =>'nullable|string',
   ]);
          

         Supplier::create($valid);

         return redirect()->back()->with('success', 'Supplier Created Successfully!');
   
            }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = Supplier::findOrFail($id);

    return view('admin.supplier.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $supplier= Supplier::findorFail($id);
        return view('admin.supplier.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        

        $supplier=Supplier::findorFail($id);



        $supplier->name= $request->name;
        $supplier->cont_person=$request->cont_person;
        $supplier->type=$request->type;
        $supplier->phone=$request->phone;
        $supplier->website=$request->website;
        $supplier->email=$request->email;
        $supplier->licence=$request->licence;
        $supplier->exp_licence=$request->exp_licence;
        $supplier->address=$request->address;
        $supplier->desc=$request->desc;
       


        $supplier->update();

        return redirect()->route('admin.suppliers')->with('success','Supplier Updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supply = Supplier::findOrFail($id);
       

        $supply->delete();

        return redirect()->back()->with('success', 'Supplier deleted successfully!');
    
    }
}
