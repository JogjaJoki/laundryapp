<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Layanan;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $data = [
        array('kode' => 'LYN0001', 'kode_jenis' => 'JLYN0001', 'nama' => 'Laundry Kiloan MIX', 'estimasi' => 1, 'harga' => 12000),
        array('kode' => 'LYN0002', 'kode_jenis' => 'JLYN0001', 'nama' => 'Laundry Kiloan MIX', 'estimasi' => 3, 'harga' => 9000),
        array('kode' => 'LYN0003', 'kode_jenis' => 'JLYN0002', 'nama' => 'Laundry Kemeja', 'estimasi' => 1, 'harga' => 7000),
        array('kode' => 'LYN0004', 'kode_jenis' => 'JLYN0002', 'nama' => 'Laundry Sepatu', 'estimasi' => 1, 'harga' => 9000),
        array('kode' => 'LYN0005', 'kode_jenis' => 'JLYN0002', 'nama' => 'Laundry Selimut', 'estimasi' => 1, 'harga' => 12000),
    ];
    public function run()
    {
        foreach($this->data as $d){
            Layanan::create($d);
        }
    }
}
