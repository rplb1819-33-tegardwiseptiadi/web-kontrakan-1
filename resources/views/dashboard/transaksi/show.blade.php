<!-- ini adalah konten dari halaman Detail Transaksi -->
@extends('layout/main')

<!-- ini adalah title dari halaman Detail Transaksi -->
@section('title', 'Detail Data Transaksi')

<!-- ini adalah isi konten dari halaman Detail Transaksi -->
@section('container')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-8">
                        <nav aria-label="breadcrumb" class="d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/homepage_admin"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="/homepage_admin">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="/dashboard/transaksi">Kelola
                                        Transaksi</a></li>
                                <li class="breadcrumb-item " aria-current="page">Detail Transaksi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page content -->
        <div class="container-fluid mt--4">
            <div class="row">
                <!-- disini isi konten -->
                <div class="container-xl">
                    <!-- Form CRUD -->
                    <div class="row ">
                        <div class="col-lg-7 mx-auto">
                            <div class="card mt-2 mx-auto p-4 bg-light">
                                <div class="card-body bg-light">
                                    <div class="container">
                                        <h5 class="text-center mb-4"><i class="ni ni-single-02 text-blue"></i> <br>
                                            Detail Data Transaksi</h5>
                                        <form id="contact-form" role="form">
                                            <div class="controls">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group"> <label for="form_name">Nama Penghuni
                                                                :</label>
                                                            <input id="form_name" type="text" name="nama_penghuni"
                                                                class="form-control"
                                                                value="{{ $transaksi->occupants->nama_penghuni }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group"> <label for="form_name">Nama Kontrakan
                                                                :</label>
                                                            <input id="form_name" type="text" name="nama_kontrakan"
                                                                class="form-control"
                                                                value="{{ $transaksi->rents->nama_kontrakan }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group"> <label for="form_name">Nominal Transaksi
                                                                :</label>
                                                            <input id="form_name" type="text" name="nominal"
                                                                class="form-control"
                                                                value="{{ $transaksi->nominal }}" readonly> 
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-md-6">
                                                        <div class="form-group"> <label for="form_name">Status Transaksi
                                                                :</label>
                                                            <input id="form_name" type="text" name="status_transaksi"
                                                                class="form-control"
                                                                value="{{ $transaksi->status_transaksi }}" readonly> 
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group"> <label for="form_name">Tanggal Transaksi : (Y-M-D)
                                                                :</label>
                                                            <input id="form_name" type="text" name="tgl_transaksi"
                                                                class="form-control"
                                                                value="{{ $transaksi->tgl_transaksi }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group"> <label for="form_name">Foto Transaksi :
                                                                : {{ $transaksi->foto_transaksi }} </label>

                                                            <div class="form-group">
                                                                <img src="/assets/upload/foto_transaksi/{{$transaksi->foto_transaksi}}"
                                                                    alt="" width="450px" height="300px" >
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="/dashboard/transaksi"
                                                        class="btn btn-success btn-send pt-2 btn-block "
                                                            style="font-size: 20px;">
                                                            <span>Kembali</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div>
                                </div> <!-- /.8 -->
                            </div> <!-- Tutup Row -->
                            
                        </div> <!-- Tutup Row Isi Konten -->
                        
                    </div>
                    <!-- ini adalah tutup endsection -->
                @endsection
