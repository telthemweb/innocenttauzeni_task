<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        //this middleware will check if user is logged in
        // if you are not logged in it will redirect you back to login page!!
        $this->middleware('auth');
    }

    public function index()
    {
        //fetch all users from the table users
        $users = User::orderByDesc('created_at')->get();
        if (auth()->user()->can(['view users'], $users)) {
            $roles = Role::all();

            //we pass view data users and roles
            return view('users.index', compact('users', 'roles'));
        }
        abort(403, 'You are not allowed to view this page');
    }

    public function store(Request $request)
    {
        $user = new User;
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'gender' => 'required|string|max:50',
            'password' => [
                'required',
                'string',
                'min:6',
                'regex:/[A-Z]/', //uppercase
                'regex:/[a-z]/', //lowercase
                'regex:/[0-9]/', //at least 1 digit
                'regex:/[@$!%*#?&]/' //at least 1 special character
            ]
        ]);
        //check if you are allowed to create user
        if (auth()->user()->can(['create user'], $user)) {
            $name = $request->name;
            $phone =  $request->phone;
            $email =  $request->email;
            $gender = $request->gender;
            $role = $request->role;
            $password = Hash::make($request->password);

            //if validation fail it will throw error -validation error
            if ($validator->fails()) {
                return redirect()->route('users')
                    ->withErrors($validator)
                    ->withInput();
            }

            ///if all is correct system will create user and pass the respective role!!
            $user->name = $name;
            $user->phone = $phone;
            $user->email = $email;
            $user->gender = $gender;
            $user->password = $password;
            $user->save();
            //check if role is available!!
            $checkrole = Role::where('name', $role)->first();
            if ($checkrole) {
                $user->assignRole($role);
            }

            return redirect()->route('users')->withInput()->with('success', 'Account Created Sucessfully!!');
        }
        //if you are not allow to create user 
        abort(403, 'You are not allowed to create user!!');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        if (auth()->user()->can(['edit user'], $user)) {
            return view('users.edit', compact('user', 'roles'));
        }
        abort(403, 'You are not allowed to view this page');
    }

    //update user
    public function update(Request $request, $id)
    {
        $name = $request->name;
        $phone =  $request->phone;
        $email =  $request->email;
        $gender = $request->gender;

        $user = User::findOrFail($id);
        //check edit permission
        if (auth()->user()->can(['edit user'], $user)){
            $user->name = $name;
        $user->phone = $phone;
        $user->email = $email;
        $user->gender = $gender;
        $user->update([$user]);
        return redirect()->back()->withInput()->with('success', 'Account Updated Sucessfully!!');
        }
        abort(403, 'You are not allowed to update on this page');
        
    }


    //delete user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        //check delete permission
        if (auth()->user()->can(['edit user'], $user)){
            $user->delete();
        return redirect()->back()->with('success', 'Successfully deleted User');
        }
        abort(403, 'You are not allowed to delete on this page');
    }

}
