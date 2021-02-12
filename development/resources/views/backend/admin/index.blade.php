@extends('application.layouts.app')
@section('content')
<h1 align="center"> ADMINISTARTION LIST </h1>
<a href="{{route('admins.create')}}" >Add admins</a><br><br>
<a href="{{route('managers.create')}}" >Add Managers</a><br><br>
<a href="{{route('customers.create')}}" >Add customers</a>
<table align="center" border="2">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role Id</th>
        <th>Operation</th>
        <th>Operation</th>
    </tr>    


    @forelse($users as $admin)
        <tr>
            <td>{{$admin->id}}</td>
            <td>{{$admin->name}}</td>
            <td>{{$admin->email}}</td>
            <td>{{$admin->role_id}}</td>
            <td><a href ="{{route('admins.edit',$admin->id)}}">Edit</a></td>
            <td>
            <form method="post" action="{{route('admins.destroy',$admin->id)}}" >
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