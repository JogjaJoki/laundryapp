<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jenis;

class JenisController extends Controller
{
    public function jenis(){
        $jenis = Jenis::all();
        return response()->json(['status' => 'success', 'jenis' => $jenis ]);
    }
}
