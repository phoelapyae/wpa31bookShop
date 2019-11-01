@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h3 class="header-create">Createt a new shop</h3>
            <div class="col-12">
                <form action="{{route('shop.store')}}" method="POST">
                    @csrf
                    <label for="shop">Shop:</label>
                    <input type="text" name="name" id="" class="form-control mb-3" placeholder="Enter a new shop">
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection