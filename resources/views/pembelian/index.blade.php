@extends('layout.main')

@section('content')                      
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Pembelian</h1>
        <p class="mb-4">Berikut merupakan data Pembelian dalam servis barang elektronik</p>

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
              <a href="/pembelian/create" class="btn mb-3 btn-primary btn-icon-split btn-sm">Tambah Data Pembelian</a>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id Pembelian</th>
                    <th>Nama Sparepart</th>
                    <th>Jumlah Pembelian</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                  
                  @foreach ($pembelian as $pembeliannya)
                  <tr>
                    <td>{{$loop -> iteration}}</td>
                    <td>{{$pembeliannya->sparepart->nama}}</td>
                    <td>{{$pembeliannya->jumlah}}</td>
                    <td>
                      <a class="btn btn-info" href="/pembelian/{{$pembeliannya->id}}"><i class="bi bi-eye"></i></a>
                      <a class="btn btn-primary" href="/pembelian/{{$pembeliannya->id}}/edit"><i class="bi bi-pencil-square"></i></a>
                      <form action="/pembelian/{{$pembeliannya->id}}" method="POST">@csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button></form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {!!@$pembelian->links()!!}
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
</div>
</div>       
@endsection