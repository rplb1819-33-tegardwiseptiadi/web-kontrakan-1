<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penghuni;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule; 
use Alert;

class PenghuniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $occupants = Penghuni::all();
        return view('dashboard.penghuni.index', compact("occupants"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.penghuni.create');
    }

    public function store(Request $request)
    {
        $messages = [
            "required" => ":attribute wajib diisi!",
            "min" => ":attribute harus diisi minimal :min karakter!",
            "max" => ":attribute harus diisi maksimal :max karakter!",
        ];

        $alertError = [
            Alert::error('Proses Tambah Data Gagal', 'Data Penghuni Gagal Ditambahkan, Mohon Cek Kembali Data Yang Wajib Diisi !!!')
        ];

        $validasi = $request->validate([
            "nama_penghuni" => "required|min:5|max:100",
            "agama_penghuni" => [
                "required",
                Rule::in(["Islam", "Protestan", "Katolik", "Buddha", "Khonghucu"])
            ],
            "umur_penghuni" => "required|numeric",
            "jenis_kelamin_penghuni" => [
                "required",
                Rule::in(["Laki-Laki", "Perempuan"])
            ],
            "status_penghuni" => [
                "required",
                Rule::in(["Pegawai Swasta", "Karyawan Pabrik", "Guru", "Ojek Online", "Lain Sebagainya"])
            ],
            "foto_ktp" => "required"
        ], $messages, $alertError);

        
        // Upload File
        if ($request->hasFile("foto_ktp")) {
            $fotoKtp = $request->file("foto_ktp")->getClientOriginalName();
            $request->foto_ktp->move(public_path('/assets/upload/identitas_penghuni/foto_ktp'), $fotoKtp);
            Penghuni::create($request->except("foto_ktp") + ["foto_ktp" => $fotoKtp]);
            // $fotoKtp->images()->create(["image_name" => $fotoKtp, "type" => "ktp"]);
        }
        
            Alert::success('Proses Tambah Data Berhasil', 'JANJI HARUS KE GLORY YA DECK :)');
            return redirect()->route("dashboard.penghuni.index")->with('status', 'Tambah Data Penghuni Berhasil');
        }
        
        
        
        
        public function edit(Request $request, Penghuni $penghuni)
    {
        return view("dashboard.penghuni.edit", compact("penghuni"));
    }

    public function update(Request $request, Penghuni $penghuni)
    {
        $messages = [
            "required" => ":attribute wajib diisi!",
            "min" => ":attribute harus diisi minimal :min karakter!",
            "max" => ":attribute harus diisi maksimal :max karakter!",
        ];

        $alertError = [
            Alert::error('Proses Edit Data Gagal', 'Data Penghuni Gagal Diedit, Mohon Cek Kembali Data Yang Wajib Diisi !!!')
        ];
        $request->validate([
            "nama_penghuni" => "required|min:5|max:100",
            "agama_penghuni" => [
                "required",
                Rule::in(["Islam", "Protestan", "Katolik", "Buddha", "Khonghucu"])
            ],
            "umur_penghuni" => "required|numeric",
            "jenis_kelamin_penghuni" => [
                "required",
                Rule::in(["Laki-Laki", "Perempuan"])
            ],
            "status_penghuni" => [
                "required",
                Rule::in(["Pegawai Swasta", "Karyawan Pabrik", "Guru", "Ojek Online", "Lain Sebagainya"])
            ],
            "foto_ktp" => "required"
        ], $messages, $alertError);

            // Upload File
                if($request->hasFile("foto_ktp")) {
                    $fotoKtp = $request->file("foto_ktp");
                    $fotoKtp->move(public_path('/assets/upload/identitas_penghuni/foto_ktp'), $fotoKtp->getClientOriginalName());
                    $penghuni->update(["foto_ktp" => $fotoKtp->getClientOriginalName()]);
                }
                    //jika tidak ada file foto, ya sudah update saja semua
                    $penghuni->update($request->except("foto_ktp"));
                    Alert::success('Proses Edit Data Berhasil', 'Berhasil Edit Data Penghuni');     
                    return redirect()->route("dashboard.penghuni.index");
                }
    


    public function show(Request $request, Penghuni $penghuni)
    {
        return view("dashboard.penghuni.show", compact("penghuni"));
    }

    public function destroy(Penghuni $penghuni)
    {
        $penghuni->delete();
        Alert::success('Proses Hapus Data Berhasil', 'Data Penghuni Berhasil DiHapus');
        return redirect()->route('dashboard.penghuni.index')->with('status', 'Data Penghuni Berhasil Di Hapus!');
    }
}
