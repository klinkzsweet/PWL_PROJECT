@extends('layout.main')

@section('content')                      
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Sparepart</h1>
        <p class="mb-4">Berikut merupakan data Sparepart dalam servis barang elektronik</p>

      @if(Session::has('berhasil'))
          <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Success,</strong>
              {{ Session::get('berhasil') }}
          </div>
      @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
              <a href="/datasparepart/create" class="btn mb-3 btn-primary btn-icon-split btn-sm">Tambah Data Sparepart</a>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id Sparepart</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                  
                  @foreach ($data_spareparts as $sparepart)
                  <tr>
                    <td>{{$loop -> iteration}}</td>
                    
                    <td><img src="{{ asset('storage/'.$sparepart -> image) }}" alt="" height="90px" width="90px" class="rounded" style="object-fit: cover"></td>
                    <td>{{$sparepart->nama}}</td>
                    <td>{{$sparepart->stok}}</td>
                    <td>{{$sparepart->harga}}</td>
                    <td>
                      <a class="btn btn-info" href="/datasparepart/{{$sparepart->id}}"><i class="bi bi-eye"></i></a>
                      <a class="btn btn-primary" href="/datasparepart/{{$sparepart->id}}/edit"><i class="bi bi-pencil-square"></i></a>
                      <form action="/datasparepart/{{$sparepart->id}}" method="POST">@csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button></form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {!!@$data_spareparts->links()!!}
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
</div>
</div>       
@endsection