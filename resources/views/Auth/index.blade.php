@extends('template.template')
@section('content')
<div class="row mt-5">
    <div class="col">
        <table class="table table-bordered bg-light">
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
                <tr class="text-center">
                    <td>21321321321312</td>
                    <td>gamagamol</td>
                    <td>Gama Ariefsadya</td>
                    <td class="text-center "><input class="mt-3" type="checkbox"></td>
                    <td class="text-center"><a href="/user/edit/1" class="btn btn-primary">Edit</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection()