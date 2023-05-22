<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memberships = Membership::paginate(5);
        return view('memberships.index', ['memberships' => $memberships]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('memberships.create',['pilihan' => 'Create']);
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
        $membership = Membership::create($request->all);
        $message = 'Membership '.$membership->nama.' berhasil dibuat!';
        return redirect()->route('memberships.index')->with('status', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function show(Membership $membership)
    {
        //ada opsi untuk mengedit, mendestroy 
        return view('memberships.show', ['membership' => $membership]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit(Membership $membership)
    {
        //
        return view('memberships.edit', [
            'membership' => $membership,
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
    public function update(Request $request, Membership $membership)
    {
        if($request->nama!=NULL){
            $membership->nama = $request->nama;
        }
        if($request->diskon!=NULL){
            $membership->diskon = $request->diskon;
        }
        if($request->minimum_profit!=NULL){
            $membership->minimum_profit = $request->minimum_profit;
        }
        $membership->save();
        return redirect()->route('memberships.show', ['membership' => $membership])->with('status', 'Membership berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membership $membership)
    {
        $nama = $membership->nama;
        $membership->truncate();

        $message = 'Membership '.$nama.' berhasil dihapus!';
        return redirect()->route('memberships.index')->with('status', $message);
    }
}
