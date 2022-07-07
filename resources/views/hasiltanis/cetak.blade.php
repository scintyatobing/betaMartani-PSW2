<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.static {
            position: relative;
            /* left: 3% */
            border: 1px solid #543535;
        }
    </style>
    <title>CETAK DATA HASIL TANI</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Hasil Tani</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width:95%;">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Tanggal Masuk</th>
                <th>Stok</th>
                <th>Gambar</th>
            </tr>
            @foreach ($hasiltanis as $hasiltani)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $hasiltani->nama_hasiltani }}</td>
                <td>{{ $hasiltani->kategori }}</td>
                <td>{{ $hasiltani->deskripsi }}</td>
                <td>{{ $hasiltani->harga }}</td>
                <td>{{ $hasiltani->tgl_masuk }}</td>
                <td>{{ $hasiltani->stok }}</td>
                <td>
                    <img src="{{asset('asset/gambar/'.$hasiltani['gambar'])}}" alt="..." width="100">
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>