<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\View;

class CustomerController extends Controller
{
    public function index(){
        $customer = User::Where('role_id',3)->OrderBy('id','desc')->paginate(3);
        return view::make('backend.customer.index', ['users' => $customer]);
    }
    public function create(){
        return view::make('backend.customer.create');
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
        return redirect()->route('customers.create')->with("Success","YOUR APPLICATION HAS BEEN SUBMITTED");
    }
    public function edit($id){
        $customer = User::find($id);
        return view::make('backend.customer.edit',['users' => $customer]);
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
        $customer = User::find($request->id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->role_id = config('roles.role.customer');
        $customer->update();
        return redirect()->route('customers.index')->with("Success","form have been submitted");
    }
    public function show(){

    }
    public function destroy($id){
        $customer = User::find($id);
        if (!empty($customer)){
        $customer->delete();
        }else{

        }
        return redirect()->route('customers.index');
    }
}
