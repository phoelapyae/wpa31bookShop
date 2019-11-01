@extends('layouts.master')
@section('content') 
    <div class="container">
        <div class="row justify-content-center">
            <h3 class="header-create">Create an author</h3>
            <div class="col-12">
                <form action="{{route('author.store')}}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="category">Author:</label>
                        <input type="text" name="name" id="name" class="form-control mb-1" placeholder="Enter an author">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection