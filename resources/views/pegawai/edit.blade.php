@extends('layout.main')
@section('content')
<div class="container mt-3">
    <div class="row justify-content-center align-items-center">
        <div class="card">
            <div class="card-header">
                Edit Pegawai
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
                <form method="post" action="/datapegawai/{{$users->id}}" id="myForm"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control" id="foto" ariadescribedby="foto"
                            value="{{ $users -> foto }}">
                        <img width="150px" src="{{asset('storage/'.$users -> foto)}}"
                            alt="{{ $users -> foto }}">
                    </div>
                    <div class="form-group">
                        <label for="Nama">Nama Pegawai</label>
                        <input type="text" name="nama" class="form-control" id="Nama" value="{{ $users->nama }}"
                            aria-describedby="Nama">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" value="{{ $users->email }}"
                            aria-describedby="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" value="{{ $users->password }}"
                            aria-describedby="password">
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select class="form-select" aria-label="Default select example" name="level">
                            <option selected value="pegawai">pegawai</option>
                            <option value="admin">admin</option>
                          </select>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                        <label for="tanggal_join">Tanggal Join</label>
                        <input type="date" name="tanggal_join" class="form-control" id="tanggal_join" ariadescribedby="tanggal_join">
                    </div><br>
                    </div>
                    
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection