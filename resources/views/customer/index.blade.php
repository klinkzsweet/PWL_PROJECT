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
               <a href="/datacustomer/create" class="btn mb-3 btn-primary btn-icon-split btn-sm">Tambah Data Customer</a>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id</th>
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
                        <a class="btn btn-info" href="/datacustomer/{{$customer->id}}"><i class="bi bi-eye"></i></a>
                      <a class="btn btn-primary" href="/datacustomer/{{$customer->id}}/edit"><i class="bi bi-pencil-square"></i></a>
                      <form action="/datacustomer/{{$customer->id}}" method="POST">@csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button></form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {!!@$data_customers->links()!!}
            </div>
          </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>       
@endsection