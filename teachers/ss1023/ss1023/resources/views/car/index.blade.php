<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>

<body>
    <form action="{{ route('formData') }}" method="post">
        @csrf
        <p>
            <label for="num1">num1</label>
            <input type="text" name="num1" id="num1">
        </p>
        <p>
            <label for="num2">num2</label>
            <input type="text" name="num2" id="num2">
        </p>
        <p>
            <select name="mySelect" id="">
                <option value="1">+</option>
                <option value="2">-</option>
                <option value="3">*</option>
                <option value="4">/</option>
            </select>
        </p>
        <p>
            <input type="submit" value="submit">
        </p>
    </form>

</body>

</html>
