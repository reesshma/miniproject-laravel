@extends('application.layouts.app')
@section('content')
<h1 align="center"> PRODUCT LIST </h1>
<a href="{{route('products.create')}}" >Go To Form</a><br><br>
<table align= "center" border="2">
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Stock Keeping Unit</th>
        <th>Quantity</th>
        <th>Product Image</th>
        <th>Operation</th>
        <th>Operation</th>
    </tr>    


    @forelse($users as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->product_name}}</td>
            <td>{{$product->sku}}</td>
            <td>{{$product->quantity}}</td>
            <td>
            @if (strpos($product->product_image, '.jpg') !== false || strpos($product->product_image, '.png') !== false || strpos($product->product_image, '.gif') !== false || strpos($product->product_image, '.svg') !== false || strpos($product->product_image, '.jpeg') !== false)
            <img  src="{{asset('storage/images/'.$product->product_image)}}"  style="width: 80px;height: 80px"/>
            @endif </td>
            <td><a href ="{{route('products.edit',$product->id)}}">Edit</a></td>
            <td>
            <form method="post" action="{{route('products.destroy',$product->id)}}" >
            @csrf
            @method('DELETE')
            <input type="submit" value="delete"></td>
            </form>
            @empty
            @endforelse
        </tr>
</table>
@endsection