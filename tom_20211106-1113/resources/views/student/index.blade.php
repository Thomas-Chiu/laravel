<?php
$strArr = ['By failing to prepare, you are preparing to fail.'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>students</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="./myJs.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
  <div class="center">
    <h3>學生資料</h3>
    <h5 style="margin-bottom:18px"></h5>
  </div>

  <div class="center">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{ route('students.index') }}">回首頁</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{ route('students.create') }}">單筆新增</a>
  </div>
  <br>

  @php
    // dd($data, $data2);
    // dd($dataRelation);
  @endphp

  <table class="center" border="1px" width="80%">
    <tr>
      <th>ID</th>
      <th>姓名</th>
      <th>國文</th>
      <th>英文</th>
      <th>數學</th>
      <th>電話</th>
      <th>位置</th>
      {{-- update/delete --}}
      <th>修改/刪除</th>
    </tr>

    {{-- for --}}
    {{-- @foreach ($data2 as $key => $value) --}}
    @foreach ($dataRelation as $key => $value)
      <tr>
        <td>{{ $value->id }}</td>
        <td>{{ $value->name }}</td>
        <td>{{ $value->chinese }}</td>
        <td>{{ $value->english }}</td>
        <td>{{ $value->math }}</td>

        {{-- ($value->relation function->column name) --}}
        @if (!empty($value->phoneRelation->phone))
          <td>{{ $value->phoneRelation->phone }}</td>
        @else
          <td>無資料</td>
        @endif

        @if (!empty($value->location->location_name))
          <td>{{ $value->location->location_name }}</td>
        @else
          <td>無資料</td>
        @endif

        {{-- 路由可傳入 URL 參數 
              route("name", "params")
              route("x", [1, 2, 3])
              route("x", ["key1" => "value1", "key2" => "value2"]) --}}
        <td>
          <a href="{{ route('students.edit', ['student' => $value->id]) }}" class="btn btn-info btn-sm"
            role="button">修改</a>
          <form action="{{ route('students.destroy', ['student' => $value->id]) }}" method="post">
            @csrf
            @method("DELETE")
            <input type="submit" value="刪除" name="submit" class="btn btn-danger btn-sm">
          </form>
        </td>
      </tr>
    @endforeach
    {{-- for end --}}

    <tr>
      <td colspan="7">
        <div id="example1">
          <p>
            <?= $strArr[0] ?>
          </p>
        </div>
      </td>
    </tr>
  </table>

</body>

</html>
