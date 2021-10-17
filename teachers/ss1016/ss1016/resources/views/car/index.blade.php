<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>hello car index page</h1>
    @php
    // dd($data);
    @endphp
    <?php 
        for ($i=1; $i <=10 ; $i++) { 
            echo "$i <br>";
        }
    ?>

    <?php for ($i=1; $i <=10 ; $i++) :?>
        test <?= $i;?> <br>
    <?php endfor;?>

    @for ($i = 1; $i <= 10; $i++)
        test {{$i}} <br>
    @endfor
    
</body>
</html>