@extends('application.layouts.app')
@section('content')
<form method="post" action="{{route('products.update',$users->id)}}" style="margin-left:200px" enctype="multipart/form-data">
                @csrf
                @method('put')
                <h2 style="margin-left:150px">Product Registration </h2>
                <div class="row">
                    <div class="col-6 ">
                        <label for="product_name">Product Name </label>
                    </div>
                    <div class="col-6 mb-4"> 
                        <input type="text" name="product_name" id="product_name" value="{{ old('product_name',$users['product_name']) }}"/>
                        <div class="text-danger">
                        @if($errors->has('product_name'))
                        {{ $errors->first('product_name') }}
                        @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="sku">Stock Keeping Unit </label>
                    </div>
                    <div class="col-6 mb-4"> 
                        <input type="text" name="sku" id="sku" value="{{ old('sku',$users['sku']) }}"/>
                        <div class="text-danger">
                        @if($errors->has('sku'))
                        {{ $errors->first('sku') }}
                        @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="quantity">Quantity </label>
                    </div>
                    <div class="col-6 mb-4"> 
                        <input type="text" name="quantity" id="quantity" value="{{ old('quantity',$users['quantity']) }}"/>
                        <div class="text-danger">
                        @if($errors->has('quantity'))
                        {{ $errors->first('quantity') }}
                        @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="product_image">Product Image </label>
                    </div>
                    <div class="col-6 mb-4"> 
                        <input type="file" name="product_image" id="product_image" value="{{ old('product_image',$users['product_image']) }}"/>
                        @if (strpos($users['product_image'], '.jpg') !== false || strpos($users['product_image'], '.png') !== false || strpos($users['product_image'], '.gif') !== false || strpos($users['product_image'], '.svg') !== false || strpos($users['product_image'], '.jpeg') !== false)
                        <img  src="{{asset('storage/images/'.$users['product_image'])}}"   style="width: 80px;height: 80px"/>
                        @endif
                        <div class="text-danger">
                        @if($errors->has('product_image'))
                        {{ $errors->first('product_image') }}
                        @endif
                        </div>
                    </div>
                    <div class="col-12">        
                            <button type="submit" style="align-center" class="btn btn-success">submit</button>
                    </div>
</form>
@if(session("Success"))
    <p> {{session("Success")}} </p>
    @endif  
@endsection