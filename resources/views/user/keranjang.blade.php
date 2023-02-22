@extends('user.app')
@section('content')


<main class="main">
    <div class="page-header text-center" style="background-image: url({{asset('user_asset/assets/images/page-header-bg.jpg')}})">
        <div class="container">
            <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <form  action="{{ route('user.keranjang.update') }}" method="post">
                            @csrf
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $subtotal=0; foreach($keranjangs as $keranjang): ?>
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="{{asset($keranjang->image)}}" alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="#">{{$keranjang->nama_produk}}</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">{{number_format($keranjang->price,2,',','.')}}</td>
                                    <td class="quantity-col">
                                        
                                        <div class="cart-product-quantity">
                                            <input type="hidden" name="id[]" value="{{ $keranjang->id }}">
                                            <input type="number" class="form-control" name="qty[]" min="1" max="{{$keranjang->stok}}" step="1" value="{{$keranjang->qty}}" data-decimals="0" required>
                                        </div><!-- End .cart-product-quantity -->
                                    </td>
                                    <?php
                                    $total = $keranjang->price * $keranjang->qty;
                                    $subtotal = $subtotal + $total;
                                ?>
                                    <td class="total-col">{{ number_format($total,2,',','.') }}</td>
                                    <td class="remove-col"><a href="{{ route('user.keranjang.delete',['id' => $keranjang->id]) }}" class="btn-remove"><i class="icon-close"></i></a></td>
                                </tr>
                                <?php endforeach;?>
                            
                            </tbody>
                        </table><!-- End .table table-wishlist -->

                        <div class="cart-bottom">

                            <button type="submit" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></button>
                        </div><!-- End .cart-bottom -->
                    </form>
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>{{number_format($subtotal, 2, ',', '.')}}</td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>{{number_format($subtotal, 2, ',', '.')}}</td>
                                    </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->
                            @if($cekalamat > 0)
                            <a href="{{ route('user.checkout') }}" class="btn btn-outline-primary-2 btn-order btn-block">check out</a></div>
                            @else
                            <a href="{{ route('user.alamat') }}" class="btn btn-outline-primary-2 btn-order btn-block">Atur Alamat</a></div>
                            @endif
                        </div><!-- End .summary -->

                        <a href="/" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection