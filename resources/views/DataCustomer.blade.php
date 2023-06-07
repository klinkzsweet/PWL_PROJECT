@extends('layout.main')

@section('content')                      
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Customer</h1>
        <p class="mb-4">Berikut merupakan data customer service</p>

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
                  <span class="text">Tambah Data Customer</span>
              </a>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Id Customer</th>
                    <th>Image</th>
                    <th>Nama User</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                  
                  @foreach ($data_customers as $customer)
                  <tr>
                    <td>{{$loop -> iteration}}</td>
                    <td>{{$customer->id}}</td>
                    <td><img src="
                    @if($customer -> jeniskelamin == 'Perempuan')
                      {{asset('image/student-female.png')}}
                      @else 
                      {{asset('image/student-male.png')}}
                      @endif
                      " alt="" width="50px"></td>
                    <td class="text-capitalize">{{$customer->nama}}</td>
                    <td>{{$customer->alamat}}</td>
                    <td>{{$customer->notelp}}</td>
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
      <h5 class="modal-title" id="insertModal">Input Data Member</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      {{-- <form class="user" method="POST" action="{{route('insert_new_member')}}"> --}}
                @csrf
              <div class="form-group">
                 <input id="name" type="text" class="form-control form-control-user " name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama Member...">
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="form-group">
                <input id="alamat" type="text" class="form-control form-control-user"  name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" placeholder="Alamat Tinggal...">
                  @error('alamat')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                   <input id="no_telp" type="text" class="form-control form-control-user " name="no_telp" required autocomplete="no_telp" placeholder="No Telepon...">
                      @error('no_telp')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div>
                <div class="col-sm-6">
                   <input id="tgl_lahir" type="text" class="form-control form-control-user" onfocus="(this.type='date')" onblur="(this.type='text')" name="tgl_lahir" required autocomplete="tgl_lahir" placeholder="Tanggal Lahir...">
                    @error('tgl_lahir')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div>

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