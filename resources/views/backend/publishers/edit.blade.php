@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h3 class="header-edit">Update current publisher</h3>
            <div class="col-12">
                <form action="{{route('publisher.update', $publisher->id)}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="publisher">Publisher:</label>
                        <input type="text" name="name" id="name" class="form-control mb-3" value="{{$publisher->publishername}}">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection