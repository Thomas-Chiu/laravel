<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <h1>我是 /views/car/front.blade.php</h1>
  <!-- 原生寫法 (無效) -->
  <a href="./page1.blade.php">page1.blade.php</a>
  <br />
  <a href="./page2.blade.php">page2.blade.php</a>
  <hr />
  <!-- laravel blade 寫法 -->
  <a href="{{ route('page1_name') }} ">laravel page1</a>
  <br />
  <a href="{{ route('page2_name') }} ">laravel page2</a>
</body>

</html>