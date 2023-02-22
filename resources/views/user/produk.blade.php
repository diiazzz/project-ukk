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
                <li class="breadcrumb-item active" aria-current="page">List</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
          <div class="row">
            <div class="col-lg-9">
              <div class="toolbox">
                <div class="toolbox-left">
                </div><!-- End .toolbox-left -->

                <div class="toolbox-right">
                  <div class="toolbox-layout">
                    <a href="category-list.html" class="btn-layout active">
                      <svg width="16" height="10">
                        <rect x="0" y="0" width="4" height="4" />
                        <rect x="6" y="0" width="10" height="4" />
                        <rect x="0" y="6" width="4" height="4" />
                        <rect x="6" y="6" width="10" height="4" />
                      </svg>
                    </a>

                    <a href="category-2cols.html" class="btn-layout">
                      <svg width="10" height="10">
                        <rect x="0" y="0" width="4" height="4" />
                        <rect x="6" y="0" width="4" height="4" />
                        <rect x="0" y="6" width="4" height="4" />
                        <rect x="6" y="6" width="4" height="4" />
                      </svg>
                    </a>

                    <a href="category.html" class="btn-layout">
                      <svg width="16" height="10">
                        <rect x="0" y="0" width="4" height="4" />
                        <rect x="6" y="0" width="4" height="4" />
                        <rect x="12" y="0" width="4" height="4" />
                        <rect x="0" y="6" width="4" height="4" />
                        <rect x="6" y="6" width="4" height="4" />
                        <rect x="12" y="6" width="4" height="4" />
                      </svg>
                    </a>

                    <a href="category-4cols.html" class="btn-layout">
                      <svg width="22" height="10">
                        <rect x="0" y="0" width="4" height="4" />
                        <rect x="6" y="0" width="4" height="4" />
                        <rect x="12" y="0" width="4" height="4" />
                        <rect x="18" y="0" width="4" height="4" />
                        <rect x="0" y="6" width="4" height="4" />
                        <rect x="6" y="6" width="4" height="4" />
                        <rect x="12" y="6" width="4" height="4" />
                        <rect x="18" y="6" width="4" height="4" />
                      </svg>
                    </a>
                  </div><!-- End .toolbox-layout -->
                </div><!-- End .toolbox-right -->
              </div><!-- End .toolbox -->

                    <div class="products mb-3">

                      @foreach($produks as $produk)
                      <div class="product product-list">
                        <div class="row">
                            <div class="col-6 col-lg-3">
                                <figure class="product-media">
                                    <a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}">
                                        <img src="{{asset($produk->image)}}" alt="Product image" class="product-image">
                                    </a>
                                </figure><!-- End .product-media -->
                            </div><!-- End .col-sm-6 col-lg-3 -->

                            <div class="col-6 col-lg-3 order-lg-last">
                                <div class="product-list-action">
                                    <div class="product-price">
                                        {{$produk->harga}}
                                    </div>

                                    <div class="product-action">
                                        <a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                    </div><!-- End .product-action -->

                                    <a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-list-action -->
                            </div><!-- End .col-sm-6 col-lg-3 -->

                            <div class="col-lg-6">
                                <div class="product-body product-action-inner">
                                    <div class="product-cat">
                                        <a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}">{{$produk->kategori->name}}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}">{{$produk->name}}</a></h3><!-- End .product-title -->

                                    <div class="product-content">
                                        <p>{{$produk->description}}</p>
                                    </div><!-- End .product-content -->
                                </div><!-- End .product-body -->
                            </div><!-- End .col-lg-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product -->
                    @endforeach
                    </div><!-- End .products -->

            </div><!-- End .col-lg-9 -->
            <aside class="col-lg-3 order-lg-first">
              <div class="sidebar sidebar-shop">
                <div class="widget widget-clean">
                  <label>Filters:</label>
                  <a href="#" class="sidebar-filter-clear">Clean All</a>
                </div><!-- End .widget widget-clean -->

                <div class="widget widget-collapsible">
            <h3 class="widget-title">
              <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                  Category
              </a>
          </h3><!-- End .widget-title -->
          <form action="{{route('user.produk')}}" method="get" >

            <div class="collapse show" id="widget-1">
              <div class="widget-body">
              @foreach($categories as $item)
              <div class="filter-items filter-items-count">
                <div class="filter-item">
                  <div class="custom-control custom-checkbox">
                    <input  type="checkbox" class="custom-control-input" name="cate[]" value="{{$item->id}}" {{isset($_GET['cate']) ? in_array($item->id, $_GET['cate']) != false ? 'checked' : '' : ''}} id="cat-{{$item->id}}">
                    <label class="custom-control-label" for="cat-{{$item->id}}">{{$item->name}}</label>
                  </div><!-- End .custom-checkbox -->
                  <span class="item-count">{{$item->jumlah}}</span>
                </div><!-- End .filter-item -->
              </div><!-- End .filter-items -->
              @endforeach
            </div><!-- End .widget-body -->
          </div><!-- End .collapse -->
          <button type="submit" class="btn btn-primary btn-block"> Terapkan </button>
        </div><!-- End .widget -->
      </form>

            </div><!-- End .widget -->
              </div><!-- End .sidebar sidebar-shop -->
            </aside><!-- End .col-lg-3 -->
          </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection