<!-- ini adalah konten dari halaman Tambah Penghuni -->
@extends('layout/main')

<!-- ini adalah title dari halaman Tambah Penghuni -->
@section('title', 'Tambah Data Penghuni')
@section('header')
    @include("includes.header", [
    "icon" => "fas fa-users",
    "breadcrumbs" => [
    [
    "name" => "List Penghuni",
    "is_active" => "",
    "link" => "/dashboard/penghuni"
    ],
    [
    "name" => "Tambah Penghuni",
    "is_active" => "active",
    "link" => ""
    ]
    ]
    ])
@endsection
<!-- ini adalah isi konten dari halaman Tambah Penghuni -->
@section('container')
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="wrapper">
                @include('sweetalert::alert')
            </div>

            <div class="col-lg-7 mx-auto">
                <div class="card mx-auto">
                    <div class="card-body bg-white">
                        <h1 class="text-center mb-4">
                            <i class="fas fa-users d-block"></i>
                            Tambah Data penghuni
                        </h1>
                        <form id="contact-form" role="form" method="POST" action="{{ route('dashboard.penghuni.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">
                                            Nama<span class="text-red">*</span>:
                                        </label>
                                        <input type="text" name="nama_penghuni"
                                            class="form-control @error('nama_penghuni') is-invalid @enderror"
                                            placeholder="Masukkan nama penghuni" value="{{ old('nama_penghuni') }}" id="name">
                                        @error('nama_penghuni')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_need">
                                            Agama <span class="text-red">*</span>:
                                        </label>
                                        <select id="form_need" name="agama_penghuni"
                                            class="form-control @error('agama_penghuni') is-invalid @enderror">
                                            <option value="">Pilih Agama Penghuni</option>
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
                                    <div class="form-group">
                                        <label for="umur">
                                            Umur <span class="text-red">*</span>:
                                        </label>
                                        <input type="number" name="umur_penghuni"
                                            class="form-control @error('umur_penghuni') is-invalid @enderror"
                                            placeholder="Masukkan umur" value="{{ old('umur_penghuni') }}" id="umur">
                                        @error('umur_penghuni')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="man">
                                            Jenis Kelamin <span class="text-red">*</span>:
                                        </label>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input @error('jenis_kelamin_penghuni') is-invalid @enderror"
                                                type="radio" name="jenis_kelamin_penghuni" id="man" value="Laki-Laki">
                                            <label class="form-check-label" for="man">Laki-laki</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input @error('jenis_kelamin_penghuni') is-invalid @enderror"
                                                type="radio" name="jenis_kelamin_penghuni" id="woman" value="Perempuan">
                                            <label class="form-check-label" for="woman">Perempuan</label>

                                            @error('jenis_kelamin_penghuni')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status_penghuni">
                                            Status Pekerjaan Penghuni <span class="text-red">*</span>:
                                        </label>
                                        <select name="status_penghuni"
                                            class="form-control @error('status_penghuni') is-invalid @enderror" id="status_penghuni">
                                            <option value="">Pilih Status Pekerjaan</option>
                                            <option value="Pegawai Swasta">Pegawai Swasta</option>
                                            <option value="Karyawan Pabrik">Karyawan Pabrik</option>
                                            <option value="Guru">Guru</option>
                                            <option value="Ojek Online">Ojek Online</option>
                                            <option value="Lain Sebagainya">Lain Sebagainya</option>
                                        </select>
                                        @error('status_penghuni')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12">
                                            Foto KTP <span class="text-red">*</span>:
                                        </label>
                                        <div class="col-sm-10">
                                            <img src="" class="img-thumbnail d-none" id="previewKTPImg">
                                            <label class="custom-file d-none" for="fotoKTP" id="previewKTPLabel">
                                            </label>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input @error('foto_ktp') is-invalid @enderror"
                                                    id="fotoKTP" name="foto_ktp">
                                                <label class="custom-file-label" for="customFileLang">Select file</label>
                                                @error('foto_ktp')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success pt-2 btn-block" value="Tambah Data">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
