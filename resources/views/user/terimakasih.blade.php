@extends('user.app')
@section('content')

<div class="page-header text-center" style="background-image: url({{asset('user_asset/assets/images/page-header-bg.jpg')}})">
    <div class="container">
        <h1 class="page-title">Transaksi <span>Terima Kasih</span></h1>
    </div><!-- End .container -->
  </div><!-- End .page-header -->
  <nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Terima Kasih</li>
        </ol>
    </div><!-- End .container -->
  </nav><!-- End .breadcrumb-nav -->

<div class="site-section">
    <div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
        <span class="icon-check_circle display-3 text-success"></span>
        <h2 class="display-3 text-black">Terimakasih!</h2>
        <p class="lead mb-5">Pesanan Kamu Berhasil Dibuat Dengan No Invoice Silahkan Konfirmasi Pembayaran Lewat Menu Konfirmasi Pembayaran.</p>
        <p><a href="{{ route('user.order') }}" class="btn btn-sm btn-primary">Menu Pembayaran</a></p>
        </div>
    </div>
    </div>
</div>
@endsection