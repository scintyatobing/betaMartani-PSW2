@extends('layouts.app')

@section('content')
<section>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Hasil Tani</h2>
            </div>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
            <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
        </div>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('hasiltanis.create') }}">Tambahkan</a>
                @endcan
                <a href="{{ route('cetak') }}" target="_blank" class="btn btn-danger">Cetak PDF</a>
                <a href="{{ route('export') }}" class="btn btn-warning">Cetak Excel</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="panel">
        <div class="table-responsive">
            <table class="table table-bordered border-dark" id="datatable">
                <thead>
                    <tr class="text-center" style="background-color: #0e7438;">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Tanggal Masuk</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        @can('role-list')
                        <th width="200px">Action</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasiltanis as $hasiltani)
                    <tr style="background-color: #eadf1f;">
                        <td>{{ ++$i }}</td>
                        <td>{{ $hasiltani->nama_hasiltani }}</td>
                        <td>{{ $hasiltani->kategori }}</td>
                        <td>{{ $hasiltani->deskripsi }}</td>
                        <td>Rp {{ $hasiltani->harga }}</td>
                        <td>{{ $hasiltani->tgl_masuk }}</td>
                        <td>{{ $hasiltani->stok }}</td>
                        <td>
                            <img src="{{asset('asset/gambar/'.$hasiltani['gambar'])}}" alt="..." width="100">
                        </td>
                        @can('role-list')
                        <td width="200px">
                            <form action="{{ route('hasiltanis.destroy',$hasiltani->id) }}" method="POST">
                                @can('product-edit')
                                <a class="btn btn-primary" href="{{ route('hasiltanis.edit',$hasiltani->id) }}">Edit</a>
                                @endcan
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {!! $hasiltanis ->links() !!}
    </div><br>

    <div class="panel">
        <div id="chartTani"></div>
    </div>
</section>
@endsection

@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chartTani', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Indeks Hasil Tani'
        },
        subtitle: {
            text: 'Beta Martani'
        },
        xAxis: {
            categories: {!!json_encode($categories) !!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah (kg)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} kg</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Jumlah',
            data: {!!json_encode($data) !!}
        }]
    });
</script>
@endsection
