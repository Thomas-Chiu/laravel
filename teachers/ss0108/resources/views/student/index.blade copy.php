<?php
          $strArr = [
            "By failing to prepare, you are preparing to fail.",
          ];

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
        <a href="./index.php">回首頁</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{route('students.create')}}">單筆新增</a>
{{-- php artisan route:list <--git bash --}}
    </div>
    <br>
    @php
        // dd($data123);
    @endphp

    <table class="center" border="1px" width="80%">
        <tr>
            <th>ID</th>
            <th>姓名</th>
            <th>國文</th>
            <th>英文</th>
            <th>數學</th>
            <th>電話</th>
            <th>修改/刪除</th>

        </tr>
        
        {{-- for --}}
        
        <tr>
            <td>id</td>
            <td>name</td>
            <td>chinese</td>
            <td>english</td>
            <td>math</td>
            <td>phone</td>
            <td>                
                <form action="" method="post">
                    @csrf                    
                <a href="" class="btn btn-info btn-sm" role="button">修改</a>
                <input type="submit" value="刪除" name="submit" class="btn btn-danger btn-sm">
                </form>
                

            </td>
        </tr>
        
        {{-- for end --}}
        
        <tr>

            <td colspan="7">
                <div id="example1">
                    <p>
                        <?= $strArr[0]?>
                    </p>
                </div>
            </td>

        </tr>
    </table>

    <br><br><br>
    
</body>

</html>