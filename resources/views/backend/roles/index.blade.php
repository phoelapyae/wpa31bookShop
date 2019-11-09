@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="header-list">Role List</h1>
        <div class="col-12">
            <a href="{{route('role.create')}}" class="btn btn-success">+ Add New Role</a>
            <br>
            <br>
            <table id="roles-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Permissions</th>
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
        $('#roles-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('role.data') !!}',
            columns: [
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'slug',
                    name: 'slug'
                },
                {
                    data: 'permissions',
                    name: 'permissions',
                    with: '20%'
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