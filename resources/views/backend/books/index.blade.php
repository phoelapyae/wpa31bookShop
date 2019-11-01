@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="header-list">Book List</h1>
        <div class="col-12">
            <a href="{{route('book.create')}}" class="btn btn-success">+ Add New Book</a>
            <br>
            <br>
            <table id="books-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Page</th>
                        <th>Review</th>
                        <th>Author_Id</th>
                        <th>Category_Id</th>
                        <th>Publisher_Id</th>
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
        $('#books-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('book.data') !!}',
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'page',
                    name: 'page'
                },
                {
                    data: 'review',
                    name: 'review'
                },
                {
                    data: 'author_id',
                    name: 'author_id'
                },
                {
                    data: 'category_id',
                    name: 'category_id'
                },
                {
                    data: 'publisher_id',
                    name: 'publisher_id'
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