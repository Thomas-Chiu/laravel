<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    
    <form action="{{ route('get_data') }}" method="get">
        <input type="text" name="num1" id="num1">
        <input type="text" name="num2" id="num2">
        <input type="submit" value="submit">
    </form>

    {{-- <a href="{{route('abc123')}}">go to abc</a> --}}

    {{-- @php
    
    // $x = 100;
    // dd($x);

    $myArr = [1,2,3];
    
    dd($myArr);
    //dd(route('abc123'));
    @endphp --}}
    <!-- <a href="./test.blade.php">go to abc</a> -->
</body>

</html>
