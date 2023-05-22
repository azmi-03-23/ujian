<?php

namespace App\Models;

use App\Models\Transaksi;
use App\Models\Valas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaksi_id'
        'valas_id',
        'qty'
    ];

    public function transaksi(){
        return $this->belongsTo(Transaksi::class);
    }

    public function valas(){
        return $this->belongsTo(Valas::class);
    }

    public function saveValasDetail(DetailTransaksi $detTran){
        //update tabel untuk mengisi kolom nama_valas dan rate
        DB::table('detail_transaksi')->upsert([
            'id' => $detTran->id,
            'nama_valas' => $detTran->valas->nama,
            'rate' => $detTran->valas->nilai_jual,
        ],
        ['id'],
        [
            'nama_valas',
            'rate'
        ]);
    }
}
