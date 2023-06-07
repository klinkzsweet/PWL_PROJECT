@extends('layout.main')
@section('content')
<div class="container mt-3">
    <div class="row justify-content-center align-items-center">
        <div class="card">
            <div class="card-header">Tambah Data Pegawai
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
                <form method="post" action="/datapegawai" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control" id="foto" aria-describedby="foto">
                    </div>
                    <div class="form-group">
                        <label for="Nama">Nama Pegawai</label>
                        <input type="text" name="nama" class="form-control" id="Nama" ariadescribedby="Nama">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email"
                            ariadescribedby="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password"
                            ariadescribedby="password">
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select class="form-select" aria-label="Default select example" name="level">
                            <option selected value="pegawai">pegawai</option>
                            <option value="admin">admin</option>
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_join">Tanggal Join</label>
                        <input type="date" name="tanggal_join" class="form-control" id="tanggal_join" ariadescribedby="tanggal_join">
                    </div><br>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection