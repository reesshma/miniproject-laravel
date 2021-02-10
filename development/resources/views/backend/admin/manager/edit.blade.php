@extends('application.layouts.app')
@section('content')
<form method="post" action="{{route('managers.update',$users->id)}}" style="margin-left:200px" enctype="multipart/form-data">
                @csrf
                @method('put')
                <h2 style="margin-left:150px">Customer Registration </h2>
                <div class="row">
                    <div class="col-6 ">
                        <label for="name">Name </label>
                    </div>
                    <div class="col-6 mb-4"> 
                        <input type="text" name="name" id="name" value="{{ $users['name'] }}"/>
                        <div class="text-danger">
                        @if($errors->has('name'))
                        {{ $errors->first('name') }}
                        @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="email">Email </label>
                    </div>
                    <div class="col-6 mb-4"> 
                        <input type="text" name="email" id="email" value="{{  $users['email'] }}"/>
                        <div class="text-danger">
                        @if($errors->has('email'))
                        {{ $errors->first('email') }}
                        @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="password">Password </label>
                    </div>
                    <div class="col-6 mb-4"> 
                        <input type="password" name="password" id="password" value="{{  $users['password'] }}"/>
                        <div class="text-danger">
                        @if($errors->has('password'))
                        {{ $errors->first('password') }}
                        @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="cpassword">Password Confirmed </label>
                    </div>
                    <div class="col-6 mb-4"> 
                        <input type="password" name="cpassword" id="cpassword" value="{{  $users['password'] }}"/>
                        <div class="text-danger">
                        @if($errors->has('cpassword'))
                        {{ $errors->first('cpassword') }}
                        @endif
                        </div>
                    </div>
                    <div class="col-12">        
                            <button type="submit" style="align-center" class="btn btn-success">submit</button>
                    </div>
</form>
@endsection