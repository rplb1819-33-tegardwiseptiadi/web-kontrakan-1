<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table.static {
            position: relative;
            border:1px solid #543535;
        }
    </style>
    <title>CETAK DATA LAPORAN TRANSAKSI </title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>LAPORAN DATA TRANSAKSI</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width:95%;">
           test 
        </table>
    </div>
</body>
</html> -->
<!-- ini adalah konten dari halaman Index Laporan Transaksi -->
@extends("layout.main")

<!-- ini adalah title dari halaman Index Laporan Transaksi -->
@section('title', 'Print Laporan Transaksi Pembayaran')
@section('header')
    @include("includes.header", [
    "icon" => "fas fa-users",
    "breadcrumbs" => [
    [
    "name" => "Print Laporan Transaksi",
    "is_active" => "active",
    "link" => `{{ route('dashboard.print') }}`
    ]
    ]])
@endsection
<!-- ini adalah isi konten dari halaman Kelola Transaksi -->
@section('container')
    <div class="container-fluid mt--5">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <h3 class="mb-0" style="text-align:center">PRINT LAPORAN TRANSAKSI</h3>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-wrapper">
                                <div class="wrapper">
                                    @include("sweetalert::alert")
                                </div>

                                {{-- <div class=" row">
                                    <div class="col-sm-5">
                                        @if (session('status'))
                                            <div class="alert alert-success" style="text-align: center; font-size:20px;">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                    </div>
                                </div> --}}
                                            <!-- isi -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="label">Tanggal Awal  <span class="text-red">*</span>: </label>
                                                    <input type="date" name="tglawal" id="tglawal"
                                                        class="form-control @error('tglawal') is-invalid @enderror">
                                                    @error('tglawal')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror

                                                   
                                                </div>
                                            </div>
                                            <!-- isi -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="label"> Tanggal Akhir  <span class="text-red">*</span>: </label>
                                                    <input type="date" name="tglakhir" id="tglakhir"
                                                        class="form-control @error('tglakhir') is-invalid @enderror">
                                                    @error('tglakhir')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                              <a href="" onclick="this.href='/dashboard/halamanPrint/'+ document.getElementById('tglawal').value +'/'+ document.getElementById('tglakhir').value" target="_blank" class="btn btn-danger col-md-12" style="font-size:20px">Cetak Laporan
                                                  <i class="fas fa-print"></i>
                                                </a>  
                                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include("includes.footer")
    </div>
@endsection
