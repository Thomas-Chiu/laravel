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
    <a href="<?php echo e(route('students.index')); ?>">回首頁</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="<?php echo e(route('students.create')); ?>">單筆新增</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="<?php echo e(route('students.create-file')); ?>">上傳照片</a>
  </div>
  <br>

  <?php
    // dd($data, $data2);
    // dd($dataRelation);
    // dd(public_path() . '/' . $dataRelation[0]->photo);
  ?>

  <table class="center" border="1px" width="80%">
    <tr>
      <th>ID</th>
      <th>姓名</th>
      <th>照片</th>
      <th>國文</th>
      <th>英文</th>
      <th>數學</th>
      <th>電話</th>
      <th>位置</th>
      
      <th>喜好</th>
      
      <th>修改/刪除</th>
    </tr>

    
    
    <?php $__currentLoopData = $dataRelation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($value->id); ?></td>
        <td><?php echo e($value->name); ?></td>

        
        <?php if($value->photo): ?>
          <td>
            <img src="<?php echo e(asset("storage/img/$value->photo")); ?>" width=200>
          </td>
        <?php else: ?>
          <td>無資料</td>
        <?php endif; ?>

        <td><?php echo e($value->chinese); ?></td>
        <td><?php echo e($value->english); ?></td>
        <td><?php echo e($value->math); ?></td>

        
        <?php if(!empty($value->phoneRelation->phone)): ?>
          <td><?php echo e($value->phoneRelation->phone); ?></td>
        <?php else: ?>
          <td>無資料</td>
        <?php endif; ?>

        <?php if(!empty($value->location->location_name)): ?>
          <td><?php echo e($value->location->location_name); ?></td>
        <?php else: ?>
          <td>無資料</td>
        <?php endif; ?>

        
        <td>
          <?php $__currentLoopData = $value->love; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p>
              <label for="love-<?php echo e($key2 + 1); ?>">
                <?php echo e($value2->loves_name); ?></label>
              <input type="checkbox" name="love" id="love-<?php echo e($key2 + 1); ?>">
            </p>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>



        
        <td>
          <a href="<?php echo e(route('students.edit', ['student' => $value->id])); ?>" class="btn btn-info btn-sm"
            role="button">修改</a>
          <form action="<?php echo e(route('students.destroy', ['student' => $value->id])); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field("DELETE"); ?>
            <input type="submit" value="刪除" name="submit" class="btn btn-danger btn-sm">
          </form>
        </td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    

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
<?php /**PATH C:\laravel\tom_20211204\resources\views/student/index.blade.php ENDPATH**/ ?>