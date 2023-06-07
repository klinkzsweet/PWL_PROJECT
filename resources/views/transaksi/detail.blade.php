@extends('layout.main')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card">
            <div class="card-header">
                Detail Transaksi
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Id Transaksi        : </b>{{$transaksi->id}}</li>
                    <li class="list-group-item"><b>Customer : </b>{{$transaksi->customer->nama}}</li>
                    <li class="list-group-item"><b>Sparepart : </b>{{$transaksi->sparepart->nama}}</li>
                    <li class="list-group-item"><b>Service : </b>{{$transaksi->service->nama}}</li>
                    <li class="list-group-item"><b>Biaya : </b>{{$transaksi->biaya}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="/transaksi">Kembali</a>
        </div>
    </div>
</div>
@endsection