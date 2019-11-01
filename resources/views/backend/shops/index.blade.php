@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h3 class="header-list">Shop List</h3>
            <div class="col-12">
                <a href="{{route('shop.create')}}" class="btn btn-primary">Add shop</a>
                <br>
                <br>
                <table id="shops-table" class="table table-bordered">
                    <thead>
                        <th>Name</th>
                        <th>Option</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $(function(){
        $('#shops-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('shop.data') !!}',
            columns: [
                {
                    data: 'shopname',
                    name: 'shopname'
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