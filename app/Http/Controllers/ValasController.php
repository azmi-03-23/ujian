<?php

namespace App\Http\Controllers;

use App\Models\Valas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ValasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $valas_ = Valas::where('tanggal_rate', now())
                    ->orderBy('nama')
                    ->get();
        */
        $valas_ = Valas::all();
        $tgl_rate = now();
        return view('valas.index', [
            'valas_' => $valas_,
            'tgl_rate' => $tgl_rate
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('valas.create',['pilihan' => 'Create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $valas = Valas::create($request->all);
        $message = 'Valas '.$valas->nama.' berhasil dibuat!';
        return redirect()->route('valas.index')->with('status', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function show(Valas $valas)
    {
        //ada opsi untuk mengedit, mendestroy 
        return view('valas.show', ['valas' => $valas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit(Valas $valas)
    {
        //
        return view('valas.edit', [
            'valas' => $valas,
            'pilihan' => 'Edit'
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Valas $valas)
    {
        if($request->nama!=NULL){
            $valas->nama = $request->nama;
        }
        if($request->nilai_jual!=NULL){
            $valas->nilai_jual = $request->nilai_jual;
        }
        if($request->nilai_beli!=NULL){
            $valas->nilai_beli = $request->nilai_beli;
        }
        if($request->tanggal_rate!=NULL){
            $valas->tanggal_rate = $request->tanggal_rate;
        }
        $valas->save();
        return redirect()->route('valas.show', ['valas' => $valas])->with('status', 'Valas berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Valas $valas)
    {
        $nama = $valas->nama;
        $tanggal_rate = $valas->tanggal_rate;
        $valas->truncate();

        $message = 'Valas '.$nama.' tanggal '.$tanggal_rate.' berhasil dihapus!';
        return redirect()->route('valas.index')->with('status', $message);
    }
}
