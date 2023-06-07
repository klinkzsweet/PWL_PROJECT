@extends('layouts.app')

@section('content')
<div class="loading authentication-bg"
        data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5" style="transform: translateY(-90px) ;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">
                            <!-- Logo-->
                            <div class="card-header pt-1 pb-1 text-center bg-primary">
                                <a href="#" style="color: white;">
                                    WEB SERVIS ELEKTRONIK
                                </a>
                            </div>

                            <div class="card-body p-4">

                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 fw-bold">Daftar</h4>
                                    <p class="text-muted mb-4">Belum Punya Akun? Silahkan Daftar Disini</p>
                                </div>

                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Nama</label>
                                        <input class="form-control" type="text" id="fullname"
                                            placeholder="Masukkan Nama" required name="nama" value="{{ old('nama') }}"
                                            autofocus>
                                        @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">Email</label>
                                        <input class="form-control" type="email" id="emailaddress" required
                                            placeholder="Masukkan Email" name="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control"
                                                placeholder="Masukkan password" name="password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Konfirmasi Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control"
                                                placeholder="Masukkan konfirmasi password" name="password_confirmation">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="petugas" name="level">
                                    <input type="hidden" value="@php echo date('Y-m-d'); @endphp" name="tanggal_join">
                                    <div class="mb-3 text-center">
                                        <button class="btn btn-primary" type="submit"> Daftar </button>
                                    </div>
                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Sudah punya akun? <a href="{{ route('login') }}"
                                        class="text-muted ms-1"><b>Masuk</b></a></p>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
              2022 © - Afvanie - Ridho
        </footer>
    </div>
@endsection
