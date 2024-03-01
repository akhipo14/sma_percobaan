<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('user.layouts.link')
</head>

<body>
    <main id="main" style="margin-top: 0px">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <h1>Reset Password</h1>
            <p class="text-primary">Silahkan tekan tombol reset password, untuk mereset password anda</p>
            <a class="btn btn-primary" href={{ route('reset.password', $token) }}>Reset Password</a>
            @include('user.layouts.script')
        </section>
    </main>

</body>

</html>
