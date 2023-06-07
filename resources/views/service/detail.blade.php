@extends('layout.main')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card">
            <div class="card-header">
                Detail Service
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Id Service        : </b>{{$service->id}}</li>
                    <li class="list-group-item"><b>Nama Service : </b>{{$service->nama}}</li>
                    <li class="list-group-item"><b>Biaya : </b>{{$service->harga}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="/service">Kembali</a>
        </div>
    </div>
</div>
@endsection