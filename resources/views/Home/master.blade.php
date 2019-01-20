<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="/css/font.css">
    <link rel="stylesheet" href="/css/style.css">

    <title>وبلاگ شخصی</title>


</head>

<body>


<!-- Back to top button -->

<a  href="javascript:" id="return-to-top"><i class="fas fa-arrow-circle-up"></i></a>

    @include('home.section.navigation')

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            @yield('content')

            @include('home.section.sidebar')

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    @include('Home.section.footer')

</body>
</html>
