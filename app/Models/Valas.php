<?php

namespace App\Models;

use App\Models\DetailTransaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nilai_jual',
        'nilai_beli',
        'tanggal_rate'
    ];

    public function detailTransaksi(){
        return $this->hasMany(DetailTransaksi::class);
    }
}
