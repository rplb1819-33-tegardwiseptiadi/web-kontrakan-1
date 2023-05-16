<!-- ini adalah konten dari halaman Tambah Kontrakan -->
@extends('layout.main')

<!-- ini adalah title dari halaman Tambah Kontrakan -->
@section('title', 'Edit Data Kontrakan')
@section('header')
    @include("includes.header", [
    "icon" => "fas fa-hotel",
    "breadcrumbs" => [
    [
    "name" => "List Kontrakan",
    "is_active" => "",
    "link" => "/dashboard/kontrakan"
    ],
    [
    "name" => "Edit Kontrakan",
    "is_active" => "active",
    "link" => ""
    ]
    ]
    ])
@endsection
<!-- ini adalah isi konten dari halaman Edit Kontrakan -->
@section('container')
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="wrapper">
            @include("sweetalert::alert")
            </div>
   
        <div class="col-lg-8 mx-auto">
                <div class="card mt-4">
                    <div class="card-body bg-white">
                        <h2 class="text-center">Edit Kontrakan 20 JANUARI</h2>
                        <form method="POST" action="{{ route('dashboard.kontrakan.update', $kontrakan->id) }}"
                            enctype="multipart/form-data">
                            @method("PUT")
                            @csrf
                            <div class="form-group">
                                <label for="namaKontrakan">Nama Kontrakan <span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control form-control-sm @error('nama_kontrakan') is-invalid @enderror"
                                    id="namaKontrakan" value="{{ old('nama_kontrakan', $kontrakan->nama_kontrakan) }}"
                                    name="nama_kontrakan" placeholder="Masukkan nama kontrakan">
                                @error('nama_kontrakan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tipeKontrakan">Tipe Kontrakan <span class="text-danger">*</span></label>
                                <select class="form-control form-control-sm @error('tipe_kontrakan') is-invalid @enderror"
                                    id="tipeKontrakan" name="tipe_kontrakan">
                                    <option disabled>Pilih Tipe Kontrakan</option>
                                    <option value="Keluarga"
                                        {{ old('tipe_kontrakan', $kontrakan->tipe_kontrakan) === 'Keluarga' ? 'selected' : '' }}>
                                        Keluarga</option>
                                    <option value="Cowo"
                                        {{ old('tipe_kontrakan', $kontrakan->tipe_kontrakan) === 'Cowo' ? 'selected' : '' }}>
                                        Cowo</option>
                                    <option value="Cewe"
                                        {{ old('tipe_kontrakan', $kontrakan->tipe_kontrakan) === 'Cewe' ? 'selected' : '' }}>
                                        Cewe</option>
                                </select>
                                @error('tipe_kontrakan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="namaKontrakan">Kapasitas Kontrakan <span class="text-danger">*</span></label>
                                <input type="number" name="kapasitas_kontrakan"
                                    class="form-control form-control-sm @error('kapasitas_kontrakan') is-invalid @enderror"
                                    placeholder="Masukkan kapasitas kontrakan"
                                    value="{{ old('kapasitas_kontrakan', $kontrakan->kapasitas_kontrakan) }}">

                                @error('kapasitas_kontrakan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="hargaKontrakan">Harga Kontrakan
                                    (Perbulan): Termasuk air & listrik <span class="text-danger">*</span></label>
                                <input type="number" name="harga_kontrakan"
                                    class="form-control form-control-sm @error('harga_kontrakan') is-invalid @enderror"
                                    placeholder="Masukkan harga kontrakan"
                                    value="{{ old('harga_kontrakan', $kontrakan->harga_kontrakan) }}">
                                @error('harga_kontrakan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row px-3">
                                    <label for="fotoKontrakan">Foto Kontrakan :  </label>
                                    <div class="col-sm-12 px-0 text-center">
                                        <img src="/assets/upload/foto_kontrakan/{{$kontrakan->foto_kontrakan}}"
                                            class="img-thumbnail img-preview" width="300" height="300">
                                        <label class="mt-2 d-block" for="fotoKontrakan" id="labelFotoKontrakan">
                                            <h3>{{ $kontrakan->foto_kontrakan }}</h3>
                                        </label>
                                    </div>

                                    <div class="col-sm-12 px-0">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="foto_kontrakan"
                                                value="{{ $kontrakan->foto_kontrakan }}" id="fotoKontrakan">
                                            <label class="custom-file-label" for="customFileLang"></label>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 px-0 d-none">
                                        <div class="custom-file">
                                            <input type="hidden" class="custom-file-input" name="foto_kontrakan"
                                                value="{{ $kontrakan->foto_kontrakan }}">
                                        </div>
                                    </div>
                                </div>

                                @error('foto_kontrakan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="statusKontrakan">Status Kontrakan <span class="text-danger">*</span>:</label>
                                <select name="status_kontrakan"
                                    class="form-control form-control-sm @error('status_kontrakan') is-invalid @enderror"
                                    id="statusKontrakan">
                                    <option disabled>Pilih Status Kontrakan</option>
                                    <option value="Kosong"
                                        {{ old('status_kontrakan', $kontrakan->status_kontrakan) === 'Kosong' ? 'selected' : '' }}>
                                        Kosong</option>
                                    <option value="Penuh"
                                        {{ old('status_kontrakan', $kontrakan->status_kontrakan) === 'Penuh' ? 'selected' : '' }}>
                                        Penuh</option>
                                    <option value="Booked"
                                        {{ old('status_kontrakan', $kontrakan->status_kontrakan) === 'Booked' ? 'selected' : '' }}>
                                        Booked</option>
                                    <option value="Terjual"
                                        {{ old('status_kontrakan', $kontrakan->status_kontrakan) === 'Terjual' ? 'selected' : '' }}>
                                        Terjual</option>
                                </select>
                                @error('status_kontrakan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamatKontrakan">Alamat Kontrakan <span class="text-danger">*</span>:</label>
                                <textarea name="alamat_kontrakan" id="alamatKontrakan" cols="10" rows="5"
                                    class="form-control form-control-sm @error('alamat_kontrakan') is-invalid @enderror"
                                    placeholder="Masukkan alamat">{{ old('alamat_kontrakan', $kontrakan->alamat_kontrakan) }}</textarea>
                                @error('alamat_kontrakan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <!-- bagian kontrakan -->
    <script>
        $("#fotoKontrakan").on("change", () => {
            const fotoKontrakan = $('#fotoKontrakan');
            const fotoKontrakanLabel = $('#labelFotoKontrakan');
            const imgPreview = $('.img-preview');

            // buat mengganti URL nya
            fotoKontrakanLabel.text(fotoKontrakan[0].files[0].name);
            // ini buat mengganti preview 
            const fileFotokontrakan = new FileReader();
            fileFotokontrakan.readAsDataURL(fotoKontrakan[0].files[0]);

            $(fileFotokontrakan).on("load", (e) => {
                imgPreview.attr("src", e.target.result);
            });
        })
    </script>
@endpush
