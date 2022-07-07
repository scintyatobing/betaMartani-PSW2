@extends('layouts.app')

@section('content')

<div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="margin-bottom: 100px;">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('asset/gambar/1.jpg') }}" class="d-block w-100" alt="Second slide" style="filter: blur(8px);-webkit-filter: blur(8px);">
                <div class="carousel-caption">
                    <h3><a href="https://www.wartaekonomi.co.id/read222446/kementan-klaim-pertanian-indonesia-torehkan-berbagai-prestasi-tapi-orang-luar-bilang.html" style="color: black;">Kementan Klaim Pertanian Indonesia Torehkan Berbagai Prestasi, Tapi Orang Luar Bilang...</a></h3>
                </div>
            </div>
            <div class=" carousel-item">
                <img src="{{ asset('asset/gambar/2.jpg') }}" class="d-block w-100" alt="Second slide" style="filter: blur(8px);-webkit-filter: blur(8px);">
                <div class="carousel-caption">
                    <h3><a href="https://www.wartaekonomi.co.id/read214629/ini-prestasi-petani-setop-ributkan-data-impor-pangan.html" style="color: black;">Ini Prestasi Petani, Setop Ributkan Data Impor Pangan!</a></h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('asset/gambar/3.jpg') }}" class="d-block w-100" alt="Second slide" style="filter: blur(8px);-webkit-filter: blur(8px);">
                <div class="carousel-caption">
                    <h3><a href="https://www.radarpena.id/nasional/2019/07/05/prestasi-membanggakan-sektor-pertanian-indonesia/" style="color: black;">Prestasi Membanggakan Sektor Pertanian Indonesia</a></h3>
                </div>
            </div>
        </div>
        <a class=" carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="pull-right col-lg-7 col-12 col-sm-6">
        <div class="form-group">
            <input type="" id="inputSearch" class="form-control" placeholder="Cari Hasil Tani" />
        </div>
    </div>
    <br><br>

    <ul class="portfolio-filter clearfix" data-container="#portfolio">
        <li class="activeFilter"><a href="#" data-filter="*">Semua</a></li>
        <li><a href="#" data-filter=".pf-Rempah-rempah">Rempah-rempah</a></li>
        <li><a href="#" data-filter=".pf-Sayur">Sayur</a></li>
        <li><a href="#" data-filter=".pf-Kopi">Kopi</a></li>
    </ul>
    <div class="clear"></div>

    <div id="portfolio" class="portfolio grid-container clearfix searchResult">
        @foreach ($newHasilTani as $hasiltani)
        <article class="portfolio-item pf-media pf-{{$hasiltani->kategori}}">
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="feature-box media-box">
                        <div class="product-img">
                            <div class="portfolio-image">
                                <img src="{{asset('asset/gambar/'.$hasiltani['gambar'])}}" style="width:100%;height:250px;" class="card-img-top img-thumbnail">
                            </div>

                            <div class="product-content" style="background-color: white;">
                                <h3 class="card-title">{{$hasiltani['nama_hasiltani']}}</h3>
                                <p class="card-text">{{$hasiltani['deskripsi']}}</p>
                                <p class="card-text">Stok : {{$hasiltani['stok']}}kg</p>
                                <div class="product-price">
                                    <center><span>Rp {{$hasiltani['harga']}}/kg</span></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        @endforeach
    </div>
    {!! $newHasilTani ->links() !!}
</div>
@endsection