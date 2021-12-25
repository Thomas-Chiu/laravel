<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <h1>I am create.blade</h1>

  {{-- 上傳檔案記得用 post 加 enctype 屬性 --}}
  <form action="{{ route('students.store-file') }}" method="post" enctype="multipart/form-data">
    @csrf
    上傳照片：
    <p>
      <input type="text" name="photoName" id="photo_name"> <br>
      <input type="file" name="photoFile" id="photo_file"><br>
      <input type="submit" value="上傳" name="submit">
    </p>
  </form>
</body>

</html>
