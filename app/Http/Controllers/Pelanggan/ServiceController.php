<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Layanan;

class ServiceController extends Controller
{
    public function services($id){
        $services = Layanan::where('kode_jenis', $id)->get();

        foreach($services as &$s){
            $s->jenis = $s->jenis->nama;
        }
        return response()
        ->json(['status' => 'success', 'services' => $services ]);
    }
}
