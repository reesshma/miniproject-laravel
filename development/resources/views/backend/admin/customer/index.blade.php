@extends('application.layouts.app')
@section('content')
<h1> CUSTOMER LIST </h1>
<a href="{{route('customers.create')}}" >Go To Form</a><br><br>
<table border="2">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Role Id</td>
        <td>Operation</td>
        <td>Operation</td>
    </tr>    


    @forelse($users as $customer)
        <tr>
            <td>{{$customer->id}}</td>
            <td>{{$customer->name}}</td>
            <td>{{$customer->email}}</td>
            <td>{{$customer->role_id}}</td>
            <td><a href ="{{route('customers.edit',$customer->id)}}">Edit</a></td>
            <td>
            <form method="post" action="{{route('customers.destroy',$customer->id)}}" >
            @csrf
            @method('DELETE')
            <input type="submit" value="delete"></td>
            </form>
            @empty
            @endforelse
        </tr>
</table>
@endsection