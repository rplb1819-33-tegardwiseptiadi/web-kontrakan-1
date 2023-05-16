<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi; 
use App\Models\Penghuni; 
use App\Models\Kontrakan; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Alert;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $dtTransactions = Transaksi::with('occupants', 'rents')->paginate(5);
        // $transactions = Transaksi::all();
        return view('dashboard.transaksi.index', compact("dtTransactions"));
    } 
    
    public function search(Request $request)
    {
        // 'like' berfungsi jika ada user yang mencari mendekati kata yang dicari maka akan langsung di tampilkan
         
        $transactions = Transaksi::where('id','nama_penghuni','like',"%".$request->search."%")->paginate(5); 
        return view('dashboard.transaksi.index', compact("transactions")); 
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dtPenghuni = Penghuni::all();
        $dtKontrakan = Kontrakan::all();
        return view('dashboard.transaksi.create', compact('dtPenghuni', 'dtKontrakan'));
    }


    public function store(Request $request)
    {  
        $messages = [
            'required' => ':attribute wajib diisi / tidak boleh kosong!',
            'min' => ':attribute harus diisi minimal :min karakter!',
            'max' => ':attribute harus diisi maksimal :max karakter!',
        ];

        $alertError = [
            Alert::error('Proses Tambah Data Gagal ', 'Data Transaksi Gagal Ditambahkan, Mohon Cek Kembali Data Yang Wajib Diisi!')
        ];
       
        $request->validate([
            'occupant_id' => 'required',
            'rent_id' => 'required',
            'tgl_transaksi' => 'required|date|',
            'nominal' => 'required|numeric|min:0', 
            'status_transaksi' => ["required", Rule::in(["Lunas", "Belum Lunas"])],
            'foto_transaksi' => 'required' 
                    ], $messages, $alertError);
        
        // Upload File
        $filename;
        if($request->hasFile("foto_transaksi")) {
            $filename = $request->file("foto_transaksi")->getClientOriginalName();
            $request->foto_transaksi->move(public_path('/assets/upload/foto_transaksi'), $filename);
        }

        Transaksi::create($request->except("foto_transaksi") + ["foto_transaksi" => $filename]); 
        Alert::success('Proses Tambah Data Berhasil', 'Berhasil Tambah Data Transaksi');     
        return redirect()->route("dashboard.transaksi.index");
       }
     
       public function show(Request $request, Transaksi $transaksi)
       {
           return view("dashboard.transaksi.show", compact("transaksi"));
       }

       
    public function edit(Request $request, Transaksi $transaksi)
    { 
        $dtPenghuni = Penghuni::all();
        $dtKontrakan = Kontrakan::all();
        return view('dashboard.transaksi.edit', compact('transaksi', 'dtPenghuni', 'dtKontrakan'));
    
    }

  
    public function update(Request $request, Transaksi $transaksi)
    {
        
        $messages = [
            'required' => ':attribute wajib diisi / tidak boleh kosong!',
            'min' => ':attribute data harus diisi minimal :min karakter!',
            'max' => ':attribute data harus diisi maksimal :max karakter!',
        ];

        $alertError = [
            Alert::error('Proses Edit Data Gagal ', 'Data Transaksi Gagal Diedit, Mohon Cek Kembali Data Yang Wajib Diisi!!')
        ];

        $request->validate([
            'nama_penghuni' => 'required',
            'nama_kontrakan' => 'required',
            'tgl_transaksi' => 'required|date|',
            'nominal' => 'required|numeric|min:0', 
            'status_transaksi' => [
                "required", 
                Rule::in(["Lunas", "Belum Lunas"])
            ],
            'foto_transaksi' => 'required' 
            ], $messages, $alertError);

          // Upload File
          if($request->hasFile("foto_transaksi")) {
            $fotoTransaksi = $request->file("foto_transaksi");
            $fotoTransaksi->move(public_path('/assets/upload/foto_transaksi'), $fotoTransaksi->getClientOriginalName());
            $transaksi->update(["foto_transaksi" => $fotoTransaksi->getClientOriginalName()]);
        }
            //jika tidak ada file foto, ya sudah update saja semua
            $transaksi->update($request->except("foto_transaksi"));
            Alert::success('Proses Edit Data Berhasil', 'Berhasil Edit Data Transaksi');     
            return redirect()->route("dashboard.transaksi.index");
        
    }
    
    // public function destroy(Transaksi $transaksi) {
    //     $transaksi->delete();
    //     Alert::success('Proses Hapus Data Berhasil', 'Berhasil Hapus Data Transaksi');
    //     return redirect()->route("dashboard.transaksi.index")->with('status', 'Data Transaksi Berhasil Di Hapus!');
    // }
}