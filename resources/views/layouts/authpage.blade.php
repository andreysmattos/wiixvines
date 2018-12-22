<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include("includes.header")
    <title>Tibia Vines - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/css/styles-auth.css')}}">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body style="background:url(/images/bg2.jpg);background-attachment: fixed;
    background-position: center top;
    background-repeat: no-repeat;background-color:#061123;">
<div class="page-wrapper flex-row align-items-center">
    <div class="container">

            @yield('container')



    </div>
</div>

</body>
</html>
