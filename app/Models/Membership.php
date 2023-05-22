<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'diskon',
        'minimum_profit'
    ];

    public function customers(){
        return $this->hasMany(Customer::class, 'tipe_member', 'nama');
    }
}
