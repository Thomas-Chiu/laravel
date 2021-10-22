<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <h2>car table</h2>
  <table border="1px" width="50%" style="text-align: center">
    <tr>
      <th>id</th>
      <th>name</th>
    </tr>

    @foreach ($data as $item)
      <tr>
        <td>{{ $item['id'] }}</td>
        <td>{{ $item['name'] }}</td>
      </tr>
    @endforeach
  </table>
</body>

</html>
