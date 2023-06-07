@extends('layout.main')
@section('content')
<div class="container mt-3">
    <div class="row justify-content-center align-items-center">
        <div class="card">
            <div class="card-header">Cetak Laporan
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="/laporan/cetak" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="tipe">Tipe laporan</label>
                        <select name="tipe" class="form-control" id="tipe">
                            <option value="pembelian">Pembelian</option>
                            <option value="transaksi">Transaksi</option>
                        </select>
                    </div>
                    <br>                    
                    <button type="submit" class="btn btn-primary">Cetak</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection