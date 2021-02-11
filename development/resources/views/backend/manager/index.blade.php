@extends('application.layouts.app')
@section('content')
<h1 align="center"> MANAGER LIST </h1>
<a href="{{route('managers.create')}}" >Go To Form</a><br><br>
<table align="center" border="2">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role Id</th>
        <th>Operation</th>
        <th>Operation</th>
    </tr>    


    @forelse($users as $manager)
        <tr>
            <td>{{$manager->id}}</td>
            <td>{{$manager->name}}</td>
            <td>{{$manager->email}}</td>
            <td>{{$manager->role_id}}</td>
            <td><a href ="{{route('managers.edit',$manager->id)}}">Edit</a></td>
            <td>
            <form method="post" action="{{route('managers.destroy',$manager->id)}}" >
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