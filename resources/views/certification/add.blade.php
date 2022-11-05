@extends('template.template')
@section('content')
    {{-- @dump($data) --}}
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
                                <form class="user" method="POST" action="/certification/store">
                                    @csrf
                                    <div class="form-group">
                                        <label for="holder">Certification Holder</label>
                                        <select  class="form-control" name="holder" id="holder">
                                            @foreach ($data as $d)
                                                <option value="{{ $d->id_auth }}">{{ $d->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="signer">Certification Signer</label>
                                        <select  class="form-control" name="signer" id="signer">
                                            @foreach ($data as $d)
                                                <option value="{{ $d->id_auth }}">{{ $d->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Certification Title</label>
                                        <input type="text"
                                            class="form-control form-control-user @error('title') is-invalid @enderror my-2"
                                            placeholder="Enter title" name="title">
                                        @error('title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="data1">Certification Data 1</label>
                                        <input type="text"
                                            class="form-control form-control-user @error('data1') is-invalid @enderror my-2"
                                            placeholder="Enter data1" name="data1">
                                        @error('data1')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="data2">Certification Data 2</label>
                                        <input type="text"
                                            class="form-control form-control-user @error('data2') is-invalid @enderror my-2"
                                            placeholder="Enter data2" name="data2">
                                        @error('data2')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="document">Upload Document</label>
                                        <input type="file"
                                            class="form-control form-control-user @error('document') is-invalid @enderror my-2"
                                            placeholder="Enter document" name="document">
                                        @error('document')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="link">IPFS link</label>
                                        <input type="text"
                                            class="form-control form-control-user @error('link') is-invalid @enderror my-2"
                                            placeholder="Enter link" name="link">
                                        @error('link')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="">

                                        <a href="{{ url('/certification') }}" class="btn btn-primary mt-4">Back</a>
                                        <button type=submit name=submit class="btn btn-primary mt-4">submit</button>
                                    </div>



                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>div>
    </div>
@endsection()
