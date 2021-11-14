<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App2 - @yield('title123')</title>
    <link rel="stylesheet" href="{{asset('assets/css/style123.css')}}">
</head>
<body>
    <h2>app2 blade </h2>
    
    {{-- section sidebar --}}
    @section('sidebar')
    app2 master
    @show
    {{-- section sidebar end--}}
        
    
    <div class="container">
        @yield('content')
    </div>
</body>
</html>