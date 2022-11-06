@extends('template.template')
@section('content')
    {{-- @dump($data) --}}
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

            <table class="table table-bordered bg-light" id="table">
                <thead>
                    <tr class="text-center">
                        <th>Certification Hash</th>
                        <th>Certification Holder</th>
                        <th>Certification Signer</th>
                        <th>Date Signed</th>
                        <th>Certification Title</th>
                        <th> Data 1</th>
                        <th> Data 2</th>
                        <th>IPFS Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data as $d)
                        <tr class="text-center">
                            <td>{{ $d->hash_certificate }}</td>
                            <td>{{ $d->holder_name }}</td>
                            <td>{{ $d->sign_name }}</td>
                            <td>{{ $d->date_sign_holder ? $d->date_sign_holder : 'Not Signed' }}</td>
                            <td>{{ $d->title_certificate }}</td>
                            <td>{{ $d->data_certificate }}</td>
                            <td>{{ $d->data_certificate1 }}</td>
                            <td>{{ $d->ipfs_link }}</td>
                            <td><a href="/certification/holder_detail/{{ $d->id_certificate }}"
                                    class="btn btn-primary">Detail</a>
                            </td>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <p class="btn btn-primary mb-4" id="checkall">Sign All</p>


    <div class="modal " tabindex="-1" id="modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">
                        <div class="d-flex justify-content-center ">

                            <img src="/img/correct.png" alt="" width="250px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <h1>Success Update All Data </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">

                            <button class="btn btn-primary fs-5" style="width:100px ;" onClick="Refresh()"> Next</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {





            $('#checkall').click(function() {


                

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                    },
                    url: '/certification/update_all',
                    type: 'POST',
                    data: {
                        id_auth: {{ $id_auth }},
                        type: 'holder'
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.status) {





                            $('#modal').modal('show')


                        }
                    }
                })
            })





        })

        function Refresh() {
            location.reload();
        }
    </script>
@endsection()
