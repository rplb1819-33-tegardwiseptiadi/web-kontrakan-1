<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontrakan; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Alert;

class KontrakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $rents = Kontrakan::all();
        return view('dashboard.kontrakan.index', compact("rents"));
    } 
    
    public function search(Request $request)
    {
        // 'like' berfungsi jika ada user yang mencari mendekati kata yang dicari maka akan langsung di tampilkan
         
        $rents = Kontrakan::where('nama_kontrakan','like',"%".$request->search."%")->paginate(5); 
        return view('dashboard.kontrakan.index', compact("rents")); 
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kontrakan.create');
    }


    public function store(Request $request)
    {  
        $messages = [
            'required' => ':attribute wajib diisi / tidak boleh kosong!',
            'min' => ':attribute harus diisi minimal :min karakter!',
            'max' => ':attribute harus diisi maksimal :max karakter!',
        ];

        $alertError = [
            Alert::error('Proses Tambah Data Gagal ', 'Data Kontrakan Gagal Ditambahkan, Mohon Cek Kembali Data Yang Wajib Diisi!')
        ];

        $request->validate([
            'nama_kontrakan' => 'required|min:5|max:30',
            'tipe_kontrakan' => ["required", Rule::in(["Keluarga", "Cowo", "Cewe"])], 
            'kapasitas_kontrakan' => 'required|min:1', 
            'harga_kontrakan' => 'required|numeric|min:0', 
            'foto_kontrakan' => 'required', 
            'status_kontrakan' => ["required", Rule::in(["Kosong", "Penuh", "Booked", "Terjual"])],
            'alamat_kontrakan' => 'required'
        ], $messages, $alertError);
        
        // Upload File
        $filename;
        if($request->hasFile("foto_kontrakan")) {
            $filename = $request->file("foto_kontrakan")->getClientOriginalName();
            $request->foto_kontrakan->move(public_path('/assets/upload/foto_kontrakan'), $filename);
        }

        Kontrakan::create($request->except("foto_kontrakan") + ["foto_kontrakan" => $filename]); 
        Alert::success('Proses Tambah Data Berhasil', 'Berhasil Tambah Data Kontrakan');     
        return redirect()->route("dashboard.kontrakan.index");
       }
     
    public function show(Kontrakan $kontrakan)
    { 
        return view('dashboard.kontrakan.show', compact('kontrakan'));
    }
    
    public function edit(Kontrakan $kontrakan)
    { 
        return view('dashboard.kontrakan.edit', compact('kontrakan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    public function update(Request $request, Kontrakan $kontrakan)
    {
        $messages = [
            'required' => ':attribute wajib diisi / tidak boleh kosong!',
            'min' => ':attribute data harus diisi minimal :min karakter!',
            'max' => ':attribute data harus diisi maksimal :max karakter!',
        ];

        $alertError = [
            Alert::error('Proses Edit Data Gagal ', 'Data Kontrakan Gagal Diedit, Mohon Cek Kembali Data Yang Wajib Diisi!!')
        ];

        $request->validate([
            'nama_kontrakan' => 'required|min:5',
            'tipe_kontrakan' => 'required|min:1', 
            'kapasitas_kontrakan' => 'required', 
            'harga_kontrakan' => 'required', 
            'foto_kontrakan' => 'required', 
            'status_kontrakan' => 'required',
            'alamat_kontrakan' => 'required|max:200'
        ], $messages, $alertError);


        
        //cek apakah ada file foto kontrakan, kalau ada maka upload dan update fotonya di db
        if ($request->hasFile("foto_kontrakan")) {
            $file = $request->file("foto_kontrakan");
            $file->move(public_path('/assets/upload/foto_kontrakan'), $file->getClientOriginalName()); 
            $kontrakan->update(["foto_kontrakan" => $file->getClientOriginalName()]);
        }

        //jika tidak ada file foto, ya sudah update saja semua
        $kontrakan->update($request->except("foto_kontrakan"));

        // lebih bagus pakai redirect()->route("nama route"), alasannya supaya kalau ada perubahan url route di file web.php
        // kita ga perlu capek-capek ngubah di semua file, tinggal panggil nama routenya aja
        Alert::success('Proses Edit Data Berhasil', 'Berhasil Edit Data Kontrakan');
        return redirect()->route("dashboard.kontrakan.index")->with('status', 'Edit Data Kontrakan Berhasil');
    }
    
    public function destroy(Kontrakan $kontrakan) {
        $kontrakan->delete();
        Alert::success('Proses Hapus Data Berhasil', 'Berhasil Hapus Data Kontrakan');
        return redirect()->route("dashboard.kontrakan.index")->with('status', 'Data Kontrakan Berhasil Di Hapus!');
    }
}