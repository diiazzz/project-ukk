@extends('user.app')
@section('content')
<div class="page-header text-center" style="background-image: url({{asset('user_asset/assets/images/page-header-bg.jpg')}})">
  <div class="container">
      <h1 class="page-title">Produk <span>Cari</span></h1>
  </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav">
  <div class="container">
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Shop</a></li>
          <li class="breadcrumb-item active" aria-current="page">Cari</li>
          <li class="breadcrumb-item active" aria-current="page">{{ $cari }}</li>
      </ol>
  </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->



<div class="products">
  <div class="row justify-content-center">
    @foreach($produks as $produk)
    <div class="col-6 col-md-4 col-lg-3" >
        <div class="product product-2 text-center">
            <figure class="product-media">
                <span class="product-label label-sale">Sale</span>
                <a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}">
                    <img src="{{ asset($produk->image) }}" alt="Product image" class="product-image">
                    <img src="{{ asset($produk->image) }}" alt="Product image" class="product-image-hover">
                </a>

                  <div class="product-action">
                      <a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}" class="btn-product btn-cart"><span>add to cart</span></a>
                    </div><!-- End .product-action -->
              </figure><!-- End .product-media -->
              
              <div class="product-body">
                  <div class="product-cat">
                      <a href="#">{{$produk->kategori->name}}</a>
                    </div><!-- End .product-cat -->
                  <h3 class="product-title"><a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}">{{$produk->name}}</a></h3><!-- End .product-title -->
                  <div class="product-price">
                      <span class="new-price">{{$produk->price}}</span>
                  </div><!-- End .product-price -->
                </div><!-- End .product-body -->
          </div><!-- End .product -->
      </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
    @endforeach
</div><!-- End .row -->
</div><!-- End .products -->


@endsection