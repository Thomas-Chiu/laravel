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

  <form action="<?php echo e(route('students.handle-create-file')); ?>" method="post" enctype="multipart/form-data">
    上傳照片：
    <p>
      <input type="text" name="uploadFileName" id="upload_file_name"> <br>
      <input type="file" name="uploadFile" id="upload_file"><br>
      <input type="submit" value="上傳" name="submit">
    </p>
  </form>
</body>

</html>
<?php /**PATH C:\laravel\tom_20211204\resources\views/create.blade.php ENDPATH**/ ?>