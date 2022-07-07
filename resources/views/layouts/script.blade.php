<script src="{{asset('asset/js/jquery.js')}}"></script>
<script src="{{asset('asset/js/plugins.js')}}"></script>
<script src="{{asset('asset/js/functions.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<!-- Pencarian  -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#inputSearch').on('keyup', function() {
        $inputSearch = $(this).val();
        if ($inputSearch == '') {
            $('.searchResult').show();
        } else {
            $.ajax({
                method: "post",
                url: 'home',
                data: JSON.stringify({
                    inputSearch: $inputSearch
                }),
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                success: function(data) {
                    var searchResultAjax = '';
                    data = JSON.parse(data);
                    console.log(data);
                    $('.search-result').show();
                    for (let i = 0; i < data.length; i++) {
                        searchResultAjax += `
                        <article class="portfolio-item pf-media pf-` + data[i].nama_hasiltani + `" id="portfolio" >
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="feature-box media-box">
                                             <div class="product-img">
                                                <div class="portfolio-image">
                                                    <img src="asset/gambar/` + data[i].gambar + `" style="width:100%;height:250px;" class="card-img-top img-thumbnail">
                                                </div>
                                            </div>
                                            <div class="product-content" style="background-color: white;">
                                                <h3 class="card-title">` + data[i].nama_hasiltani + `</h3>
                                                <p class="card-text">` + data[i].deskripsi + `</p>
                                                <p class="card-text">Stok: ` + data[i].stok + ` kg</p>
                                                <div class="product-price">
                                                    <center><span>Rp ` + data[i].harga + `/kg</span></center>
                                                </div>
											</div>
                                        </div>
                                    </div>
                                </div>
                            </article>`
                    }
                    $('.searchResult').html(searchResultAjax);
                },
            })
        }
    })
</script>

