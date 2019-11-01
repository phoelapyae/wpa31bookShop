@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h3 class="header-edit">Update current author</h3>
            <div class="col-12">
                <form action="{{route('author.update', $author->id)}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="author">Author:</label>
                        <input type="text" name="name" id="name" class="form-control mb-3" value="{{$author->authorname}}">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection