<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
    ];

    public $incrementing = false;
    protected $primaryKey = 'kode';
    protected $keyType = 'string';

    public function layanan(){
        return $this->hasMany(Layanan::class, 'kode_jenis');
    }
}
