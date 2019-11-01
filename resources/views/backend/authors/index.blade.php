@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="header-list">Author List</h1>
        <div class="col-12">
            <a href="{{route('author.create')}}" class="btn btn-success">+ Add New Author</a>
            <br>
            <br>
            <table id="authors-table" class="table table-bordered">
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
        $('#authors-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('author.data') !!}',
            columns: [
                {
                    data: 'authorname',
                    name: 'authorname'
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