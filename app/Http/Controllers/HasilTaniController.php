<?php

namespace App\Http\Controllers;

use App\Exports\HasilTaniExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\HasilTani;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HasilTaniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hasiltanis = HasilTani::latest()->simplePaginate(6);

        $categories = [];
        $data = [];

        foreach ($hasiltanis as $tani){
            $categories[] = $tani->kategori;
            $data[] = $tani->stok;
        }

        //dd($data);
        // dd(json_encode($categories));

        return view('hasiltanis.index', ['hasiltanis' => $hasiltanis, 'categories' =>$categories, 'data'=>$data])
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    public function cetak()
    {
        $hasiltanis = HasilTani::latest()->get();
        return view('hasiltanis.cetak', compact('hasiltanis'));
    }

    public function export()
    {
        return Excel::download(new HasilTaniExport, 'hasiltani.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hasiltanis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nama_hasiltani' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'tgl_masuk' => 'required',
            'stok' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);

        // $file = $request->file('gambar');
        // $namaFile = $file->getClientOriginalName();
        // $tujuanFile = 'asset/gambar';

        // $file->move($tujuanFile, $namaFile);

        $file = $request->gambar;
        $namaFile = $file->getClientOriginalName();

        $newHasilTani = new HasilTani;
        $newHasilTani->nama_hasiltani = $request->nama_hasiltani;
        $newHasilTani->kategori =$request->kategori;
        $newHasilTani->deskripsi = $request->deskripsi;
        $newHasilTani->gambar = $namaFile;
        $newHasilTani->tgl_masuk = $request->tgl_masuk;
        $newHasilTani->stok = $request->stok;
        $newHasilTani->harga = $request->harga;

        $file->move(public_path().'asset/gambar'. $namaFile);
        $newHasilTani->save();

        return redirect("/")->with('status', 'Hasil Tani berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HasilTani  $hasilTani
     * @return \Illuminate\Http\Response
     */
    public function show(HasilTani $hasiltani)
    {
        return view('hasiltanis.show', compact('hasiltani'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HasilTani  $hasilTani
     * @return \Illuminate\Http\Response
     */
    public function edit(HasilTani $hasiltani)
    {
        return view('hasiltanis.edit', compact('hasiltani'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HasilTani  $hasiltani
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HasilTani $hasiltani)
    {
        request()->validate([
            'nama_hasiltani' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'tgl_masuk' => 'required',
            'stok' => 'required',
        ]);

        $hasiltani->update($request->all());

        return redirect()->route('hasiltanis.index')
            ->with('success', 'Hasil Tani updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HasilTani  $hasiltani
     * @return \Illuminate\Http\Response
     */
    public function destroy(HasilTani $hasiltani)
    {
        $hasiltani->delete();

        return redirect()->route('hasiltanis.index')
            ->with('success', 'Hasil Tani deleted successfully');
    }



   
        
}
