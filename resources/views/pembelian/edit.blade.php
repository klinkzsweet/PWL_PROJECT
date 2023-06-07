@extends('layout.main')
@section('content')
<div class="container mt-3">
    <div class="row justify-content-center align-items-center">
        <div class="card">
            <div class="card-header">
                Edit Data Sparepart
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
                <form method="post" action="/datasparepart/{{$data_spareparts->id}}" id="myForm"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')  
                <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" name="image" class="form-control" id="image" value="{{$data_spareparts->image}}"
                            aria-describedby="image">
                    </div>
                <div class="form-group">
                         <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{$data_spareparts->nama}}"
                            aria-describedby="nama">
                    </div>
                <div class="form-group">
                         <label for="harga">harga</label>
                        <input type="text" name="harga" class="form-control" id="harga" value="{{$data_spareparts->harga}}"
                            aria-describedby="harga">
                    </div> 
                  <div class="form-group">
                        <label for="deskripsi">Diinput Oleh</label>
                        <select class="form-select" name="user_id">
                         @foreach ($users as $user)

                         <option value="{{ $user->id }}" {{ $data_spareparts->user_id == $user->id ? 'selected' : '' }}>
                         {{ $user->nama }} </option>
                         @endforeach
                         </select>
                    </div> 
                    
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection