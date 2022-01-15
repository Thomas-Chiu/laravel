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
        <h3>新增檔案資料</h3>
        <h5 style="margin-bottom:18px"></h5>
    </div>

    <div class="center">
        <a href="{{route('students.index')}}">回首頁</a>
    </div>
    <br>
    <form action="{{route('students.store-file')}}" method="post" enctype="multipart/form-data">
        @csrf
    <table class="center" border="1px" width="80%">
        <tr>
            <th>name</th>
            <th>photo</th>

        </tr>
        <tr>
            <td><input type="text" name="name" id="name"></td>            
            <td><input type="file" name="photo" id="photo"></td>            
        </tr>


        <tr>

            <td colspan="6">

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