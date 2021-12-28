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
    <a href="<?php echo e(route('students.index')); ?>">回首頁</a>
  </div>
  <br>

  <form action="<?php echo e(route('students.update', ['student' => $data['id']])); ?>" method="post">
    <?php echo csrf_field(); ?>
    
    <?php echo method_field("PUT"); ?>
    

    <table class="center" border="1px" width="80%">
      <tr>
        <th>ID</th>
        <th>姓名</th>
        <th>國文</th>
        <th>英文</th>
        <th>數學</th>
        <th>地點</th>
        <th>電話</th>
      </tr>

      <?php
        // dd($data, $dataPhone, $dataLocation);
      ?>

      <tr>
        <td><?php echo e($data['id']); ?></td>
        <td><input type="text" name="name" id="name" value="<?php echo e($data['name']); ?>"></td>
        <td><input type="number" name="chinese" id="chinese" value="<?php echo e($data['chinese']); ?>"></td>
        <td><input type="number" name="english" id="english" value="<?php echo e($data['english']); ?>"></td>
        <td><input type="number" name="math" id="math" value="<?php echo e($data['math']); ?>"></td>
        <td><input type="text" name="location" id="location" value="<?php echo e($dataLocation->location->location_name); ?>">
        </td>
        <td><input type="text" name="phone" id="phone" value="<?php echo e($dataPhone->phoneRelation->phone); ?>"></td>
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
<?php /**PATH C:\laravel\tom_20211106\resources\views/student/edit.blade.php ENDPATH**/ ?>