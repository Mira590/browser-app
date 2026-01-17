<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function  change(){

        return view('admin.user.change');
    }

public function updatepassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        // Check current password
        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->withErrors([
                'current_password' => 'Current password is incorrect.',
            ]);
        }

        // Update password
        auth()->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Password changed successfully!');
    }

    public function index()
    {

        $users=User::paginate(10);
         return view('admin.user.all',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $dep= Department::all();
        return view('admin.user.index',compact('dep'));
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
    public function edit(Request $request,$id){


       $user=User::findorFail($id);
        return view('admin.user.edit',compact('user'));
    }
  public function update(Request $request, string $id)
{
    $user = User::findOrFail($id);

    

    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->email = $request->email;
    $user->job_title = $request->job_title;
    $user->username = $request->username;
    $user->phone = $request->phone;
    $user->azbid = $request->azbid;
    $user->role = $request->role;
    $user->status = $request->status;
    $user->bio = $request->bio;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

  if ($request->hasFile('photo')) {
    // Delete old photo if exists
    if ($user->photo && Storage::disk('public')->exists('users/' . $user->photo)) {
        Storage::disk('public')->delete('users/' . $user->photo);
    }

    $file = $request->file('photo');
    $filename = time() . '_' . $file->getClientOriginalName();

    // Store file on 'public' disk in 'users' folder
    $file->storeAs('users', $filename, 'public');

    // Save relative path to DB
    $user->photo = 'users/' . $filename;
}

    $user->save();

    return redirect()->route('admin.allUsers')->with('success', 'User updated successfully!');
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
