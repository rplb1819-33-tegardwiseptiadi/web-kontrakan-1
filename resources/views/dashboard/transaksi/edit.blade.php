<!-- ini adalah konten dari halaman Edit Transaksi -->
@extends('layout/main')

<!-- ini adalah title dari halaman Edit Transaksi -->
@section('title', 'Edit Data Transaksi')
@section('header')
@include("includes.header", [
    "icon" => "fas fa-hotel",
    "breadcrumbs" => [
    [
    "name" => "List Transaksi",
    "is_active" => "",
    "link" => "/dashboard/transaksi"
    ],
    [
    "name" => "Edit Transaksi",
    "is_active" => "active",
    "link" => ""
    ]
    ]
    ])
@endsection
<!-- ini adalah isi konten dari halaman Edit Transaksi -->
@section('container')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        
        <!-- Page content -->
        <div class="container-fluid mt--4">

            <div class="row">
                <!-- disini isi konten -->
                <div class="container-xl">

                    <div class="wrapper">
                        @include('sweetalert::alert')
                    </div>

                    <!-- Form CRUD -->
                    <div class="row ">
                        <div class="col-lg-7 mx-auto">
                            <div class="card mt-2 mx-auto p-4 bg-light">
                                <div class="card-body bg-white">
                                    <div class="container">
                                        <h1 class="text-center mb-4"><i class="ni ni-single-02 text-blue"></i> <br>
                                            Edit Data Transaksi</h1>
                                        <br />
                                        <form id="contact-form" role="form" method="post"
                                            action="{{ route('dashboard.transaksi.update', $transaksi->id) }}"
                                            enctype="multipart/form-data">
                                            @method("PUT")
                                            @csrf
                                            <div class="controls">
                                                 
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="form_need">Nama penghuni
                                                                <span class="text-red">*</span>
                                                                :</label>
                                                                <input id="form_name" type="text" name="nama_penghuni"
                                                                class="form-control"
                                                                value="{{ $transaksi->occupants->nama_penghuni }}" readonly>
                                                         </div>
                                                      </div>
                                                  </div>
                                                
                                                  <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="form_need">Nama Kontrakan
                                                                <span class="text-red">*</span>
                                                                :</label>
                                                                <input id="form_name" type="text" name="nama_kontrakan"
                                                                class="form-control"
                                                                value="{{ $transaksi->rents->nama_kontrakan }}" readonly>
                                                         </div>
                                                      </div>
                                                  
                                                    <div class="col-md-6">
                                                        <div class="form-group"> <label for="form_name">Nominal Transaksi
                                                                <span class="text-red">*</span>
                                                                :</label> <input type="number" name="nominal"
                                                                class="form-control @error('nominal') is-invalid @enderror"
                                                                placeholder="Masukkan Nominal Transaksi"
                                                                value="{{ $transaksi->nominal }}" id="nominal">
                                                            @error('nominal')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                  </div>
                                                
                                                  <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="form_need">Status Transaksi
                                                                <span class="text-red">*</span>
                                                                :</label>
                                                                <br>
                                                                <div class="form-check form-check-inline">
                                                                    <input
                                                                        class="form-check-input @error('status_transaksi') is-invalid @enderror"
                                                                        type="radio" name="status_transaksi"
                                                                        id="inlineRadio1" value="Lunas" {{ old('status_transaksi', $transaksi->status_transaksi) === 'Lunas' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="inlineRadio1">Lunas</label>
                                                                </div>
                                                                
                                                                <div class="form-check form-check-inline">
                                                                    <input
                                                                        class="form-check-input @error('status_transaksi') is-invalid @enderror"
                                                                        type="radio" name="status_transaksi"
                                                                        id="inlineRadio2" value="Belum Lunas" {{ old('status_transaksi', $transaksi->status_transaksi) === 'Belum Lunas' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="inlineRadio2">Belum Lunas</label>
                                                                </div>
                                                                <!-- <input id="form_name" type="text" name="status_transaksi"
                                                                class="form-control"
                                                                value="{{ $transaksi->status_transaksi }}" readonly> -->
                                                        </div>
                                                    </div>
                                                  
                                                    <div class="col-md-6">
                                                        <div class="form-group"> <label for="form_name">Tanggal Transaksi
                                                                <span class="text-red">*</span>
                                                                :</label> <input type="date" name="tgl_transaksi"
                                                                class="form-control @error('tgl_transaksi') is-invalid @enderror"
                                                                placeholder="Masukkan Tanggal Transaksi"
                                                                value="{{ $transaksi->tgl_transaksi }}" id="tgl_transaksi">
                                                            @error('tgl_transaksi')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                    <div class="row px-3">
                                                        <label for="fotoTransaksi">Foto Transaksi :  </label>
                                                        <div class="col-sm-12 px-0 text-center">
                                                            <img src="/assets/upload/foto_transaksi/{{$transaksi->foto_transaksi}}"
                                                                class="img-thumbnail img-preview" width="300" height="300">
                                                            <label class="mt-2 d-block" for="fotoTransaksi" id="labelFotoTransaksi">
                                                                <h3>{{ $transaksi->foto_transaksi }}</h3>
                                                            </label>
                                                        </div>

                                                        <div class="col-sm-12 px-0">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="foto_transaksi"
                                                                    value="{{ $transaksi->foto_transaksi }}" id="fotoTransaksi">
                                                                <label class="custom-file-label" for="customFileLang"></label>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 px-0 d-none">
                                                            <div class="custom-file">
                                                                <input type="hidden" class="custom-file-input" name="foto_transaksi"
                                                                    value="{{ $transaksi->foto_transaksi }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @error('foto_transaksi')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>


                                                <div class="col-md-12">
                                                    <input type="submit" class="btn btn-success btn-send pt-2 btn-block "
                                                        value="Edit Data">
                                                </div>
                                            </div>
                                    </div>

                                    </form>
                                    <div class="clearBoth"></div>
                                </div>
                            </div>
                            <div>
                            </div> <!-- /.8 -->
                        </div> <!-- Tutup Row -->

                    </div> <!-- Tutup Row Isi Konten -->

                </div>
            </div>
            <!-- ini adalah tutup endsection -->
        @endsection


        @push('addon-script')
    <!-- bagian kontrakan -->
    <script>
        $("#fotoTransaksi").on("change", () => {
            const fotoTransaksi = $('#fotoTransaksi');
            const fotoTransaksiLabel = $('#labelFotoTransaksi');
            const imgPreview = $('.img-preview');

            // buat mengganti URL nya
            fotoTransaksiLabel.text(fotoTransaksi[0].files[0].name);
            // ini buat mengganti preview 
            const fileFototransaksi = new FileReader();
            fileFototransaksi.readAsDataURL(fotoTransaksi[0].files[0]);

            $(fileFototransaksi).on("load", (e) => {
                imgPreview.attr("src", e.target.result);
            });
        })
    </script>
@endpush
