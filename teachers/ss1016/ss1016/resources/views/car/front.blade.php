<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>front page</h2>
    <h3>php</h3>
    {{-- xxxxx --}}
    {{-- <p>
        <a href="/car/page1.blade.php">go page1</a>
    </p>
    <p>
        <a href="/car/page2.blade.php">go page2</a>
    </p> --}}
    {{-- laravel blade --}}
    <p>
        <a href="{{route('page1_name')}}">page1</a>
    </p>

    <p>
        <a href="{{route('page2_name')}}">page2</a>
    </p>
</body>
</html>