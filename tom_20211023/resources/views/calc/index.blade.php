<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  {{-- asset() 引用 /public/css/style.css --}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
  <h1>我是 calc/index.blade</h1>

  <div class="box">
    {{-- <form action="{{ route('handleCalc') }}" method="get"> --}}
    <form action="{{ route('handleCalc') }}" method="post">
      {{-- POST 要用 @csrf 產生 token --}}
      @csrf
      <p>
        num1: <input type="text" name="num1" id="num1">
      </p>
      <p>
        num2: <input type="text" name="num2" id="num2">
      </p>
      <p>
        算式:
        <select name="mySelect" id="mySelect">
          <option value="1">+</option>
          <option value="2">-</option>
          <option value="3">*</option>
          <option value="4">/</option>
        </select>
      </p>
      <input type="submit" value="送出">
    </form>
  </div>
</body>

</html>
