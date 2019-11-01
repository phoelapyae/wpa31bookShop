@extends('layouts.master')
@section('content')
    <div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
               <!-- Main content -->
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3> {{$total_books}} </h3>
                            <p>Total products</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-book"></i>
                        </div>
                        <a href="{{route('book.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                        <div class="inner">
                            <h3> {{$total_orders}} </h3>
                            <p>Total orders</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                        </div>
                        <a href="{{route('orders.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                        <div class="inner">
                            <h3> {{$total_categories}} </h3>
                            <p>Total categories</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-list-alt"></i>
                        </div>
                        <a href="{{route('category.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
               <!-- Main content -->
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-paleviolet">
                        <div class="inner">
                            <h3> {{$total_admins}} </h3>
                            <p>Unique administrators </p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users-cog"></i>
                        </div>
                        <a href="{{route('administrator.index')}}s" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                        <div class="inner">
                            <h3> {{$total_customers}} </h3>
                            <p>Total customers</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{route('customer.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
               <!-- Main content -->
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-khaki">
                        <div class="inner">
                            <h3> {{$total_authors}} </h3>
                            <p>Total authors</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-feather-alt"></i>
                        </div>
                        <a href="{{route('author.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-plum">
                        <div class="inner">
                            <h3> {{$total_feedbacks}} </h3>
                            <p>Total feedbacks</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-comment-dots"></i>
                        </div>
                        <a href="{{route('feedback.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-deeppink">
                        <div class="inner">
                            <h3> {{$total_publishers}} </h3>
                            <p>Total publishers</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-book-reader"></i>
                        </div>
                        <a href="{{route('publisher.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
               <!-- Main content -->
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-paleviolet">
                        <div class="inner">
                            <h3> {{$total_cities}} </h3>
                            <p>Total cities </p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-city"></i>
                        </div>
                        <a href="{{route('city.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                        <div class="inner">
                            <h3> {{$total_shops}} </h3>
                            <p>Total shops</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-store"></i>
                        </div>
                        <a href="{{route('shop.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection