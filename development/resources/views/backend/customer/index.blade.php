@extends('application.layouts.app')
@section('content')
<h1 align="center"> CUSTOMER LIST </h1>
<a href="{{route('customers.create')}}" >Go To Form</a><br><br>
<table align= "center" border="2">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role Id</th>
        <th>Operation</th>
        <th>Operation</th>
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
            {{$users->links()}} 
        </tr>
</table>
@endsection