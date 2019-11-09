@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="app">
                <h5>Showing order data by line charts</h5>
                <line-chart-component></line-chart-component>
                <h5>Showing order data by bar charts</h5>
                <bar-chart-component></bar-chart-component>
            </div>
        </div>
    </div>
</div>
@endsection