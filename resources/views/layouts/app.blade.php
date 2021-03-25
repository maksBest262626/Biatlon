<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="d-flex h-100 text-center text-white bg-dark">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

    @include('includes.header') <!--Подключение части кода из папки инклудес файл header  -->
<div class="px-3">
    @if(Request::is('/'))
        @include('includes.hello')
    @endif
    
    <!-- <div class="container mt-5">
        <div class="row">
        <div class="col-8"> -->
             @yield('content') <!--Создание точки в которую можно будет вставлять код  -->
        <!-- </div>
        <div class="col-4"> -->
            @include('includes.aside') <!--Подключение части кода из папки инклудес файл асайд  -->
        <!-- </div>
         </div> -->
    </div>
    @include('includes.footer') <!--Подключение части кода из папки инклудес файл footer  -->
    </div>
</body>
</html>
