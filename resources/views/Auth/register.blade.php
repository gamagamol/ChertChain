<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>

    <style>
        body {
            background-color: #8D8585;
        }

        .btn {
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

    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-6 ">
                <div class="card o-hidden border-0 shadow-lg my-5 mt-5 " style="height:500px;background-color:#D9D9D9;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col">
                                <div class="p-5">
                                    <div class="text-center">

                                        @if (session()->has('failed'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>{{ session('failed') }}</strong>
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                    <form class="user" method="POST" action="login">
                                        @csrf
                                        <div class="form-group">
                                            <label for="athereum">Athereum Address</label>
                                            <input type="text"
                                                class="form-control form-control-user @error('athereum') is-invalid @enderror my-2"
                                                placeholder="Enter athereum" name="athereum"
                                               >
                                            @error('athereum')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="username">User Name</label>
                                            <input type="text"
                                                class="form-control form-control-user @error('username') is-invalid @enderror my-2"
                                                placeholder="Enter username" name="username"
                                               >
                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text"
                                                class="form-control form-control-user @error('password') is-invalid @enderror my-2"
                                                placeholder="Enter password" name="password"
                                               >
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password2"> Repeat Password</label>
                                            <input type="text"
                                                class="form-control form-control-user @error('password2') is-invalid @enderror my-2"
                                                placeholder="Enter password2" name="password2"
                                               >
                                            @error('password2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="">

                                            <a href="{{ url('/') }}" class="btn btn-primary mt-4">Back</a>
                                            <button type=submit name=submit class="btn btn-primary mt-4">submit</button>
                                        </div>



                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    </div>


</body>

</html>
