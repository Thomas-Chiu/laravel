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

  
  <form action="<?php echo e(route('students.store-file')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    上傳照片：
    <p>
      <input type="text" name="photoName" id="photo_name"> <br>
      <input type="file" name="photoFile" id="photo_file"><br>
      <input type="submit" value="上傳" name="submit">
    </p>
  </form>
</body>

</html>
<?php /**PATH C:\laravel\tom_20211204\resources\views/file/create.blade.php ENDPATH**/ ?>