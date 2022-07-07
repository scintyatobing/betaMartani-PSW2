<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilTani extends Model
{
    protected $table = "hasiltani";
 
    protected $fillable = ['nama_hasiltani','kategori','deskripsi','harga','tgl_masuk','stok','gambar'];

}
