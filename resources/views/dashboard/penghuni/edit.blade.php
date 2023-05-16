<!-- ini adalah konten dari halaman Tambah Kontrakan -->
@extends('layout/main')

<!-- ini adalah title dari halaman Tambah Kontrakan -->
@section('title', 'Edit Data Penghuni')
@section('header')
@include("includes.header", [
    "icon" => "fas fa-hotel",
    "breadcrumbs" => [
    [
    "name" => "List Penghuni",
    "is_active" => "",
    "link" => "/dashboard/penghuni"
    ],
    [
    "name" => "Edit Penghuni",
    "is_active" => "active",
    "link" => ""
    ]
    ]
    ])
@endsection
<!-- ini adalah isi konten dari halaman Edit Penghuni -->
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
                                            Edit Data penghuni</h1>
                                        <br />
                                        <form id="contact-form" role="form" method="post"
                                            action="{{ route('dashboard.penghuni.update', $penghuni->id) }}"
                                            enctype="multipart/form-data">
                                            @method("PUT")
                                            @csrf
                                            <div class="controls">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group"> <label for="form_name">Nama Penghuni
                                                                <span class="text-red">*</span>
                                                                :</label> <input type="text" name="nama_penghuni"
                                                                class="form-control @error('nama_penghuni') is-invalid @enderror"
                                                                placeholder="Masukkan nama penghuni"
                                                                value="{{ $penghuni->nama_penghuni }}">
                                                            @error('nama_penghuni')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="form_need">Agama penghuni
                                                                <span class="text-red">*</span>
                                                                :</label>
                                                            <select id="form_need" name="agama_penghuni"
                                                                class="form-control @error('agama_penghuni') is-invalid @enderror">
                                                                <option value="{{ $penghuni->agama_penghuni }}">
                                                                    {{ $penghuni->agama_penghuni }}</option>
                                                                <option value="Islam">Islam</option>
                                                                <option value="Protestan">Protestan</option>
                                                                <option value="Katolik">Katolik</option>
                                                                <option value="Buddha">Buddha</option>
                                                                <option value="Khonghucu">Khonghucu</option>
                                                            </select>
                                                            @error('agama_penghuni')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group"> <label for="form_email">Umur Penghuni
                                                                <span class="text-red">*</span>
                                                                :</label> <input type="number" name="umur_penghuni"
                                                                class="form-control @error('umur_penghuni') is-invalid @enderror"
                                                                placeholder="Masukkan umur"
                                                                value="{{ $penghuni->umur_penghuni }}">
                                                            @error('umur_penghuni')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group"> <label for="form_name">Jenis Kelamin
                                                                <span class="text-red">*</span>:
                                                                <br>
                                                                <div class="form-check form-check-inline">
                                                                    <input
                                                                        class="form-check-input @error('jenis_kelamin_penghuni') is-invalid @enderror"
                                                                        type="radio" name="jenis_kelamin_penghuni"
                                                                        id="inlineRadio1" value="Laki-Laki" {{ old('jenis_kelamin', $penghuni->jenis_kelamin_penghuni) === 'Laki-Laki' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="inlineRadio1">Laki-Laki</label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <input
                                                                        class="form-check-input @error('jenis_kelamin_penghuni') is-invalid @enderror"
                                                                        type="radio" name="jenis_kelamin_penghuni"
                                                                        id="inlineRadio2" value="Perempuan" {{ old('jenis_kelamin', $penghuni->jenis_kelamin_penghuni) === 'Perempuan' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="inlineRadio2">Perempuan</label>

                                                                    @error('jenis_kelamin_penghuni')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="form_need">Status Pekerjaan Penghuni <span
                                                                    class="text-red">*</span>:</label>
                                                            <select name="status_penghuni"
                                                                class="form-control @error('status_penghuni') is-invalid @enderror">
                                                                    <option value="">Pilih Status Pekerjaan</option>
                                                                    <option value="Pegawai Swasta" 
                                                                    {{ old('status_penghuni', $penghuni->status_penghuni) === 'Pegawai Swasta' ? 'selected' : '' }}>Pegawai Swasta</option>
                                                                    <option value="Karyawan Pabrik" 
                                                                    {{ old('status_penghuni', $penghuni->status_penghuni) === 'Karyawan Pabrik' ? 'selected' : '' }}>Karyawan Pabrik</option>
                                                                    <option value="Guru" 
                                                                    {{ old('status_penghuni', $penghuni->status_penghuni) === 'Guru' ? 'selected' : '' }}>Guru</option>
                                                                    <option value="Ojek Online" 
                                                                    {{ old('status_penghuni', $penghuni->status_penghuni) === 'Ojek Online' ? 'selected' : '' }}>Ojek Online</option>
                                                                    <option value="Lain Sebagainya" 
                                                                    {{ old('status_penghuni', $penghuni->status_penghuni) === 'Lain Sebagainya' ? 'selected' : '' }}>Lain Sebagainya</option>
                                                            </select>
                                                            @error('status_penghuni')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row px-3">
                                                        <label for="fotoKtp">Foto KTP :  </label>
                                                        <div class="col-sm-12 px-0 text-center">
                                                            <img src="/assets/upload/identitas_penghuni/foto_ktp/{{$penghuni->foto_ktp}}"
                                                                class="img-thumbnail img-preview" width="300" height="300">
                                                            <label class="mt-2 d-block" for="fotoKtp" id="labelFotoKtp">
                                                                <h3>{{ $penghuni->foto_ktp }}</h3>
                                                            </label>
                                                        </div>

                                                        <div class="col-sm-12 px-0">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="foto_ktp"
                                                                    value="{{ $penghuni->foto_ktp }}" id="fotoKtp">
                                                                <label class="custom-file-label" for="customFileLang"></label>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 px-0 d-none">
                                                            <div class="custom-file">
                                                                <input type="hidden" class="custom-file-input" name="foto_ktp"
                                                                    value="{{ $penghuni->foto_ktp }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @error('foto_ktp')
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
        $("#fotoKtp").on("change", () => {
            const fotoKtp = $('#fotoKtp');
            const fotoKtpLabel = $('#labelFotoKtp');
            const imgPreview = $('.img-preview');

            // buat mengganti URL nya
            fotoKtpLabel.text(fotoKtp[0].files[0].name);
            // ini buat mengganti preview 
            const fileFotoktp = new FileReader();
            fileFotoktp.readAsDataURL(fotoKtp[0].files[0]);

            $(fileFotoktp).on("load", (e) => {
                imgPreview.attr("src", e.target.result);
            });
        })
    </script>
@endpush
