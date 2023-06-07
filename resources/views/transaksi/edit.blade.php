@extends('layout.main')
@section('content')
<div class="container mt-3">
    <div class="row justify-content-center align-items-center">
        <div class="card">
            <div class="card-header">
                Edit Data Pembelian
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
                <form method="post" action="/transaksi/{{$transaksi->id}}" id="myForm"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT') 
                    <div class="form-group">
                        <label for="nama">Customer</label>
                        <select name="customer_id" class="form-control" id="customer_id">
                            @foreach ($data_customers as $data_customers)
                            <option value="{{$data_customers->id}}" {{$transaksi->customer_id == $data_customers->id ? 'selected' : ''}}>{{$data_customers->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Sparepart</label>
                        <select name="sparepart_id" class="form-control" id="sparepart_id">
                            @foreach ($data_spareparts as $data_spareparts)
                            <option value="{{$data_spareparts->id}}" {{$transaksi->sparepart_id == $data_spareparts->id ? 'selected' : ''}}>{{$data_spareparts->nama}}</option>
                            @endforeach
                        </select>
                    </div> 
                <div class="form-group">
                        <label for="nama">Service</label>
                        <select name="service_id" class="form-control" id="service_id">
                            @foreach ($service as $service)
                            <option value="{{$service->id}}" {{$transaksi->service_id == $service->id ? 'selected' : ''}}>{{$service->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label for="biaya">Biaya</label>
                        <input type="text" name="biaya" class="form-control" id="biaya" aria-describedby="biaya" value="{{$transaksi->biaya}}">
                    </div>  -->
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection