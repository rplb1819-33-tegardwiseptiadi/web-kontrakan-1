<!-- ini adalah konten dari halaman Index Laporan Transaksi -->
@extends("layout.main")

<!-- ini adalah title dari halaman Index Laporan Transaksi -->
@section('title', 'LOG ACTIVITY')
@section('header')
    @include("includes.header", [
    "icon" => "fas fa-users",
    "breadcrumbs" => [
    [
    "name" => "List Log Activity",
    "is_active" => "active",
    "link" => `{{ route('dashboard.log.index') }}`
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
                        <h3 class="mb-0">List Log Activity</h3>
                             
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-wrapper">
                                 <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered mydatatable w-100">
                                        <thead>
                                            <tr align="center">
                                                <th scope="col">No.</th>
                                                <th scope="col">User</th> 
                                                <th scope="col">Keterangan</th> 
                                                <th scope="col">Waktu Di Buat</th> 
                                                <th scope="col">Waktu Di Ubah</th> 
                                                <th scope="col">Waktu Di Hapus</th> 
                                                <th scope="col">Actions</th> 
                                            </tr>
                                        </thead>
                                        @if (count($log) > 0)
                                            @foreach ($log as $item)
                                                <tr align="center">
                                                    <td  style="vertical-align:middle;">{{ $loop->iteration }}</td>
                                                    <td  style="vertical-align:middle;">{{ Auth::user()->name }}</td>
                                                    <td  style="vertical-align:middle;">{{ $item->keterangan }}</td>
                                                    <!-- waktu ditambah -->
                                                    <td  style="vertical-align:middle;">
                                                        @if($item->keterangan == 'TAMBAH DATA TRANSAKSI')
                                                            <div class="btn btn-primary"> {{ $item->created_at }}
                                                        @endif
                                                        @if($item->keterangan == 'TAMBAH DATA KONTRAKAN')
                                                            <div class="btn btn-primary"> {{ $item->created_at }}
                                                        @endif
                                                        @if($item->keterangan == 'TAMBAH DATA PENGHUNI')
                                                            <div class="btn btn-primary"> {{ $item->created_at }}
                                                        @endif
                                                         
                                                        @if($item->keterangan == 'EDIT DATA TRANSAKSI')
                                                            <div class="btn btn-success"> {{ $item->created_at }}
                                                        @endif
                                                        @if($item->keterangan == 'EDIT DATA KONTRAKAN')
                                                            <div class="btn btn-success"> {{ $item->created_at }}
                                                        @endif
                                                        @if($item->keterangan == 'EDIT DATA PENGHUNI')
                                                            <div class="btn btn-success"> {{ $item->created_at }}
                                                        @endif

                                                        @if($item->keterangan == 'HAPUS DATA TRANSAKSI')
                                                            <div class="btn btn-danger"> WAKTU HAPUS TIDAK DIKETAHUI
                                                        @endif
                                                        @if($item->keterangan == 'HAPUS DATA KONTRAKAN')
                                                            <div class="btn btn-danger"> WAKTU HAPUS TIDAK DIKETAHUI
                                                        @endif
                                                        @if($item->keterangan == 'HAPUS DATA PENGHUNI')
                                                            <div class="btn btn-danger"> WAKTU HAPUS TIDAK DIKETAHUI
                                                        @endif
                                                         



                                                        <!-- bagian waktu diubah -->
                                                        <td  style="vertical-align:middle;">
                                                        @if($item->keterangan == 'TAMBAH DATA TRANSAKSI')
                                                            <div class="btn btn-danger"> WAKTU UBAH TIDAK DIKETAHUI
                                                        @endif
                                                        @if($item->keterangan == 'TAMBAH DATA KONTRAKAN')
                                                            <div class="btn btn-danger"> WAKTU UBAH TIDAK DIKETAHUI
                                                        @endif
                                                        @if($item->keterangan == 'TAMBAH DATA PENGHUNI')
                                                            <div class="btn btn-danger"> WAKTU UBAH TIDAK DIKETAHUI
                                                        @endif
                                                      
                                                        @if($item->keterangan == 'HAPUS DATA TRANSAKSI')
                                                            <div class="btn btn-danger"> WAKTU HAPUS DATA TIDAK DIKETAHUI
                                                        @endif
                                                        @if($item->keterangan == 'HAPUS DATA KONTRAKAN')
                                                            <div class="btn btn-danger"> WAKTU HAPUS DATA TIDAK DIKETAHUI
                                                        @endif
                                                        @if($item->keterangan == 'HAPUS DATA PENGHUNI')
                                                            <div class="btn btn-danger"> WAKTU HAPUS DATA TIDAK DIKETAHUI
                                                        @endif


                                                            @if($item->keterangan == 'EDIT DATA KONTRAKAN')
                                                                <div class="btn btn-primary"> {{ $item->updated_at }}
                                                            @endif
                                                            @if($item->keterangan == 'EDIT DATA PENGHUNI')
                                                                <div class="btn btn-primary"> {{ $item->updated_at }}
                                                            @endif
                                                            @if($item->keterangan == 'EDIT DATA TRANSAKSI')
                                                                <div class="btn btn-primary"> {{ $item->updated_at }}
                                                            @endif
                                                        </td>
                                                             
                                                        <!-- bagian waktu dihapus -->
                                                        <td  style="vertical-align:middle;">
                                                        @if($item->keterangan == 'TAMBAH DATA TRANSAKSI')
                                                            <div class="btn btn-danger"> WAKTU HAPUS TIDAK DIKETAHUI
                                                        @endif
                                                        @if($item->keterangan == 'TAMBAH DATA KONTRAKAN')
                                                            <div class="btn btn-danger"> WAKTU HAPUS TIDAK DIKETAHUI
                                                        @endif
                                                        @if($item->keterangan == 'TAMBAH DATA PENGHUNI')
                                                            <div class="btn btn-danger"> WAKTU HAPUS TIDAK DIKETAHUI
                                                        @endif


                                                            @if($item->keterangan == 'EDIT DATA KONTRAKAN')
                                                                <div class="btn btn-danger"> WAKTU HAPUS TIDAK DIKETAHUI
                                                            @endif
                                                            @if($item->keterangan == 'EDIT DATA PENGHUNI')
                                                                <div class="btn btn-danger"> WAKTU HAPUS TIDAK DIKETAHUI
                                                            @endif
                                                            @if($item->keterangan == 'EDIT DATA TRANSAKSI')
                                                                <div class="btn btn-danger"> WAKTU HAPUS TIDAK DIKETAHUI
                                                            @endif
                                                        </td>
                                                             
                                                    
                                                     

                                                         <!-- bagian waktu dihapus -->
                                                           
                                                        <td  style="vertical-align:middle;">
                                                            <form action="{{ route('dashboard.log.show', $item->id) }}">  
                                                                 <button class="btn btn-primary btn-sm mx-2"  title="DETAIL {{$item->keterangan}}" data-toggle="tooltip">
                                                                    <i class="fas fa-eye"  >

                                                                    </i>
                                                                </button>
                                                            </form>
                                                            
                                                        </td> 
                                                        <br>
                                                        <!-- @if($item->keterangan == 'TAMBAH DATA KONTRAKAN')
                                                            <div class="btn btn-danger"> WAKTU HAPUS TIDAK DIKETAHUI
                                                        @endif
                                                        @if($item->keterangan == 'TAMBAH DATA PENGHUNI')
                                                            <div class="btn btn-danger"> WAKTU HAPUS TIDAK DIKETAHUI
                                                        @endif -->


                                                        
                                                     
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
