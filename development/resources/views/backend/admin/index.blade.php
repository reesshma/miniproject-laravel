@extends('application.layouts.app')
@section('content')
<h1> ADMINISTARTION LIST </h1>
<a href="{{route('admins.create')}}" >Go To Form</a>
<table border="2">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Role Id</td>
        <td>Operation</td>
        <td>Operation</td>
    </tr>    


    @forelse($users as $admin)
        <tr>
            <td>{{$admin->id}}</td>
            <td>{{$admin->name}}</td>
            <td>{{$admin->email}}</td>
            <td>{{$admin->role-id}}</td>
            <td><a href ="{{route('admins.edit',$admin->id)}}">Edit</a></td>
            <td>
            <form method="post" action="{{route('admins.destroy',$admin->id)}}" >
            @csrf
            @method('DELETE')
            <input type="submit" value="delete"></td>
            </form>
            @empty
            @endforelse
        </tr>
</table>
@endsection