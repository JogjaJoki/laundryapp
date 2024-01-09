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
        'customer_id',
    ];

    public $incrementing = false;
    protected $primaryKey = 'kode';
    protected $keyType = 'string';

    public function kasir(){
        return $this->belongsTo(User::class, 'kasir_id');
    }

    public function customer(){
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function layanan(){
        return $this->belongsToMany(Layanan::class, 'layanan_pesanan', 'kode_pesanan', 'kode_layanan');
    }
}
