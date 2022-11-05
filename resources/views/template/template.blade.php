<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

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



    <nav class="navbar navbar-expand-lg  ">
        <div class="container-fluid">
            <a class="navbar-brand" href="/" style="color: white;font-size: 2rem;margin-left:100px;">CertChain</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" style="color: white" href="/certification"
                            {{ session()->get('status') == 'admin' ? 'hidden' : '' }}>Holder</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: white" href="/certification/sign"
                            {{ session()->get('status') == 'admin' ? 'hidden' : '' }}>Sign</a>
                    </li>

                    <li class="nav-item" {{ session()->get('status') != 'admin' ? 'hidden' : '' }}>
                        <a class="nav-link" style="color: white" href="/user">Users</a>
                    </li>

                    <li class="nav-item"
                        {{ session()->get('status') == 'admin' || session()->get('status') == 'creator' ? '' : 'hidden' }}>
                        <a class="nav-link" style="color: white" href="/certification">Certification</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <hr style="height:10px;">

    <h3 style="margin-left: 100px;color:white;">Welcome,{{ $nama }}</h3>
    <div class="container">
        @yield('content')

    </div>
    </div>




</body>

</html>
