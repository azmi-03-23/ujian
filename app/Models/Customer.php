<?php

namespace App\Models;

use App\Models\Transaksi;
use App\Models\Membership;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat'
    ];

    protected $attributes = [
        'tipe_member' => NULL,
    ];

    protected $guarded = ['tipe_member'];

    public function transaksis(){
        return $this->hasMany(Transaksi::class);
    }

    public function membership(){
        return $this->belongsTo(Membership::class, 'tipe_member', 'nama');
    }
}
