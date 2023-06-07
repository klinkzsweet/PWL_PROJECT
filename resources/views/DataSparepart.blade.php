@extends('layout.main')

@section('content')                      
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data sparepart</h1>
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
               <a href="#" class="btn mb-3 btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#insertModal">
                  <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                  </span>
                  <span class="text">Tambah Data Sparepart</span>
              </a>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id Sparepart</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                  
                  @foreach ($data_spareparts as $sparepart)
                  <tr>
                    <td>{{$loop -> iteration}}</td>
                    <td class="text-capitalize">{{$sparepart->judul_sparepart}}</td>
                    <td>{{$sparepart->image}}</td>
                    <td>{{$sparepart->nama}}</td>
                    <td>{{$sparepart->harga}}</td>
                    <td>{{$sparepart->user->nama}}</td>
                    <td>
                      <a class="btn btn-primary" href="">Edit</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
      <!-- Modal -->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModal" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="insertModal">Input Data sparepart</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      {{-- <form class="user" method="POST" action="{{route('insert_new_member')}}"> --}}
                @csrf
              <div class="form-group">
                 <input id="name" type="text" class="form-control form-control-user " name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama...">
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="form-group">
                <input id="harga" type="text" class="form-control form-control-user"  name="harga" value="{{ old('harga') }}" required autocomplete="harga" placeholder="Harga...">
                  @error('harga')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
    </div>

  </div>
</div>
</div>       
@endsection