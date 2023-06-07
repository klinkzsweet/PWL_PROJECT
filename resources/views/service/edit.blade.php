@extends('layout.main')
@section('content')
<div class="container mt-3">
    <div class="row justify-content-center align-items-center">
        <div class="card">
            <div class="card-header">
                Edit Data Service
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
                <form method="post" action="/service/{{$service->id}}" id="myForm"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')  
                <div class="form-group">
                         <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{$service->nama}}"
                            aria-describedby="nama">
                    </div>
                <div class="form-group">
                         <label for="harga">harga</label>
                        <input type="text" name="biaya" class="form-control" id="biaya" value="{{$service->biaya}}"
                            aria-describedby="biaya">
                    </div>
                    
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection