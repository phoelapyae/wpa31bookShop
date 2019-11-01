@extends('layouts.master')
@section('content') 
    <div class="container">
        <div class="row justify-content-center">
            <h3 class="header-create">Create a category</h3>
            <div class="col-12">
                <form action="{{route('category.store')}}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" name="name" id="name" class="form-control mb-1" placeholder="Enter Category">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection