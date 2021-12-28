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
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{ route('students.create-file') }}">create-file</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{ route('students.export') }}">export</a>
        {{-- php artisan route:list <--git bash --}}        
    </div>
    <br>
    @php
        // dd($data123);
    @endphp
    <div class="container-fluid">
        <table class="center" border="1px" width="80%">
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>照片</th>
                {{-- <th>國文</th>
            <th>英文</th>
            <th>數學</th> --}}
                <th>電話</th>
                <th>愛好</th>
                <th>修改/刪除</th>

            </tr>

            {{-- for --}}
            @foreach ($data as $key => $value)

                <tr>
                    <td>id</td>
                    <td> {{ $value->name }}</td>

                    @if (!empty($value->photo))
                        <td>
                            <img src="{{ asset('/storage/images/' . $value->photo) }}" alt="" width="100%">
                        </td>
                    @else
                        <td> no photo</td>
                    @endif

                    {{-- <td> {{ $value->chinese }}</td>
                <td> {{ $value->english }}</td>
                <td> {{ $value->math }}</td> --}}
                    {{-- $value->phone (relation student phone function) --}}
                    {{-- $value->phone->student_id (phone table column) --}}
                    {{-- 電話 --}}
                    @if (!empty($value->phoneRelation->student_id))
                        <td> {{ $value->phoneRelation->phone }}</td>
                    @else
                        <td>no data</td>
                    @endif
                    {{-- 電話 end --}}
                    <td>
                        {{-- 愛好 --}}
                        {{-- $value抓第一個學生資料 --}}
                        {{-- $value['lovesRelation'] 一個學生的全部愛好 --}}
                        @foreach ($value['lovesRelation'] as $valueKey => $loveRelation)
                            <p>
                                {{-- {{ $valueKey }} --}}
                                {{ $loveRelation->name }}
                            </p>
                        @endforeach
                        {{-- 愛好 end --}}
                    </td>

                    <td>
                        {{-- if 如果客人只看 --}}
                        {{-- <a href="{{route('students.show', ['student' => $value->id ])}}" class="btn btn-info btn-sm" role="button">查看單筆</a> --}}
                        {{-- if 管理人員 才可以修改 --}}
                        <a href="{{ route('students.edit', ['student' => $value->id]) }}" class="btn btn-info btn-sm"
                            role="button">修改</a>
                        <form action="{{ route('students.destroy', ['student' => $value->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            {{-- <input type="hidden" name="_token" value=""> --}}
                            {{-- <input type="hidden" name="_method" value="DELETE"> --}}
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
    </div>

    <div class="container">
        <div class="mt-5 d-flex justify-content-center">
            {!! $data->links() !!}
        </div>
    </div>

</body>

</html>
