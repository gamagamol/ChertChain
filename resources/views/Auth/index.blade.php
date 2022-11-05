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
            <table class="table table-bordered bg-light" id="user-table">
                <thead>
                    <tr class="text-center">
                        <th>Ethereum Address</th>
                        <th>User Name</th>
                        <th>Full Name</th>
                        <th>Creator</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr class="text-center">
                            <td>{{ $d->ethereum_address }}</td>
                            <td>{{ $d->ussername }}</td>
                            <td>{{ $d->name }}</td>
                            <td>
                                @if ($d->status == 'creator')
                                    <p class="btn btn-success">{{ $d->status }} </p>
                                @else
                                    <p class="btn btn-danger">{{ $d->status }} </p>
                                @endif
                            </td>
                            <td><a href="/user/edit/{{ $d->id_auth }}" class="btn btn-primary">Edit</a></td>
                        </tr>
                    @endforeach



                </tbody>
            </table>

        </div>
    </div>
@endsection()
