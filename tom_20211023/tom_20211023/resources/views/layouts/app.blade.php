<!DOCTYPE html>
<!-- resources/views/layouts/app.blade.php -->
{{-- 我是母版 --}}
<html>

<head>
  <title>App Name - @yield('title')</title>
</head>

<body>
  @section('sidebar')
    <h2>我是主版 sidebar</h2>
  @show

  <div class="container">
    @yield('content')
  </div>
</body>

</html>
