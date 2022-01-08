<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    td {
      height: 80px;
      width: 80px;
      text-align: center;
    }

    .center {
      margin: auto;
      text-align: center;
    }

    #example1 {
      border: 2px solid grey;
      border-radius: 25px;
    }

    a {
      text-decoration: none;
      color: inherit;
      font-size: 24px;
    }

    a:hover {
      color: grey;
      text-decoration: none;
      cursor: pointer;
    }

    h3 {
      font-family: Verdana;
    }

  </style>
</head>

<body>

  @php
    // dd($data->toArray());
  @endphp

  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
        <tr>
          <td>{{ $item->name }}</td>
          <td>{{ $item->phoneRelation->phone }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

</body>

</html>
