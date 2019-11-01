@extends('layouts.master')
@section('content') 
    <div class="container">
        <div class="row justify-content-center">
        <h1 class="header-create">Add new city</h1>
            <div class="col-12">
                <form action="{{route('city.store')}}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" name="name" id="name" class="form-control mb-1" placeholder="Enter new city">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection