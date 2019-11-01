
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Online Book Store </title>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
  <!-- bootstrap cdn -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container py-2">
        <div class="row justify-content-center bg-khaki">
            <div class="col-9">
                <table class="table table-bordered">
                    <tr><p class="text-center mu-font">Phone: 09-78787878,0976767676</p></tr>
                    <tr><p class="text-center mu-font">Email address: {{Auth::user()->email}}</p></tr>
                    <tr><p class="text-center mu-font">Website: www.onlinebookstore.com</p></tr>
                    <h5 colspan="5" class="text-center header-edit">Sales Voucher</h5>
                </table>
               
                           
               
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Phone</th>
                            <th>Books</th>
                            <th>Number</th>
                            <th>Price(MMK)</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        @php
                            $total = isset($total) ? $total + $order->books()->first()->price : $order->books()->first()->price;
                        @endphp

                        <tr>
                            <td>{{$order->customer}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->books()->first()->title}}</td>
                            <td>{{$order->number}}</td>
                            <td>{{$order->books()->first()->price}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-center">Total Amount:</td>
                        <td>{{$total_number}}</td>
                        <td>{{$total}}</td>
                    </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <p class="py-0">**********************************************************************************************************************</p>
                        <h5 class="header-list">Books sold are not exchanable!</h5>
                        <h2 class="logo-font">Thank you!</h2>
                    <p>**********************************************************************************************************************</p>
                </div>
            </div>
        </div>
     
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <a href="#" id="print_pr" class="btn btn-primary btn-block">
                    <i class="fas fa-print"></i> Print Voucher
                </a>
            </div>
        </div>
    </div>
<script src="{{asset('js/app.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#print_pr').click(function(){
            window.print();
        });
    });
</script>
<style>
    @media print {
        #print_pr {
            visibility: hidden;
        }
    }
</style>
</body>
</html>


