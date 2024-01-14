<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jenis;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $data = [
        array('kode' => 'JLYN0001', 'nama' => 'Kiloan'),
        array('kode' => 'JLYN0002', 'nama' => 'Satuan'),
    ];
    public function run()
    {
        foreach($this->data as $d){
            Jenis::create($d);
        }
    }
}
