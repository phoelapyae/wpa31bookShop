@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="header-list">City List</h1>
        <div class="col-12">
            <a href="{{route('city.create')}}" class="btn btn-success">+ Add city</a>
            <br>
            <br>
            <table id="cities-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>City</th>
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
        $('#cities-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('city.data') !!}',
            columns: [
                {
                    data: 'cityname',
                    name: 'cityname'
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