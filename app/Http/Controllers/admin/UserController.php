<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users=User::all();
         return view('admin.user.all',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
{
    $data = $request->validated();

    if ($request->hasFile('photo')) {
        $data['photo'] = $request->file('photo')->store('users', 'public');
    }

    $data['password'] = Hash::make($data['password']);

    User::create($data);

    return redirect()->back()->with('success', 'User Created Successfully!');
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
         $user=User::findOrFail($id);

        if($user->photo){

            $imagepath=public_path(parse_url($user->photo,PHP_URL_PATH));
            if(file_exists($imagepath)){
                unlink($imagepath);
            }
        }


          $user->delete();

    return redirect()->back()->with('success','User Deleted Successfully');

    }
}
