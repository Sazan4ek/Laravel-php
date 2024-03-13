<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    @include('layout.styles')

    <title>Home page</title>
</head>
<body class="vh-100">
    @yield('header')

    @yield('main')

    @include('layout.info')

    <?php 
        use Carbon\Carbon;
        $time = new Carbon;
    ?>

    @datetime($time)

    @yield('footer')
</body>
</html>