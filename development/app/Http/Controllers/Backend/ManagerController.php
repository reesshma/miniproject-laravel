<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\View;

class ManagerController extends Controller
{
    public function index(){
        $manager = User :: all();
        return view::make('backend.admin.manager.index', ['users' => $manager]);
    }
    public function create(){
        return view::make('backend.admin.manager.create');
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
        $manager = new User;
        $manager->name = $request->name;
        $manager->email = $request->email;
        $manager->password = bcrypt($request->password);
        $manager->role_id = config('roles.role.manager');
        $manager->save();

    }
    public function edit($id){
        $manager = User::find($id);
        return view::make('backend.admin.manager.edit',['users' => $manager]);
    }
    public function update($id,Request $request){
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
        $manager = User :: find($request->id);
        $manager->name = $request->name;
        $manager->email = $request->email;
        $manager->password = bcrypt($request->password);
        $manager->role_id = config('roles.role.manager');
        $manager->update();
        return redirect()->route('backend.admin.manager.index');
    }
    public function show(){

    }
    public function destroy($id){
        $manager = User :: find($id);
        $manager->delete();
    }
}
