@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Hasil Tani</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('hasiltanis.index') }}"> Back</a>
        </div>
    </div>
</div>


@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
</div>
@endif

<form action="{{ route('hasiltanis.store') }}" method="POST" enctype="multipart/form-data">
    @csrf


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" name="nama_hasiltani" class="form-control" placeholder="Nama">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kategori:</strong>
                <select class="form-control" id="kategori" name="kategori" required>
                    <option>-Pilih-</option>
                    <option value="Rempah-rempah">Rempah-rempah</option>
                    <option value="Kopi">Kopi</option>
                    <option value="Sayur">Sayur</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Deskripsi:</strong>
                <textarea class="form-control" style="height:150px" name="deskripsi" placeholder="..."></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga: </strong>
                <input type="number" name="harga" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal masuk: </strong>
                <input type="date" name="tgl_masuk" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Stok:</strong>
                <input type="number" name="stok" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Pilih Gambar:</strong>
                <input type="file" name="gambar" id="gambar" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>

</form>

@endsection