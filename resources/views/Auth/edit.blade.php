@extends('template.template')
@section('content')
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
                                            <p class="btn btn-danger mt-2 ml-2" style="font-size: 10px">Reset Password</p>
                                            <input type="text"
                                                class="form-control form-control-user @error('password') is-invalid @enderror my-2"
                                                placeholder="Enter password" name="password"
                                              hidden >
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group" hidden>
                                            
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

                                            <a href="{{ url('/user') }}" class="btn btn-primary mt-4">Back</a>
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
@endsection()