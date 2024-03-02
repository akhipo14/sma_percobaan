<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/82ebf8392e.js" crossorigin="anonymous"></script>
    @include('user.layouts.link')
</head>

<body style="background-color: rgb(250, 250, 250);">
    @include('user.layouts.header')
    <!-- ======= Hero Section ======= -->

    @yield('content')

    @include('user.layouts.footer')
    @include('user.layouts.script')
</body>

</html>
