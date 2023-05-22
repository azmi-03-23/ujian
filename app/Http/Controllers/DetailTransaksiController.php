<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //nothing here
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Transaksi $transaksi)
    {
        //pilih rate valas saat transaksi
        $valas_ = Valas::where('tanggal_rate', $transaksi->tgl_transaksi)->get();
        //antara ini atau rute detail_transaksis.create di override aja di route
         return view('detail_transaksis.create', [
            'transaksi' => $transaksi,
            'valas_' => $valas_
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //membuat Detail Transaksi
        $detTran = DetailTransaksi::create($request->all());

        //simpan informasi valas terkait (nama_valas, rate) pada tabel detail_transaksi
        $detTran->saveValasDetail();

        //mengambil instance transaksi terkait untuk proses selanjutnya
        $transaksi = $detTran->transaksi;

        //apakah masih ada detail transaksi lain?
        if($request->another=='yes'){
            return redirect()->route('detail_transaksis.create', ['transaksi' => $transaksi]);
        }

        //jika tidak maka hitung total transaksi
        return $transaksi->calculateTotalTransaksi();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function show(DetailTransaksi $detailTransaksi)
    {
        //bersamaan dengan transaksis.show
        //ada opsi untuk mengedit detail
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailTransaksi $detailTransaksi)
    {   //ambil rate valas di tanggal transaksi
        $valas_ = Valas::where('tanggal_rate', $transaksi->tgl_transaksi)->get();
        //dari view transaksis.show bersama dengan detail_transaksis.show
        return view('detail_transaksis.edit', [
            'detail_transaksi' => $detailTransaksi,
            'valas_' => $valas_
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailTransaksi $detailTransaksi)
    {
        if($request->qty!=NULL){
            $detailTransaksi->qty = $request->qty;
        }
        if($request->valas_id!=NULL){
            $detailTransaksi->valas_id = $request->valas_id;
            $detailTransaksi->save();
            //menyimpan detail customer transaksi ke tabel transaksi
            $detailTransaksi->saveValasDetail();
        }
        //retrieve model from database
        $detailTransaksi->refresh();

        $message = 'Detail transaksi berhasil diupdate!';
        return redirect()->route('transaksis.show', [
            'transaksi' => $detailTransaksi->transaksi,
            'message' => $message
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailTransaksi $detailTransaksi)
    {
        $detailTransaksi->truncate();
        $message = 'Detail transaksi berhasil dihapus!';
        return redirect()->route('transaksis.show', [
            'transaksi' => $detailTransaksi->transaksi,
            'message' => $message
        ]);
    }
}
