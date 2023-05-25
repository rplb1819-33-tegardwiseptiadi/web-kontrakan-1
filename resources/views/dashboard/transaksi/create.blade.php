<!-- ini adalah konten dari halaman Tambah Transaksi -->
@extends('layout/main')

<!-- ini adalah title dari halaman Tambah Transaksi -->
@section('title', 'Tambah Data Transaksi')
@section('header')
    @include("includes.header", [
    "icon" => "fas fa-users",
    "breadcrumbs" => [
        [
            "name" => "List Transaksi",
            "is_active" => "",
            "link" => "/dashboard/Transaksi"
        ],
        [
            "name" => "Tambah Transaksi",
            "is_active" => "active",
            "link" => ""
        ]
    ]
    ])
@endsection
<!-- ini adalah isi konten dari halaman Tambah Kontrakan -->
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
                            Tambah Data Transaksi
                        </h1>
                        <form id="contact-form" role="form" method="POST"
                              action="{{ route('dashboard.transaksi.store') }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">
                                            Nama Penghuni<span class="text-red">*</span>:
                                        </label>
                                        <select id="form_need" name="occupant_id"
                                                class="form-control @error('occupant_id') is-invalid @enderror">
                                            <option value="">Pilih Nama Penghuni</option>
                                            @foreach ($dtPenghuni as $itema)
                                                <option value="{{ $itema->id}}">{{$itema->nama_penghuni}}</option>
                                            @endforeach
                                        </select>
                                        @error('occupant_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="selectNamaKontrakan">
                                            Nama Kontrakan<span class="text-red">*</span>:
                                        </label>
                                        <select id="selectNamaKontrakan" name="rent_id"
                                                class="form-control @error('rent_id') is-invalid @enderror">
                                            <option value="">Pilih Nama Kontrakan</option>
                                            @foreach ($dtKontrakan as $itemb)
                                                <option value="{{ $itemb->id}}">{{$itemb->nama_kontrakan}}</option>
                                            @endforeach
                                        </select>
                                        @error('rent_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="umur">
                                            Nominal Transaksi:
                                        </label>
                                        <input type="number" name="nominal"
                                               class="form-control @error('nominal') is-invalid @enderror"
                                               placeholder="Masukkan Nominal Transaksi" value="{{ old('nominal') }}"
                                               id="nominal" readonly>
                                        @error('nominal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="selectJmlBulan">
                                            Jumlah Bulan<span class="text-red">*</span>:
                                        </label>
                                        <select id="selectJmlBulan" name="jml_bulan"
                                                class="form-control @error('jml_bulan') is-invalid @enderror"
                                        >
                                            <option value="">Pilih Jumlah Bulan</option>
                                            @foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12] as $jmlBulan)
                                                <option value="{{ $jmlBulan }}">{{ $jmlBulan }}</option>
                                            @endforeach
                                        </select>
                                        @error('jml_bulan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="totalHarga">
                                            Total Harga:
                                        </label>
                                        <input type="number" name="total_harga"
                                               class="form-control @error('total_harga') is-invalid @enderror" value="{{ old('nominal') }}"
                                               id="totalHarga" readonly>
                                        @error('total_harga')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_need">
                                            Status Transaksi <span class="text-red">*</span>:
                                        </label>
                                        <select id="form_need" name="status_transaksi"
                                                class="form-control @error('status_transaksi') is-invalid @enderror">
                                            <option value="">Pilih Status Transaksi</option>
                                            <option value="Lunas">Lunas</option>
                                            <option value="Belum Lunas">Belum Lunas</option>
                                        </select>
                                        @error('status_transaksi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="umur">
                                            Tanggal Transaksi <span class="text-red">*</span>:
                                        </label>
                                        <input type="date" name="tgl_transaksi"
                                               class="form-control @error('tgl_transaksi') is-invalid @enderror"
                                               placeholder="Masukkan Tanggal Transaksi"
                                               value="{{ old('tgl_transaksi') }}" id="tgl_transaksi">
                                        @error('tgl_transaksi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12">
                                            Foto Transaksi <span class="text-red">*</span>:
                                        </label>
                                        <div class="col-sm-10">
                                            <img src="" class="img-thumbnail d-none" id="previewTRANSAKSIImg">
                                            <label class="custom-file d-none" for="fotoTRANSAKSI"
                                                   id="previewTRANSAKSILabel">
                                            </label>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="custom-file">
                                                <input type="file"
                                                       class="custom-file-input @error('foto_transaksi') is-invalid @enderror"
                                                       id="fotoKTP" name="foto_transaksi">
                                                <label class="custom-file-label" for="customFileLang">Select
                                                    file</label>
                                                @error('foto_transaksi')
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
@push('addon-script')
    <script>
        $("#selectNamaKontrakan").on("change", function(){
            let idKontrakan = $(this).val();
            $.ajax({
                url: "",
                data: {id_kontrakan: idKontrakan},
                dataType: "json",
                success: function(data){
                    $("#nominal").val(data);
                },
                error: function(xhr){
                    console.log(xhr.responseJSON);
                }
            });
        });

        $("#selectJmlBulan").on("change", function(){
            let jmlBulan = $(this).val();
            let nominal = $("#nominal").val();
            $("#totalHarga").val(jmlBulan * nominal);
        });
    </script>
@endpush
