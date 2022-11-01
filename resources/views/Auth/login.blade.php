<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <style>
        body {
            background-color: #8D8585;
        }
        .btn{
            background-color: #142890;
            color:white; 
        }
    </style>

    <title>CertChain</title>
</head>

<body>
    <div class="container">
        <div class="container">


            <div class="row justify-content-center">

                <div class="col-md-6 my-5 mt-5 " style="margin-top:500px">
                    <h1 style="margin-top: 200px;color:white;">CertChain</h1>
                    <p style="color: white">Blockchain based certificate record</p>
                </div>

                <div class="col-md-6 ">

                    <div class="card o-hidden border-0 shadow-lg my-5 mt-5 " style="height:500px;background-color:#D9D9D9;">
                        <div class="card-body ">
                            <!-- Nested Row within Card Body -->
                            <div class="row">

                               
                                <div class="col ">
                                    <div class="p-5">
                                        <div class="text-center">
                                           
                                            @if (session()->has('failed'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>{{ session('failed') }}</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @endif
                                        </div>
                                        <form class="user" method="POST" action="login">
                                            @csrf
                                            
                                            <div class="form-group">
                                                <label for="username">User Name</label>
                                                <input type="text" class="form-control form-control-user @error('ussername') is-invalid @enderror mb-3 " placeholder="Enter Ussername" name="ussername"  id="username">
                                                @error('ussername')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>

                                                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror " id="exampleInputPassword" placeholder="Password" name="password" >
                                                @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <button type=submit name=submit class="btn btn-primary mt-4 " >submit</button>

                                            <a href="{{url("/register")}}" class="btn btn-primary mt-4">Register</a>

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