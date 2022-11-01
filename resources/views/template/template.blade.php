<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <style>
        body {
            background-color: #8D8585;
        }

        .btn-primary {
            background-color: #142890;
            color: white;
        }
    </style>

    <title>CertChain</title>
</head>

<body>
    <nav class="navbar ml-2">
        <span class="navbar-brand mb-0 h1" style="color: white">
            <span style="font-size: 2rem;margin-left:100px;">CertChain</span>
            <span>Blockchain based certificate record</span>

        </span>
    </nav>
    <hr style="height:10px;">

    <h3 style="margin-left: 100px;color:white;">Welcome,Admin</h3>
    <div class="container">
        @yield('content')

    </div>
    </div>




</body>

</html>
