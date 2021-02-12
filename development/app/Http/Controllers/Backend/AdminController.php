<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function index(){
        $admin = User::Where('role_id',1)->OrderBy('id','desc')->paginate(3);
        return view::make('backend.admin.index', ['users' => $admin]);
    }
    public function create(){
        return view::make('backend.admin.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:10|max:15',
            'email' => 'required|min:9|max:30',
            'password' => 'required|min:6|regex:/^.+@.+$/i|max:15',
            ],[
            'name.required' => 'Name is Required',
            'name.min' => 'Name should be atleast :min characters',
            'name.max' => 'Name should not be greater than :max characters',
            'email.required' => 'email is Required',
            'email.min' => 'email should be atleast :min characters',
            'email.max' => 'email should not be greater than :max characters',
            'password.required' => 'Password is required',
            'password.min' => 'Password should be atleast:min characters',
            'password.max' => 'Password should be atleast:max characters',
                ]);
        $admin = new User;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->role_id = config('roles.role.admin');
        $admin->save();
        return redirect()->route('admins.index')->with("Success","YOUR APPLICATION HAS BEEN SUBMITTED");
    }
    public function edit($id){
        $admin = User::find($id);
        return view::make('backend.admin.edit',['users' => $admin]);
    }
    public function update($id,Request $request){
        $request->validate([
            'name' => 'required|min:10|max:15',
            'email' => 'required|min:9|max:30|unique:users,email,'.$id,
            'password' => 'required|min:6|regex:/^.+@.+$/i|max:15',
            ],[
            'name.required' => 'Name is Required',
            'name.min' => 'Name should be atleast :min characters',
            'name.max' => 'Name should not be greater than :max characters',
            'email.required' => 'email is Required',
            'email.min' => 'email should be atleast :min characters',
            'email.max' => 'email should not be greater than :max characters',
            'password.required' => 'Password is required',
            'password.min' => 'Password should be atleast:min characters',
            'password.max' => 'Password should be atleast:max characters',
                ]);
        $admin = User::find($request->id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->role_id = config('roles.role.admin');
        $admin->update();
        return redirect()->route('admins.index')->with("Success","YOUR APPLICATION HAS BEEN SUBMITTED");
    }
    public function show(){

    }
    public function destroy($id){
        $admin = User::find($id);
        if (!empty($admin)){
            $admin->delete();
            }else{
    
            }
        return redirect()->route('admins.index');

    }
}
