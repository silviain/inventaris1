<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;


    protected $table = 'barang';
    protected $fillable = [
        'nama_barang',
        'image',
    ];

    public function siswa()
    {
        return $this->belongsTo(siswa::class, 'id_siswa');
    }

    public function barang()
    {
        return $this->belongsTo(barang::class, 'id_barang');
    }


}
