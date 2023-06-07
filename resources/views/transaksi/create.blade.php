@extends('layout.main')
@section('content')
<div class="container mt-3">
    <div class="row justify-content-center align-items-center">
        <div class="card">
            <div class="card-header">Tambah Data Transaksi
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
                <form method="post" action="/transaksi" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Sparepart</label>
                        <select name="customer_id" class="form-control" id="customer_id">
                            @foreach ($data_customers as $data_customers)
                            <option value="{{$data_customers->id}}">{{$data_customers->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Sparepart</label>
                        <select name="sparepart_id" class="form-control" id="sparepart_id">
                            @foreach ($data_spareparts as $data_spareparts)
                            <option value="{{$data_spareparts->id}}">{{$data_spareparts->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Service</label>
                        <select name="service_id" class="form-control" id="service_id">
                            @foreach ($service as $service)
                            <option value="{{$service->id}}">{{$service->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label for="jumlah">Biaya</label>
                        <input type="text" name="biaya" class="form-control" id="biaya" aria-describedby="biaya">
                    </div>  --> 
                    <br>                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection