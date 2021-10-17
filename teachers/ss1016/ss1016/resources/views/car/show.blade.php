<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>cars show</h2>
    <h3>{{$id}} X {{$id}}</h3>
    @for ($i = 1; $i < $id; $i++)
        @for ($j = 1; $j < $id; $j++)
            {{$i}} * {{$j}} = {{str_pad($i * $j,2,'0',STR_PAD_LEFT)}} &nbsp; 
        @endfor
        <br>
    @endfor
</body>
</html>