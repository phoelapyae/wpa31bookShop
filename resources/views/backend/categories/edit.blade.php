@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h3 class="header-edit">Update current category</h3>
            <div class="col-12">
                <form action="{{route('category.update', $category->id)}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <input type="text" name="name" id="name" class="form-control mb-3" value="{{$category->categoryname}}">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection