<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <h1>我是 /multi/index.blade</h1>
  <h2>輸入 XX 乘法表</h2>
  <form action="{{ route('handleMulti') }}" method="get">
    <p>num1:
      <input type="text" name="num1">
    </p>
    <p>num2:
      <input type="text" name="num2">
    </p>
    <input type="submit" value="送出">
  </form>
</body>

</html>
