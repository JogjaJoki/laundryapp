<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function (){
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/jenis', [App\Http\Controllers\Admin\JenisController::class, 'index'])->name('admin.jenis.index');
    Route::get('/add-jenis', [App\Http\Controllers\Admin\JenisController::class, 'add'])->name('admin.jenis.add');
    Route::post('/create-jenis', [App\Http\Controllers\Admin\JenisController::class, 'create'])->name('admin.jenis.create');
    Route::get('/edit-jenis/{kode}', [App\Http\Controllers\Admin\JenisController::class, 'edit'])->name('admin.jenis.edit');
    Route::post('/update-jenis', [App\Http\Controllers\Admin\JenisController::class, 'update'])->name('admin.jenis.update');
    Route::get('/delete-jenis/{kode}', [App\Http\Controllers\Admin\JenisController::class, 'delete'])->name('admin.jenis.delete');

    Route::get('/customer', [App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('admin.customer.index');
    Route::get('/add-customer', [App\Http\Controllers\Admin\CustomerController::class, 'add'])->name('admin.customer.add');
    Route::post('/create-customer', [App\Http\Controllers\Admin\CustomerController::class, 'create'])->name('admin.customer.create');
    Route::get('/edit-customer/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'edit'])->name('admin.customer.edit');
    Route::post('/update-customer', [App\Http\Controllers\Admin\CustomerController::class, 'update'])->name('admin.customer.update');
    Route::get('/delete-customer/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'delete'])->name('admin.customer.delete');

    Route::get('/pegawai', [App\Http\Controllers\Admin\PegawaiController::class, 'index'])->name('admin.pegawai.index');
    Route::get('/add-pegawai', [App\Http\Controllers\Admin\PegawaiController::class, 'add'])->name('admin.pegawai.add');
    Route::post('/create-pegawai', [App\Http\Controllers\Admin\PegawaiController::class, 'create'])->name('admin.pegawai.create');
    Route::get('/edit-pegawai/{id}', [App\Http\Controllers\Admin\PegawaiController::class, 'edit'])->name('admin.pegawai.edit');
    Route::post('/update-pegawai', [App\Http\Controllers\Admin\PegawaiController::class, 'update'])->name('admin.pegawai.update');
    Route::get('/delete-pegawai/{id}', [App\Http\Controllers\Admin\PegawaiController::class, 'delete'])->name('admin.pegawai.delete');

    Route::get('/layanan', [App\Http\Controllers\Admin\LayananController::class, 'index'])->name('admin.layanan.index');
    Route::get('/add-layanan', [App\Http\Controllers\Admin\LayananController::class, 'add'])->name('admin.layanan.add');
    Route::post('/create-layanan', [App\Http\Controllers\Admin\LayananController::class, 'create'])->name('admin.layanan.create');
    Route::get('/edit-layanan/{kode}', [App\Http\Controllers\Admin\LayananController::class, 'edit'])->name('admin.layanan.edit');
    Route::post('/update-layanan', [App\Http\Controllers\Admin\LayananController::class, 'update'])->name('admin.layanan.update');
    Route::get('/delete-layanan/{kode}', [App\Http\Controllers\Admin\LayananController::class, 'delete'])->name('admin.layanan.delete');

    Route::get('/pesanan', [App\Http\Controllers\Admin\PesananController::class, 'index'])->name('admin.pesanan.index');
    Route::get('/add-pesanan', [App\Http\Controllers\Admin\PesananController::class, 'add'])->name('admin.pesanan.add');
    Route::post('/create-pesanan', [App\Http\Controllers\Admin\PesananController::class, 'create'])->name('admin.pesanan.create');
    Route::get('/view-pesanan/{kode}', [App\Http\Controllers\Admin\PesananController::class, 'view'])->name('admin.pesanan.view');
    Route::get('/edit-pesanan/{kode}', [App\Http\Controllers\Admin\PesananController::class, 'edit'])->name('admin.pesanan.edit');
    Route::post('/update-pesanan', [App\Http\Controllers\Admin\PesananController::class, 'update'])->name('admin.pesanan.update');
    Route::get('/delete-pesanan/{kode}', [App\Http\Controllers\Admin\PesananController::class, 'delete'])->name('admin.pesanan.delete');

    Route::get('/pembayaran', [App\Http\Controllers\Admin\PembayaranController::class, 'index'])->name('admin.pembayaran.index');
    Route::get('/add-pembayaran', [App\Http\Controllers\Admin\PembayaranController::class, 'add'])->name('admin.pembayaran.add');
    Route::post('/create-pembayaran', [App\Http\Controllers\Admin\PembayaranController::class, 'create'])->name('admin.pembayaran.create');
    Route::get('/edit-pembayaran/{kode}', [App\Http\Controllers\Admin\PembayaranController::class, 'edit'])->name('admin.pembayaran.edit');
    Route::post('/update-pembayaran', [App\Http\Controllers\Admin\PembayaranController::class, 'update'])->name('admin.pembayaran.update');
    Route::get('/delete-pembayaran/{kode}', [App\Http\Controllers\Admin\PembayaranController::class, 'delete'])->name('admin.pembayaran.delete');
});
