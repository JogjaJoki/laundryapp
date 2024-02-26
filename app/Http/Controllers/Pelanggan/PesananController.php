<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Layanan;
use App\Models\Jenis;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{

    private function generateKode(){
        $prefix = "PSN00";
        
        $pesanan = Pesanan::all();
        $lastNumber = 0;
    
        foreach ($pesanan as $j) {
            $number = intval(substr($j->kode, strlen($prefix)));
            $lastNumber = max($lastNumber, $number);
        }
    
        $nextNumber = $lastNumber + 1;
        
        $kode = $prefix . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);
        return $kode;
    }

    public function getlayananList(Request $req){
        $jenis = Jenis::where('nama','LIKE', "%{$req->jenis}%")->first();

        $layanan = Layanan::where('kode_jenis', $jenis->kode)->get();
        foreach($layanan as &$s){
            $s->jenis = $s->jenis->nama;
        }
        return response()
        ->json(['status' => 'success', 'layanan' => $layanan ]);
    }

    public function makeOrder(Request $req){
        $kode = $this->generateKode();
        $layanan = $req->layanan;
        $kasir =  User::role('admin')->first();
        // return $jenis;
        $pesanan = new Pesanan;
        $pesanan->kode = $kode;
        $pesanan->pelanggan_id = Auth::user()->id;
        $pesanan->kasir_id = $kasir->id;
        $pesanan->longitude = $req->longitude;
        $pesanan->latitude = $req->latitude;
        $pesanan->total = 0;
        $pesanan->status = 'penjemputan';
        $pesanan->isTemp = true;

        $pesanan->save();

        if(is_array($layanan)){
            foreach($layanan as $l){
                $pesanan->layanan()->attach($l, ['jumlah' => 0, 'subtotal' => 0]);
            }
        }else{
            $pesanan->layanan()->attach($layanan, ['jumlah' => 0, 'subtotal' => 0]);
        }

        return response()
        ->json(['status' => 'success', 'message' => 'Pesanan Berhasil Dibuat, Silahkan Tunggu Penjemputan' ]);
    }

    public function myOrder(){
        $pesanan = Pesanan::where('pelanggan_id', Auth::user()->id)->get();

        return response()
        ->json(['status' => 'success', 'data' => $pesanan ]);
    }
}
