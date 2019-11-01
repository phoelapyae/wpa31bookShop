@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="header-list">Order List</h1>
        <div class="col-12">
           
            <table id="orders-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Book</th>
                        <th>Price</th>
                        <th>Shop</th>
                        <th>City</th>
                        <th>Number</th>
                        <th>Customer</th>
                        <th>Phone</th>
                        <th>Address</th>
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
        $('#orders-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('orders.data') !!}',
            columns: [
                {
                    data: 'book',
                    name: 'book'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'shop',
                    name: 'shop'
                },
                {
                    data: 'city',
                    name: 'city'
                },
                {
                    data: 'number',
                    name: 'number'
                },
                {
                    data: 'customer',
                    name: 'customer'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'address',
                    name: 'address'
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