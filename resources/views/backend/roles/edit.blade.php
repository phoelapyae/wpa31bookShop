@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('role.update',$role->id)}}" method="POST">
                    @method('PATCH')
                    @csrf 
                    <div class="form-group">
                        <label for="name">Name*</label>
                        <input type="text" name="name" id="" value="{{$role->name}}" class="form-control" placeholder="Role Name">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug*</label>
                        <input type="text" name="slug" id="" value="{{$role->slug}}" class="form-control" placeholder="Slug Name">
                    </div>
                    @foreach($permissions as $key=>$per)
                        <h5>{{ucfirst($key)}}</h5>
                        @foreach($per as $p)
                            <label class="checkbox-inline">
                                <input type="checkbox" name="permissions[{{$p}}]" id="inlineCheckbox1" value="true">{{$p}}
                            </label>
                        @endforeach
                    @endforeach
                    <div>
                    
                    <div>
                        <a href="{{route('role.index')}}" class="btn btn-success">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection