<!-- ini adalah konten dari halaman Tambah Kontrakan -->
@extends('layout.main')

<!-- ini adalah title dari halaman Tambah Kontrakan -->
@section('title', 'Tambah Data Kontrakan')
 
<!-- ini adalah isi konten dari halaman Tambah Kontrakan -->
@section('container')
    <div class="container-fluid mt--10">
        <div class="row">
        <div class="wrapper">
         @include("sweetalert::alert")
         </div>
    
        <div class="col-lg-8 mx-auto">
                <div class="card mt-4">
                    <div class="card-body bg-white">
                        <h2 class="text-center">Tambah Kontrakan</h2>
                        <form method="POST" action="{{ route('dashboard.kontrakan.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="namaKontrakan">Nama Kontrakan</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('nama_kontrakan') is-invalid @enderror"
                                    id="namaKontrakan" value="{{ old('nama_kontrakan') }}" name="nama_kontrakan" placeholder="Masukkan nama kontrakan">
                                @error('nama_kontrakan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tipeKontrakan">Tipe Kontrakan</label>
                                <select class="form-control form-control-sm @error('tipe_kontrakan') is-invalid @enderror"
                                    id="tipeKontrakan" name="tipe_kontrakan">
                                    <option value="">Pilih Tipe Kontrakan</option>
                                    <option value="Keluarga">Keluarga</option>
                                    <option value="Cowo">Cowo</option>
                                    <option value="Cewe">Cewe</option>
                                </select>
                                @error('tipe_kontrakan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="namaKontrakan">Kapasitas Kontrakan</label>
                                <input type="number" name="kapasitas_kontrakan"
                                    class="form-control form-control-sm @error('kapasitas_kontrakan') is-invalid @enderror"
                                    placeholder="Masukkan kapasitas kontrakan" value="{{ old('kapasitas_kontrakan') }}">

                                @error('kapasitas_kontrakan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="hargaKontrakan">Harga Kontrakan
                                    (Perbulan): Termasuk air & listrik</label>
                                <input type="number" name="harga_kontrakan"
                                    class="form-control form-control-sm @error('harga_kontrakan') is-invalid @enderror"
                                    placeholder="Masukkan harga kontrakan" value="{{ old('harga_kontrakan') }}">
                                @error('harga_kontrakan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="fotoKontrakan">Foto Kontrakan</label>
                                <input type="file"
                                    class="form-control form-control-sm @error('foto_kontrakan') is-invalid @enderror"
                                    id="fotoKontrakan" lang="en" name="foto_kontrakan">
                                @error('foto_kontrakan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="statusKontrakan">Status Kontrakan :</label>
                                <select name="status_kontrakan"
                                    class="form-control form-control-sm @error('status_kontrakan') is-invalid @enderror"
                                    id="statusKontrakan">
                                    <option value="">Pilih Status Kontrakan</option>
                                    <option value="Kosong">Kosong</option>
                                    <option value="Penuh">Penuh</option>
                                    <option value="Booked">Booked</option>
                                    <option value="Terjual">Terjual</option>
                                </select>
                                @error('status_kontrakan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamatKontrakan">Alamat Kontrakan :</label>
                                <textarea name="alamat_kontrakan" id="alamatKontrakan" cols="10" rows="5"
                                    class="form-control form-control-sm @error('alamat_kontrakan') is-invalid @enderror"
                                    placeholder="Masukkan alamat">{{ old('alamat_kontrakan') }}</textarea>
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
    </div>
    </div>
@endsection
