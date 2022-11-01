@extends('template.template')
@section('content')
    <div class="row mt-5">
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
                    <tr class="text-center">
                        <td>hash 123</td>
                        <td>cindy</td>
                        <td>2022/12/12</td>
                        <td>gama</td>
                        <td>ijazah</td>
                        <td>contoh data</td>
                        <td>contoh data</td>
                        <td>https://test</td>
                        <td>
                            <p class="btn btn-primary" id="detail">Detail</p>
                        </td>
                    </tr>
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
