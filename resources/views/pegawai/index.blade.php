@extends('layout.main')
@section('title')
    Data Pegawai
@endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pegawai</h1>
    <p class="mb-4">Berikut merupakan data Pegawai service</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <a href="/datapegawai/create" class="btn mb-3 btn-primary btn-icon-split btn-sm">Tambah Data Pegawai</a>
      </a>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Pegawai</th>
                <th>Email</th>
                <th>Bergabung Pada</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             
              @foreach ($users as $user)
              <tr>
              <td>{{$loop -> iteration}}</td>
              <td><img src="{{ asset('storage/'.$user -> foto) }}" alt="" height="50px" width="50px" class="rounded"
                style="object-fit: cover"></td>
              <td class="text-capitalize">{{$user->nama}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->tanggal_join}}</td>
              <td>
                <a class="btn btn-primary" href="/datapegawai/{{$user->id}}/edit">Edit</a>
                <form action="/datapegawai/{{$user->id}}" method="POST">@csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Delete</i></button></form>
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

</div>
<!-- End of Main Content -->
@endsection
