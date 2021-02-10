@extends('application.layouts.app')
@section('content')
<h1> MANAGER LIST </h1>
<a href="{{route('managers.create')}}" >Go To Form</a><br><br>
<table border="2">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Role Id</td>
        <td>Operation</td>
        <td>Operation</td>
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
        </tr>
</table>
@endsection