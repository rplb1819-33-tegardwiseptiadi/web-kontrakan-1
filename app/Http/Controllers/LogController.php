<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog; 
use App\Models\Transaksi; 
use App\Models\Penghuni; 
use App\Models\Kontrakan;  
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Alert;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $log = ActivityLog::with('transactions','occupants', 'rents')->paginate(10);
        // $transactions = Transaksi::all();
        return view('dashboard.log.index', compact("log"));
    } 
 

    public function show(ActivityLog $activitylog)
    {
            // dd($activitylog)
        return view("dashboard.log.show", compact("activitylog"));
    }
 
     
}
