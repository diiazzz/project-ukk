@extends('user.app')
@section('content')

<main class="main">
    <div class="intro-slider-container mb-5">
        <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" 
            data-owl-options='{
                "dots": true,
                "nav": false, 
                "responsive": {
                    "1200": {
                        "nav": false,
                        "dots": false
                    }
                }
            }'>
            @foreach($produks as $produk)
            <div class="intro-slide" style="background-image: url({{asset($produk->image)}});">
                <div class="container intro-content">
                    <div class="row">
                     
                    </div><!-- End .row -->
                </div><!-- End .intro-content -->
            </div><!-- End .intro-slide -->
            @endforeach


            
        </div><!-- End .intro-slider owl-carousel owl-simple -->

        <span class="slider-loader"></span><!-- End .slider-loader -->
    </div><!-- End .intro-slider-container -->


  <div class="mb-5"></div><!-- End .mb-5 -->

  <div class="container recent-arrivals">
      <div class="heading heading-flex align-items-center mb-3">
          <h2 class="title title-lg">Produk</h2><!-- End .title -->
          <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
              <li class="nav-item">
                  <a class="nav-link active" id="recent-all-link" data-toggle="tab" href="#recent-all-tab" role="tab" aria-controls="recent-all-tab" aria-selected="true">All</a>
              </li>
              @foreach($kategori as $item)
              <li class="nav-item">
                  <a class="nav-link" id="product-{{$item->id}}-link" data-toggle="tab" href="#product-{{$item->id}}-tab" role="tab" aria-controls="product-{{$item->id}}-tab" aria-selected="false">{{$item->name}}</a>
              </li>
              @endforeach
            </ul>
      </div><!-- End .heading -->

      
      
      <div class="tab-content">
          <div class="tab-pane p-0 fade show active" id="recent-all-tab" role="tabpanel" aria-labelledby="recent-all-link">
              <div class="products">
                  <div class="row justify-content-center">
                    @foreach($produks as $produk)
                    <div class="col-6 col-md-4 col-lg-3" >
                        <div class="product product-2 text-center">
                            <figure class="product-media">

                                <a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}">
                                    <img src="{{ asset($produk->image) }}" alt="Product image" class="product-image">
                                    <img src="{{ asset($produk->image) }}" alt="Product image" class="product-image-hover">
                                </a>

                                  <div class="product-action-vertical">
                                      <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                  </div><!-- End .product-action-vertical -->

                                  <div class="product-action">
                                      <a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                              </figure><!-- End .product-media -->
                              
                              <div class="product-body">

                                  <h3 class="product-title"><a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}">{{$produk->name}}</a></h3><!-- End .product-title -->
                                  <div class="product-price">
                                      <span class="new-price">Rp. {{number_format($produk->price ,0, ',','.')}}</span>
                                  </div><!-- End .product-price -->
                                </div><!-- End .product-body -->
                          </div><!-- End .product -->
                      </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                    @endforeach
                </div><!-- End .row -->
              </div><!-- End .products -->
          </div><!-- .End .tab-pane -->
          @foreach($kategori as $item)
          <div class="tab-pane p-0 fade" id="product-{{$item->id}}-tab" role="tabpanel" aria-labelledby="product-{{$item->id}}-link">
              <div class="products">
                  <div class="row justify-content-center">
                      @foreach($item->produk as $citem)
                      <div class="col-6 col-md-4 col-lg-3">
                          <div class="product product-2 text-center">
                              <figure class="product-media">
                                  <span class="product-label label-sale">Sale</span>
                                  <a href="{{ route('user.produk.detail',['id' =>  $citem->id]) }}">
                                      <img src="{{asset($citem->image) }}" alt="Product image" class="product-image">
                                      <img src="{{asset($citem->image) }}" alt="Product image" class="product-image-hover">
                                  </a>
                                  <div class="product-action">
                                      <a href="{{ route('user.produk.detail',['id' =>  $citem->id]) }}" class="btn-product btn-cart"><span>add to cart</span></a>
                                  </div><!-- End .product-action -->
                              </figure><!-- End .product-media -->

                              <div class="product-body">
                                  <div class="product-cat">
                                      <a href="#">{{$item->name}}</a>
                                  </div><!-- End .product-cat -->
                                  <h3 class="product-title"><a href="{{ route('user.produk.detail',['id' =>  $citem->id]) }}">{{$citem->name}}</a></h3><!-- End .product-title -->
                                  <div class="product-price">
                                      <span class="new-price"> {{$citem->price}}</span>
                                  </div><!-- End .product-price -->
                              </div><!-- End .product-body -->
                          </div><!-- End .product -->
                      </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                      @endforeach
                  </div><!-- End .row -->
              </div><!-- End .products -->
          </div><!-- .End .tab-pane -->
          @endforeach
      </div><!-- End .tab-content -->
  </div><!-- End .container -->



    @endsection