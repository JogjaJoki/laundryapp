<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jenis;
use App\Models\Layanan;
use App\Models\Pesanan;

class DashboardController extends Controller
{
    public function index(){
        $customer = User::role('pelanggan')->get();
        $jenis = Jenis::all();
        $layanan = Layanan::all();
        $pesanan = Pesanan::all();
        
        return view('admin.index', compact(['customer', 'jenis', 'layanan', 'pesanan']));
    }
}
