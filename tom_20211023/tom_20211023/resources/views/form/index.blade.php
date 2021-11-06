<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <h1>我是 form/index.blade</h1>

  <div class="box">
    <form action="{{ route('handle') }} " method="get">
      <p>
        id: <input type="text" name="id">
      </p>
      <p>
        name: <input type="text" name="name">
      </p>
      <input type="submit" value="送出">
    </form>
  </div>
</body>

</html>
