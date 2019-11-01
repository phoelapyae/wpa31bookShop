@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="header-list">Publisher List</h1>
        <div class="col-12">
            <a href="{{route('publisher.create')}}" class="btn btn-success">+ Add New Publisher</a>
            <br>
            <br>
            <table id="publishers-table" class="table table-bordered">
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
        $('#publishers-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('publisher.data') !!}',
            columns: [
                {
                    data: 'publishername',
                    name: 'publishername'
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