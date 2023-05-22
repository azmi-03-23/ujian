<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /*
    menu
    buat transaksi -> create, store -> [DetailTransaksiController] create, @if(another){DTC-create[loop]}
    -> [TC] getTotalTransaksi, index with status (sukses)
    lihat semua transaksi -> index
        1 -> pilih salah satu transaksi -> show
            1 -> edit -> edit, view(edit), update
            2 -> destroy, index with status (sukses)
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($message = NULL)
    {
        $transaksis = Transaksi::paginate(15);
        //ada pilihan melihat transaksi tertentu
        return view('transaksis.index', ['transaksis' => $transaksis])->with('status', $message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        return view('transaksis.create', ['pilihan' => 'Create','customers' => $customers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaksi = Transaksi::create([
            'tgl_transaksi' => date('Y-m-d'),
            'customer_id' => $request->id
        ]);
        //menyimpan detail customer transaksi ke tabel transaksi
        $transaksi->saveCustomerDetail();

        //retrieving $transaksi dari Database
        $transaksi->refresh();

        //buat detail transaksi
        return redirect()->route('detail_transaksis.create', ['transaksi' => $transaksi]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi, $message = NULL)
    {
        //ada opsi untuk mengedit atau menghapus transaksi
        return view('transaksis.show', ['transaksi' => $transaksi])->with('status', $message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        $customers = Customer::all();
        return view('transaksis.edit', [
            'pilihan' => 'Edit',
            'transaksi' => $transaksi,
            'customers' => $customers
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        if($request->customer_id!=NULL){
            $transaksi->customer_id = $request->customer_id;
            $transaksi->save();
            //menyimpan detail customer transaksi ke tabel transaksi
            $transaksi->saveCustomerDetail();
        }
        $transaksi->refresh();

        $message = 'Transaksi '.$transaksi->id.' berhasil diupdate!';
        return redirect()->route('transaksis.show', [
            'transaksi' => $transaksi,
            'message' => $message
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->truncate();
        return redirect()->route('transaksis.index', [
            'status' => 'Transaksi berhasil dihapus!'
        ]);
    }
}
