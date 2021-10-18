<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  {{-- 相對路徑寫法會報 404 --}}
  <a href="./test.blade.php">GO TO HELLO123</a> <br>
  {{-- 需用 blade 模板語法 route("named routes") --}}
  <a href="{{ route('hello123_name') }}">GO TO HELLO123</a>

  <form action="{{ route('getData') }} " method="get">
    <input type="text" name="num1" id="num1">
    <input type="text" name="num2" id="num2">
    <input type="submit">
  </form>

  @php
  // dd() 可取代 vardump()
  $myarr = [1, 2, 3];
  dd($myarr)
  @endphp

</body>

</html>