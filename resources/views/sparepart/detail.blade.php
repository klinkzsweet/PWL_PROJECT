@extends('layout.main')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card">
            <div class="card-header">
                Detail Sparepart
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Id Sparepart        : </b>{{$data_spareparts->id}}</li>
                    <li class="list-group-item"><b>Gambar    : </b><img src="{{ asset('storage/'.$data_spareparts ->book_image) }}" alt="" height="150px" width="150px" class="rounded"
                        style="object-fit: cover"></li>
                    <li class="list-group-item"><b>Nama : </b>{{$data_spareparts->nama}}</li>
                    <li class="list-group-item"><b>Stok : </b>{{$data_spareparts->stok}}</li>
                    <li class="list-group-item"><b>Harga : </b>{{$data_spareparts->harga}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="/datasparepart">Kembali</a>
        </div>
    </div>
</div>
@endsection