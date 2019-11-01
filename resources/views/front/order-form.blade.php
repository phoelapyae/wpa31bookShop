<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
    <div id="app">
    @include('includes.menu')
    @include('front.alerts')
    <section class="container py-5">
        <h3 class="text-center">Order the book you want to buy</h3>
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="{{route('newOrder.store')}}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="book">Choose available book:</label>
                        <select name="book_id" id="" class="form-control mb-3">
                            @foreach($books as $key=>$book)
                                <option value="{{$key}}">
                                    {{$book}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="city">Choose your current city:</label>
                        <select name="city_id" id="" class="form-control mb-3">
                            @foreach($cities as $key=>$city)
                                <option value="{{$key}}">
                                    {{$city}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="book">Choose the show where you want to go:</label>
                        <select name="shop_id" id="" class="form-control mb-3">
                            @foreach($shops as $key=>$shop)
                                <option value="{{$key}}">
                                    {{$shop}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="number">Number of books:</label>
                        <input type="number" name="number" id="" class="form-control" placeholder="Enter number of books you want to order">
                    </div>
                    <div class="form-group">
                        <label for="phone">Your phone number:</label>
                        <input type="number" name="phone" id="" class="form-control" placeholder="Enter your phone number">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" name="address" id="" class="form-control" placeholder="Enter your address">
                    </div>
                    <button type="submit" class="btn btn-success">Order Now</button>
                </form>
            </div>
        </div>
    </section>
    </div>
    @include('includes.contact')
    @include('includes.footer')
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>