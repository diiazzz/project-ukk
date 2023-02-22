@extends('user.app')
@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url({{asset('user_asset/assets/images/page-header-bg.jpg')}})">
        <div class="container">
          <h1 class="page-title">List<span>Shop</span></h1>
        </div><!-- End .container -->
      </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$produk->name}}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

  <form action="{{ route('user.keranjang.simpan') }}" method="post">
    @csrf
    @if(Route::has('login'))
    @auth
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    @endauth
@endif
    <div class="page-content">
        <div class="container">
            <div class="product-details-top">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                <figure class="product-main-image">
                                    <img id="product-zoom" src="{{asset($produk->image)}}" data-zoom-image="{{asset($produk->image)}}" alt="product image">
                                </figure><!-- End .product-main-image -->
                            </div><!-- End .row -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->
  
                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">{{$produk->name}}</h1><!-- End .product-title -->
                            <div class="product-price">
                                Rp. {{number_format($produk->price, 2, '.', ',')}}
                            </div><!-- End .product-price -->
  
                            <div class="product-content">
                                <p>{{$produk->description}}</p>
                            </div><!-- End .product-content -->

                            <input type="hidden" name="products_id" value="{{$produk->id}}">
  
  
                            <div class="details-filter-row details-row-size">
                                <label for="qty">Qty:</label>
                                <div class="product-details-quantity">
                                    <input type="number" id="qty" name="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                </div><!-- End .product-details-quantity -->
                            </div><!-- End .details-filter-row -->
                            
  
                            @if (Route::has('login'))
                                @auth
                                <div class="product-details-action">
                                  <button type="submit" class="btn-product btn-cart"><span>add to cart</span></button>
                                </div><!-- End .product-details-action -->
                                
                                @else
                                <div class="product-details-action">
                                  <a href="#signin-modal" data-toggle="modal" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-details-action -->
                            @endauth
                            @endif
  
                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span>Category:</span>
                                    <a href="#">{{$produk->kategori->name}}</a>,
                                </div><!-- End .product-cat -->
                            </div><!-- End .product-details-footer -->
                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->

  </form>
</main><!-- End .main -->



<script>
    document.addEventListener("DOMContentLoaded", () => {
        $('.js-minus').on('click', function(e){
			e.preventDefault();
			if ( $(this).closest('.input-group').find('.form-control').val() != 0  ) {
				$(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) - 1);
			} else {
				$(this).closest('.input-group').find('.form-control').val(parseInt(0));
			}
		});
		$('.js-plus').on('click', function(e){
			e.preventDefault();
			$(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) + 1);
		});
});

</script>
@endsection