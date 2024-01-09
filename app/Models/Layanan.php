<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'kode_jenis',
        'nama',
        'estimasi',
        'harga'
    ];

    public $incrementing = false;
    protected $primaryKey = 'kode';
    protected $keyType = 'string';

    public function jenis(){
        return $this->belongsTo(Jenis::class, 'kode_jenis');
    }

    public function pesanan(){
        return $this->belongsToMany(Pesanan::class, 'layanan_pesanan', 'kode_layanan', 'kode_pesanan');
    }
}
