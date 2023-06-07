@extends('layout.main')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card">
            <div class="card-header">
                Detail Customer
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Id: </b>{{$data_customers->id}}</li>
                    <li class="list-group-item"><b>Image: </b><img src="{{ asset('storage/'.$data_customers ->image) }}" alt="" height="150px" width="150px" class="rounded"
                        style="object-fit: cover"></li>
                    <li class="list-group-item"><b>Nama: </b>{{$data_customers->nama}}</li>
                    <li class="list-group-item"><b>Alamat: </b>{{$data_customers->alamat}}</li>
                    <li class="list-group-item"><b>No Telp: </b>{{$data_customers->notelp}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="/datacustomer">Kembali</a>
        </div>
    </div>
</div>
@endsection