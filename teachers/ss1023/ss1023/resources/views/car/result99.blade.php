<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>
        result99
    </h2>
    @php
        // dd($data);
    @endphp
    @for ($i = 1; $i <= $data['num1']; $i++)
        @for ($j = 1; $j <= $data['num2']; $j++)
            {{$i}} * {{$j}} = {{$i * $j}} &nbsp;&nbsp;&nbsp;
        @endfor
        <br><br>
    @endfor
</body>
</html>