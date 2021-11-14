<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body>
    @php
        // $url = asset('assets/css/style.css');
        // dd($url);
        // dd($data);
        // dd($data[0]['id']);
    @endphp
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
        </tr>
        @foreach ($data['myArr'] as $item)
            <tr>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['name'] }}</td>
            </tr>
        @endforeach

    </table>
</body>

</html>
