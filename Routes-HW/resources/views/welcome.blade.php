<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body class="antialiased">
        <form class="m-2" action="/submit-contact-form" method="post">
            @csrf
            <label for="text">Введите что-нибудь</label><br>
            <input type="text" name="text" id="text">
            <button class="btn btn-success">Отправить</button>
        </form>
        <br>
        <form class="m-2" action="{{ route('contact-route') }}" method="post">
            @csrf
            <label for="name">Введите Имя</label><br>
            <input type="text" name="name" id="name"><br>

            <label for="email">Введите email</label><br>
            <input type="text" name="email" id="email"><br>

            <button class="mt-2 btn btn-success">Отправить</button>
        </form>
        
        @if($errors->any())
            <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
            </div>
        @endif
        
    </body>
</html>
