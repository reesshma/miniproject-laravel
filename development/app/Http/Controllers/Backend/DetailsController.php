<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Details;
use Illuminate\Support\Facades\View;

class DetailsController extends Controller
{
    public function index(){

    }
    public function create(){

    }
    public function edit(){

    }
    public function update(){

    }
    public function store(Request $request){
        $id = auth()->user()->id;
        $product = new Details;
        $product->user_id = $id;
        $product->address = $request->address;
        $product->save();
    }
    public function show(){

    }
    public function destroy(){

    }
}
