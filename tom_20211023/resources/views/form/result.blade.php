<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <h1>我是 form/result.blade</h1>
  {{-- @php
    dd($data);
  @endphp --}}

  <table width="50%" border="1px">
    <tr>
      <th>id</th>
      <th>name</th>
    </tr>
    <tr>
      <td>{{ $data['id'] }}</td>
      <td>{{ $data['name'] }}</td>
    </tr>
  </table>
</body>

</html>
