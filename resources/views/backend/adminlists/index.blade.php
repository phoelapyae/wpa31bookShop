@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="header-list">Administrators List</h1>
        <div class="col-12">
            <table id="administrators-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email Address</th>
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
        $('#administrators-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('administrator.data') !!}',
            columns: [
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
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