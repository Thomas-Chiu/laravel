<?php
$strArr = ['By failing to prepare, you are preparing to fail.'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>student init</title>
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
    <h3>修改資料</h3>
    <h5 style="margin-bottom:18px"></h5>
  </div>

  <div class="center">
    <a href="{{ route('students.index') }}">回首頁</a>
  </div>
  <br>

  <form action="{{ route('students.update', ['student' => $data['id']]) }}" method="post"
    enctype="multipart/form-data">
    {{-- 等於 <input type="hidden" name="_token" value=""> --}}
    @csrf
    {{-- 等於 <input type="hidden" name="_method" value="PUT"> --}}
    @method("PUT")

    <table class="center" border="1px" width="80%">
      <tr>
        <th>ID</th>
        <th>姓名</th>
        {{-- 新增照片欄位 --}}
        <th>照片</th>
        <th>國文</th>
        <th>英文</th>
        <th>數學</th>
        <th>地點</th>
        <th>電話</th>
        <th>喜好</th>
      </tr>

      @php
        // dd($data, $dataLocation, $dataPhone);
        // dd($data->phoneRelation->phone);
        // dd($data->photo, $data['photo']);
        // dd($data->love);
      @endphp

      <tr>
        <td>{{ $data['id'] }}</td>
        <td><input type="text" name="name" id="name" value="{{ $data['name'] }}"></td>
        <td>
          <img src="{{ asset("storage/img/$data->photo") }}" alt="無資料" width=200>
          <input type="file" name="photo" id="photo">
        </td>
        <td><input type="number" name="chinese" id="chinese" value="{{ $data['chinese'] }}"></td>
        <td><input type="number" name="english" id="english" value="{{ $data['english'] }}"></td>
        <td><input type="number" name="math" id="math" value="{{ $data['math'] }}"></td>
        <td><input type="text" name="location" id="location" value="{{ $data->location->location_name }}">
        </td>
        {{-- value="{{ $主資料變數->主資料的 relation 方法->副資料欄位名稱 }}" --}}
        <td><input type="text" name="phone" id="phone" value="{{ $data->phoneRelation->phone }}"></td>
        <td> <input type="text" name="love" id="love" value="{{ $data['love'] }}"> <br> </td>
      </tr>

      <tr>
        <td colspan="7">
          <div id="example1">
            <p>
              <input type="hidden" name="id" value="<?= $data['id'] ?>">
              <input type="submit" value="送出" name="submit">
            </p>
          </div>
        </td>
      </tr>
    </table>
  </form>

</body>

</html>
