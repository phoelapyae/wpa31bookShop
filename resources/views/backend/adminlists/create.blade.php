@extends('layouts.master')
@section('content') 
    <div class="container">
        <div class="row justify-content-center">
            <h3 class="header-create">Create an admin</h3>
            <div class="col-12">
                <form action="{{route('administrator.store')}}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="name">Name*</label>
                        <input type="text" name="name" id="name" class="form-control mb-1" placeholder="Enter a name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address*</label>
                        <input type="email" name="email" id="email" class="form-control mb-1" placeholder="Enter an email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password*</label>
                        <input type="password" name="password" id="password" class="form-control mb-1" placeholder="Enter a password">
                    </div>
                    <div class="form-group">
                        <label for="category">Confirmed password*</label>
                        <input type="password" name="password_confirmation" id="name" class="form-control mb-1" placeholder="Confirm password">
                    </div>
                    <div class="form-group">
                        <label for="">Choose Roles*</label>
                        <select name="roles" id="" class="form-control">
                            <option value="" selected="selected">-----select role-------</option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">
                                    {{$role->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <a href="{{route('administrator.index')}}" class="btn btn-success">Cancle</a>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection