<!-- ini adalah konten dari halaman Kelola Transaksi -->
@extends("layout.main")

<!-- ini adalah title dari halaman Kelola Transaksi -->
@section('title', 'Transaksi Pembayaran')
@section('header')
    @include("includes.header", [
    "icon" => "fas fa-users",
    "breadcrumbs" => [
    [
    "name" => "List Transaksi",
    "is_active" => "active",
    "link" => `{{ route('dashboard.transaksi.index') }}`
    ]
    ],
    "button" => ["link" => "/dashboard/transaksi/create", "name" => "Tambah Transaksi"]
    ])
@endsection
<!-- ini adalah isi konten dari halaman Kelola Transaksi -->
@section('container')
    <div class="container-fluid mt--5">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <h3 class="mb-0">List Transaksi</h3>
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
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered mydatatable w-100">
                                        <thead>
                                            <tr align="center">
                                                <th scope="col">No.</th>
                                                <th scope="col">ID Transaksi</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Tanggal Transaksi</th>
                                                <th scope="col">Nominal</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Actions </th>
                                            </tr>
                                        </thead>
                                        @if (count($dtTransactions) > 0)
                                            @foreach ($dtTransactions as $transaction)
                                                <tr align="center">
                                                    <td  style="vertical-align:middle;">{{ $loop->iteration }}</td>
                                                    <td  style="vertical-align:middle;">{{ $transaction->id }}</td>
                                                    <td  style="vertical-align:middle;">{{ $transaction->occupants->nama_penghuni }}</td>
                                                    <td  style="vertical-align:middle;">{{ $transaction->tgl_transaksi }}</td>
                                                    <td  style="vertical-align:middle;">{{ $transaction->nominal }} </td>
                                                    <td  style="vertical-align:middle;">
                                                        @if($transaction->status_transaksi == 'Lunas')
                                                        <div class="btn btn-primary"> {{ $transaction->status_transaksi }}
                                                            @endif
                                                    
                                                            @if($transaction->status_transaksi == 'Belum Lunas')
                                                        <div class="btn btn-danger"> {{ $transaction->status_transaksi }}
                                                            @endif
                                                
                                                    </td>
                                                    <td>
                                                            <form
                                                                action="{{ route('dashboard.transaksi.show', $transaction->id) }}">
                                                                <button class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-eye"></i>
                                                                </button>
                                                            </form>
                                                        <br>
                                                            <form
                                                            action="{{ route('dashboard.transaksi.edit', $transaction->id) }}">
                                                                <button class="btn btn-warning btn-sm mx-2">
                                                                    <i class="fas fa-edit"></i>
                                                                </button>
                                                            </form> 
                                                    </td>
                                                </tr>
                                                
                                                @endforeach
                                        @else
                                        <tr align="center">
                                            <td colspan="7">Data kosong</td>
                                        </tr>
                                        @endif
                                        </tbody>
                                    </table>
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
