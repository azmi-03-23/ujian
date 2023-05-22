<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\DetailTransaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_transaksi',
        'customer_id'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function detailTransaksis(){
        return $this->hasMany(DetailTransaksi::class);
    }

    public function calculateTotalTransaksi(Transaksi $transaksi)
    {
        $total = 0;

        //menghitung total rupiah yang harus dibayarkan
        $detTran = $transaksi->detailTransaksis;
        foreach($detTran as $item){
            $total+=($item->rate * $item->qty);
        }
        $transaksi->total = $total;
        $transaksi->save();

        //menampilkan transaksi + detail transaksi
        $message = 'Transaksi '. $transaksi->id.' berhasil dibuat!';
        return redirect('transaksis.show', [
            'transaksi' => $transaksi,
            'message' => $message
        ]);
    }

    public function saveCustomerDetail(Transaksi $transaksi)
    {
        DB::table('transaksis')->upsert([
            'id' => $transaksi->id,
            'nama_customer' => $transaksi->customer->nama,
            'diskon' => $transaksi->customer->membership->diskon,
        ],
        ['id'],
        [
            'nama_customer',
            'diskon'
        ]);
    }
}
