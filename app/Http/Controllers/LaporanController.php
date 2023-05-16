<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi; 
use App\Models\Penghuni; 
use App\Models\Kontrakan;  
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Alert;

class LaporanController extends Controller
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
        return view('dashboard.laporan.index', compact("dtTransactions"));
    } 
    
    public function cetak()
    {  
        // $transactions = Transaksi::all();
        return view('dashboard.laporan.print');
    } 
    
    public function cetakLaporanPertanggal($tglawal, $tglakhir)
    {
        
        $tglawal;
        $tglakhir;
        
        $cetakPertanggal = Transaksi::with('occupants', 'rents')->whereBetween('tgl_transaksi',[$tglawal, $tglakhir])->get();
        // dd("Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir);

        return view('dashboard.laporan.halamanPrint', compact("cetakPertanggal","tglawal","tglakhir"));
    }
     
     
}
