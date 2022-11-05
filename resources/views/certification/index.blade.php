@extends('template.template')
@section('content')
    <div class="row mt-5">
        <div class="text-center">

            @if (session()->has('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('failed') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="col">

            <a class="btn btn-primary mb-4" href="{{ url('/certification/add') }}">New Data</a>

            <table class="table table-bordered bg-light" id="table">
                <thead>
                    <tr class="text-center">
                        <th>Certification Hash</th>
                        <th>Certification Holder</th>
                        <th>Certification Signer</th>
                        <th>Date Signed</th>
                        <th>Certification Title</th>
                        <th>Certification Data 1</th>
                        <th>Certification Data 2</th>
                        <th>IPFS Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d )
                    <tr>
                        <td>{{$d->hash_certificate}}</td>
                        <td>{{$d->holder_name}}</td>
                        <td>{{$d->sign_name}}</td>
                        <td>-</td>
                        <td>{{$d->title_certificate}}</td>
                        <td>{{$d->data_certificate}}</td>
                        <td>{{$d->data_certificate1}}</td>
                        <td>{{$d->ipfs_link}}</td>
                        <td><a href="/certification/detail/{{$d->id_certificate}}" class="btn btn-primary">Detail</a></td>


                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div class="modal" tabindex="-1" id='modal'>
        <div class="modal-dialog">
            <div class="modal-content" style="background-color:#D9D9D9">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Certification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label for="">Certification Holder</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <div class="col">
                            <label for="">signed</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <label for="">Certification Signer</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <div class="col">
                            <label for="">signed</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <label for="">Certification Title</label>
                            <input type="text" class="form-control" readonly>
                        </div>

                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <label for="">Certification Data 1</label>
                            <input type="text" class="form-control" readonly>
                        </div>

                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <label for="">Certification Data 2</label>
                            <input type="text" class="form-control" readonly>
                        </div>

                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <label for="">IPFS Link</label>
                            <input type="text" class="form-control" readonly>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#table tbody').on('click', '#detail', function() {
                $('#modal').modal('show')
            })
        })
    </script>
@endsection()
