<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'kode_pesanan',
        'tarif',
        'metode'
    ];

    public $incrementing = false;
    protected $primaryKey = 'kode';
    protected $keyType = 'string';

    public function pesanan(){
        return $this->belongsTo(Pesanan::class, 'kode_pesanan');
    }
}
