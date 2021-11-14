<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>輸入 XX 乘法表</h2>
    <form action="{{route('cars.result99')}}" method="post">
        @csrf
        <p>
            <label for="num1">num1</label>
            <input type="text" name="num1" id="num1">
        </p>
        <p>
            <label for="num2">num2</label>
            <input type="text" name="num2" id="num2">
        </p>
        <p>
            <input type="submit" value="submit">
        </p>
    </form>
</body>

</html>
