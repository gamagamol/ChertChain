@extends('template.template')
@section('content')
{{-- @dump($data) --}}
        <div class="row justify-content-center">
            <div class="col-md-6 ">
                <div class="card o-hidden border-0 shadow-lg my-5 mt-5 " style="height:600px;background-color:#D9D9D9;">
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
                                    <form class="user" method="POST" action="/user/update/{{$data->id_auth}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="athereum">Athereum Address</label>
                                            <input type="text"
                                                class="form-control form-control-user @error('athereum') is-invalid @enderror my-2"
                                                placeholder="Enter athereum" name="athereum" value="{{$data->ethereum_address}}" readonly>
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
                                                placeholder="Enter username" name="username" value="{{$data->name}}" >
                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="status">Status</label>
                                            
                                            <select name="status" id="status" class="form-control">
                                                <option value="-">-</option>
                                                <option value="creator">Creator</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            
                                            <label for="password">Password</label>
                                            <p class="btn btn-danger mt-2 ml-4" style="font-size: 10px" id='reset-password'>Reset Password</p>

                                            <input type="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror my-2"
                                                placeholder="Enter password" name="password"
                                              hidden  id="password">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group" id="repeat-password" hidden>
                                            
                                            <label for="password2"> Repeat Password</label>
                                            <input type="password"
                                                class="form-control form-control-user @error('password2') is-invalid @enderror my-2"
                                                placeholder="Enter password2" name="password2"
                                               >
                                            @error('password2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mt-3">

                                            <a href="{{ url('/user') }}" class="btn btn-primary mt-4">Back</a>
                                            <button type=submit name=submit class="btn btn-primary mt-4">submit</button>
                                        </div>

                                        <input type="text" name="reset" id="reset" hidden>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $('#reset-password').click(function(){
                $('#repeat-password').removeAttr('hidden')
                $('#password').removeAttr('hidden')
                $(this).attr('hidden',true)
                $('#reset').val('reset')

            })
        </script>
@endsection()