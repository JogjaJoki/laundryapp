<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'kasir_id',
        'pelanggan_id',
        'longitude',
        'latitude',
        'total',
        'status',
        'isTemp'
    ];

    public $incrementing = false;
    protected $primaryKey = 'kode';
    protected $keyType = 'string';

    public function kasir(){
        return $this->belongsTo(User::class, 'kasir_id');
    }

    public function pelanggan(){
        return $this->belongsTo(User::class, 'pelanggan_id');
    }

    public function layanan(){
        return $this->belongsToMany(Layanan::class, 'layanan_pesanan', 'kode_pesanan', 'kode_layanan')->withPivot('jumlah', 'subtotal', 'created_at', 'updated_at');
    }

    public function pembayaran(){
        return $this->hasOne(Pembayaran::class, 'kode_pesanan');
    }
}
