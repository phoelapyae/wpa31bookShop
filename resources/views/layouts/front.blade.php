<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
    <div id="app">
        @include('includes.navbar')
        <router-view></router-view>
    </div>
    @include('includes.contact')
    @include('includes.footer')
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>