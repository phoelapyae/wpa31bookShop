@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h3 class="header-list">Registered customers</h3>
        <div class="col-12">
            <table id="customers-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
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
        $('#customers-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('customer.data') !!}',
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