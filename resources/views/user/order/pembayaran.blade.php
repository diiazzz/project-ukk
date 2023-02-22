@extends('user.app')
@section('content')
<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
        <h1 class="page-title">Shopping Cart<span>Pembayaran</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Shop</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pembayaran</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->
<div class="site-section">
    <div class="container">
    <div class="row mb-3">
        <div class="col-md-12 text-center">
            <h2 class="display-5">Silahkan Lakukan Pembayaran Lewat No Rekening Berikut</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        @foreach($rekening as $key)

        <div class="col-lg-4 col-sm-6">
            <div class="icon-box icon-box-card text-center">
                <span class="icon-box-icon">
                    {{ $key->bank_name }}
                </span>
                <div class="icon-box-content">
                    <h3 class="icon-box-title">{{ $key->no_rekening }}</h3><!-- End .icon-box-title -->
                    <p>Atas Nama {{ $key->atas_nama }}</p>
                </div><!-- End .icon-box-content -->
            </div><!-- End .icon-box -->
        </div><!-- End .col-lg-4 col-sm-6 -->
        @endforeach

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row  mb-4 mt-4">
                        <div class="col-md-12 text-center">
                            <h3>Transfer Sebesar Rp {{ number_format($order->subtotal,2,',','.') }} Ke No Rekening Di Atas</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form action="{{ route('user.order.kirimbukti',['id' => $order->id ]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                            <label for="">Upload Bukti Pembayaran</label>
                            <input type="file" name="bukti_pembayaran" id="" class="form-control" required>
                            </div>
                            <div class="text-right">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    </div>
</div>
@endsection