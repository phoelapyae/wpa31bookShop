@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="header-list">Category List</h1>
        <div class="col-12">
            <a href="{{route('category.create')}}" class="btn btn-success">+ Add New Category</a>
            <br>
            <br>
            <table id="categories-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Option</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(function(){
        $('#categories-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('category.data') !!}',
            columns: [
                {
                    data: 'categoryname',
                    name: 'categoryname'
                },
                {
                    data: 'option',
                    name: 'option'
                }
            ]
        });
    });
</script>
@endpush