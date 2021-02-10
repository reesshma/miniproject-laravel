<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\View;

class CustomerController extends Controller
{
    public function index(){
        $customer = User :: all();
        return view::make('backend.admin.customer.index', ['users' => $customer]);
    }
    public function create(){
        return view::make('backend.admin.customer.create');
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
        $customer = new User;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->role_id = config('roles.role.customer');
        $customer->save();
    }
    public function edit($id){
        $customer = User::find($id);
        return view::make('backend.admin.customer.edit',['users' => $customer]);
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
        $customer = User :: find($request->id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->role_id = config('roles.role.customer');
        $customer->update();
        return redirect()->route('customers.index');
    }
    public function show(){

    }
    public function destroy($id){
        $customer = User :: find($id);
        $customer->delete();
    }
}
