<?php
$strArr = ['By failing to prepare, you are preparing to fail.'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>student create</title>
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
    <h3>新增資料</h3>
    <h5 style="margin-bottom:18px"></h5>
  </div>

  <div class="center">
    <a href="{{ route('students.index') }}">回首頁</a>
  </div>
  <br>
  <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
    {{-- 前端 POST 需加 @csrf 產生 _token --}}
    @csrf
    <table class="center" border="1px" width="80%">
      <tr>
        <th>ID</th>
        <th>姓名</th>
        <th>照片</th>
        <th>國文</th>
        <th>英文</th>
        <th>數學</th>
        <th>地點</th>
        <th>電話</th>
        <th>喜好</th>
      </tr>

      <tr>
        <td>id</td>
        {{-- input 的 name 建議和 data 的 key 一樣 --}}
        <td><input type="text" name="name" id="name"></td>
        {{-- 新增上傳照片 --}}
        <td><input type="file" name="photo" id="photo"></td>
        <td><input type="number" name="chinese" id="chinese"></td>
        <td><input type="number" name="english" id="english"></td>
        <td><input type="number" name="math" id="math"></td>
        <td><input type="text" name="location" id="location"></td>
        <td><input type="text" name="phone" id="phone"></td>
        <td><input type="text" name="love" id="love"></td>
      </tr>

      <tr>
        <td colspan="7">
          <div id="example1">
            <p>
              <input type="submit" value="submit" name="submit">
            </p>
          </div>
        </td>
      </tr>
    </table>
  </form>

</body>

</html>
