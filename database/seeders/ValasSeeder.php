<?php

namespace Database\Seeders;

use App\Models\Valas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Valas::factory(20)->create();
        $valas = Valas::all();
        foreach($valas as $v){
            if($v->id==11){
                break;
            }
            $id = $v->id + 10;
            $change = Valas::find($id);
            $change->nama = $v->nama;
            $change->nilai_jual = $v->nilai_jual;
            $change->nilai_beli = $v->nilai_beli;
            $change->save();
        }
    }
}
