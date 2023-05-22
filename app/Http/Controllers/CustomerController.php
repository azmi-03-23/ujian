<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Membership;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate(15);
        return view('customers.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $memberships = Membership::all();
        return view('customers.create',['pilihan' => 'Create', 'memberships' => $memberships]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = Customer::create($request->all);
        $message = 'Customer '.$customer->id.' berhasil dibuat!';
        return redirect()->route('customers.index')->with('status', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer, $message = NULL)
    {
        //ada opsi untuk mengedit, mendestroy 
        return view('customers.show', ['customer' => $customer])->with('status', $message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $memberships = Membership::all();
        return view('customers.edit', [
            'pilihan' => 'Edit',
            'customer' => $customer,
            'memberships' => $memberships
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        if($request->nama!=NULL){
            $customer->nama = $request->nama;
        }
        if($request->alamat!=NULL){
            $customer->alamat = $request->alamat;
        }
        if($request->tipe_member!=NULL && Gate::allows('customer-update-membership', $customer)){
            $customer->tipe_member = $request->tipe_member;
        }
        $customer->save();
        
        return redirect()->route('customers.show', [
            'customer' => $customer,
            'message' => 'Customer berhasil diupdate!'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $nama = $customer->nama;
        $customer->truncate();

        $message = 'Customer '.$nama.' berhasil dihapus!';
        return redirect()->route('customers.index')->with('status', $message);
    }
}
