<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <h1>我是 /calc/result.blade</h1>
  <hr>
  {{-- @php
    dd($data);
  @endphp --}}
  <p>num1: {{ $data['num1'] }}</p>
  <p>num2: {{ $data['num2'] }}</p>
  <p>mySelect: {{ $data['mySelect'] }}</p>
  <p>result: {{ $data['result'] }}</p>
</body>

</html>
