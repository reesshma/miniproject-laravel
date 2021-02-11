<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\View;
use Carbon\Carbon ;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        return view::make('backend.product.index', ['users' => $product]);
    }
    public function create(){
        return view::make('backend.product.create');
    }
    public function store(Request $request){
        $request->validate([
            'product_name' => 'required|min:5|max:20',
            'sku' => 'required',
            'quantity' => 'required|min:1|max:3',
            'product_image' => 'required|mimes:jpg, png, gif, svg, jpeg',
        ],[
            'product_name.required' => 'Enter the ProductName',
            'product_name.min' => 'ProductName should be atleast :min characters',
            'product_name.max' => 'ProductName should not be greater than :max characters',
            'sku.required' => 'Enter your SKU',
            'quantity.required' => 'Enter the Quantity',
            'quantity.min' => 'Fill the Quantity',
            'quantity.max' => 'Fill the quantity',
            'product_image' => 'required|mimes:jpg,png,svg,gif,jpeg',
        ]);
        $timeStamp = Carbon::now()->format('Y_m_d_H_i_s');
        $fileExtension = $request->product_image->extension();
        $fileName = $timeStamp.'.'.$fileExtension;
        $request->product_image->storeAs('public/images', $fileName);
        $product = new Product;
        $product->product_name = $request->product_name;
        $product->sku = $request->sku;
        $product->quantity = $request->quantity;
        $product->product_image = $fileName;
        $product->save();
        return redirect()->route('products.index');
    }
    public function edit($id){
        $product = Product::find($id);
        return view::make('backend.product.edit',['users' => $product]);
    }
    public function update($id,Request $request){
        $request->validate([
            'product_name' => 'required|min:5|max:20',
            'sku' => 'required',
            'quantity' => 'required|min:1|max:3',
            'product_image' => 'required|mimes:jpg, png, gif, svg, jpeg',
        ],[
            'product_name.required' => 'Enter the ProductName',
            'product_name.min' => 'ProductName should be atleast :min characters',
            'product_name.max' => 'ProductName should not be greater than :max characters',
            'sku.required' => 'Enter your SKU',
            'quantity.required' => 'Enter the Quantity',
            'quantity.min' => 'Fill the Quantity',
            'quantity.max' => 'Fill the quantity',
            'product_image' => 'required|mimes:jpg,png,svg,gif,jpeg',
        ]);
        $timeStamp = Carbon::now()->format('Y_m_d_H_i_s');
        $fileExtension = $request->product_image->extension();
        $fileName = $timeStamp.'.'.$fileExtension;
        $request->product_image->storeAs('public/images', $fileName);
        $product = Product::find($request->id);
        $product->product_name = $request->product_name;
        $product->sku = $request->sku;
        $product->quantity = $request->quantity;
        $product->product_image = $fileName;
        $product->update();
        return redirect()->route('products.index');

    }
    public function show(){

    }
    public function destroy(){
        $product = User::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }
    public function list(){
        $product = Product::all();
        return view::make('frontend.index',['users' => $product]);
    }
}
