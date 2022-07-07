<?php

namespace App\Http\Controllers;

use App\Models\HasilTani ;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{

    public function getCustomers()
    {
        $query = HasilTani::select('nama_hasiltani', 'kategori', 'deskripsi', 'harga', 'tgl_masuk', 'stok','gambar');
        return datatables($query)->make(true);
    }
}
