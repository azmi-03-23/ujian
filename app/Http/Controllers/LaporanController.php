<?php

namespace App\Http\Controllers;

use App\Models\Valas;
use App\Models\DetailTransaksi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function valas($nama_valas){
        $valas = Valas::where('nama_valas', $nama_valas)->get();
        return view('laporan.valas', ['valas' => $valas]);
    }

    public function valas(){
        $valas_ = Valas::all();
        json_encode($valas_);
        return view('laporan.valas', ['valas_' => $valas_]);
    }

    public function profit_bulanan(){
        /*
        profit sama dengan seluruh detail transaksi di bulan itu (join valas)
        */
        $total_qty = array();
        $profit = array();
        $valas_ = Valas::all();
        foreach($valas_ as $valas){
            $detTrans = DetailTransaksi::where('valas_id', $valas->id)->get();
            $total_qty[$valas->id] = $detTrans->sum('qty');
            $profit[$valas->id] = $total_qty[$valas->id] * ($valas->nilai_jual - $valas->nilai_beli);
        }
        return view('laporan.profit_bulanan', [
            'valas_' => $valas_,
            'profit' => $profit
        ]);
    }
}
