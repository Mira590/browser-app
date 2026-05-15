<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class LinkController extends Controller
{
    public function index(){
       
         return view('link.index');
    }
    public function list(){
        $links = Link::latest()->get();
        return view('link.list', compact('links'));
      
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'path' => 'required',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);
         $iconName = null;

        if ($request->hasFile('icon')) {

            $file = $request->file('icon');

            $iconName = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/icons'), $iconName);
        }
         Link::create([
            'name' => $request->name,
            'path' => $request->path,
            'icon' => $iconName
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Link inserted successfully'
        ]);
    }
    public function edit($id)
{
    $link = Link::find($id);

    return response()->json($link);
}
     public function update(Request $request, $id)
    {
        $link = Link::find($id);

        $iconName = $link->icon;

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $iconName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/icons'), $iconName);
        }

        $link->update([
            'name' => $request->name,
            'path' => $request->path,
            'icon' => $iconName
        ]);

        return response()->json(['message' => 'Updated successfully']);
    }
     public function destroy($id)
    {
        Link::find($id)->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
}
