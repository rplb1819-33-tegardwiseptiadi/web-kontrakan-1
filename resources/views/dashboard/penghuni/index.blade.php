<!-- ini adalah konten dari halaman Kelola Kontrakan -->
@extends("layout.main")

<!-- ini adalah title dari halaman Kelola Kontrakan -->
@section('title', 'Kontrakan')
@section('header')
    @include("includes.header", [
    "icon" => "fas fa-users",
    "breadcrumbs" => [
    [
    "name" => "List Penghuni",
    "is_active" => "active",
    "link" => `{{ route('dashboard.penghuni.index') }}`
    ]
    ],
    "button" => ["link" => "/dashboard/penghuni/create", "name" => "Tambah Penghuni"]
    ])
@endsection
<!-- ini adalah isi konten dari halaman Kelola Kontrakan -->
@section('container')
    <div class="container-fluid mt--5">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <h3 class="mb-0">List Penghuni</h3>
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
                                                <th scope="col">Nama</th>
                                                <th scope="col">Agama</th>
                                                <th scope="col">Umur</th>
                                                <th scope="col">Jenis Kelamin</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Actions </th>
                                            </tr>
                                        </thead>
                                        @if (count($occupants) > 0)
                                            @foreach ($occupants as $occupant)
                                                <tr align="center">
                                                    <td  style="vertical-align:middle;">{{ $loop->iteration }}</td>
                                                    <td  style="vertical-align:middle;">{{ $occupant->nama_penghuni }}</td>
                                                    <td  style="vertical-align:middle;">{{ $occupant->agama_penghuni }}</td>
                                                    <td  style="vertical-align:middle;">{{ $occupant->umur_penghuni }}</td>
                                                    <td  style="vertical-align:middle;">{{ $occupant->jenis_kelamin_penghuni }} </td>
                                                    <td  style="vertical-align:middle;">{{ $occupant->status_penghuni }}</td>
                                                    <td  >
                                                        <form
                                                            action="{{ route('dashboard.penghuni.show', $occupant->id) }}">
                                                            <button class="btn btn-primary btn-sm">
                                                                <i class="fas fa-eye"></i></button>
                                                        </form>
                                                        <br>
                                                        <form
                                                        action="{{ route('dashboard.penghuni.edit', $occupant->id) }}">
                                                        <button class="btn btn-warning btn-sm mx-2">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </form>
                                                    <br>
                                                    <form
                                                    action="{{ route('dashboard.penghuni.destroy', $occupant->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin Hapus Data {{ $occupant->nama_penghuni }} ?')">
                                                    @method("delete")
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm">
                                                                <i class="fas fa-trash"></i>
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
