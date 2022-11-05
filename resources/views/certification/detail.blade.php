@extends('template.template')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 ">
            <div class="card o-hidden border-0 shadow-lg my-5 mt-5 " style="height:750px;background-color:#D9D9D9;">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col">
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
                                {{-- <form class="user" method="POST" action="/certification/store"> --}}
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">Certification holder</label>
                                                <input type="text"
                                                    class="form-control form-control-user  my-2"
                                                    value="{{$data[0]->holder_name}}">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">signed</label>
                                                <input type="text"
                                                    class="form-control form-control-user  my-2"
                                                   value="{{($data[0]->date_sign_holder)?$data[0]->date_sign_holder:'unsigned'}}" >
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">Certification signer</label>
                                                <input type="text"
                                                    class="form-control form-control-user  my-2"
                                                    value="{{$data[0]->sign_name}}">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">signed</label>
                                                <input type="text"
                                                    class="form-control form-control-user  my-2"
                                                   value="{{($data[0]->date_sign_sign)?$data[0]->date_sign_sign:'unsigned'}}" >
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="data2">Certification Title</label>
                                        <input type="text"
                                            class="form-control form-control-user  my-2"
                                            value="{{$data[0]->title_certificate}}">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="data2">Certification Data 1</label>
                                        <input type="text"
                                            class="form-control form-control-user  my-2"
                                            value="{{$data[0]->data_certificate}}">
                                       
                                    </div>
                                    <div class="form-group">
                                        <label for="data2">Certification Data 2</label>
                                        <input type="text"
                                            class="form-control form-control-user  my-2"
                                           value="{{$data[0]->data_certificate1}}" >
                                       
                                    </div>
                                    

                                    <div class="form-group">
                                        <label for="link">IPFS link</label>
                                        <input type="text"
                                            class="form-control form-control-user @error('link') is-invalid @enderror my-2"
                                            placeholder="Enter link" name="link" value="{{$data[0]->ipfs_link}}">
                                        
                                    </div>

                                    <div class="">

                                        <a href="{{ url('/certification') }}" class="btn btn-primary mt-4">Back</a>
                                    </div>



                                {{-- </form> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>div>
    </div>
@endsection()
