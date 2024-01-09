<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jenis;
use App\Models\Layanan;

class LayananController extends Controller
{
    public function index(){
        $layanan = Layanan::all();

        return view('admin.layanan.index', compact(['layanan']));
    }

    public function add(){
        $prefix = "LYN00";
        
        $jenis = Jenis::all();
        
        // Mendapatkan nomor urut terakhir
        $lastNumber = 0;
    
        foreach ($jenis as $j) {
            $number = intval(substr($j->kode, strlen($prefix)));
            $lastNumber = max($lastNumber, $number);
        }
    
        // Menentukan nomor urut berikutnya
        $nextNumber = $lastNumber + 1;
        
        // Membuat kode dengan nomor urut baru
        $kode = $prefix . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        return view('admin.jenis.add', compact(['kode']));
    }

    public function create(Request $req){
        $jenis = new Jenis;

        $jenis->kode = $req->kode;
        $jenis->nama = $req->nama;

        $jenis->save();

        return redirect()->route('admin.jenis.index');
    }

    public function edit($id){
        $jenis = Jenis::findOrFail($id);

        return view('admin.jenis.edit', compact(['jenis']));
    }

    public function update(Request $req){
        $jenis = Jenis::findOrFail($req->kode);

        $jenis->nama = $req->nama;

        $jenis->save();

        return redirect()->route('admin.jenis.index');
    }

    public function delete($id){
        Jenis::destroy($id);

        return redirect()->route('admin.jenis.index');
    }
}
