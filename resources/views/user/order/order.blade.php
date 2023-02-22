@extends('user.app')
@section('content')
<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
        <h1 class="page-title">Shopping Cart<span>Transaksi</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Shop</a></li>
            <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="site-section">
    <div class="container">
        <div class="title8 section-big-my-space" data-aos="fade-up">
            <h4>Belum Dibayar</h4>
          </div>
    
    <div class="row mb-5">
        <div class="col-md-12 card">
           <div class="table-responsive">
           <div class="table-responsive">
           <table class="table table-bordered mt-3 mb-3">
            <thead class="thead-dark">
                <tr>
                <th class="text-center">Invoice</th>
                <th class="text-center">Total</th>
                <th class="text-center">Status</th>
                <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order as $o)
                <tr>
                    <td class="text-center">{{ $o->invoice }}</td>
                    <td class="text-center">{{ $o->subtotal + $o->biaya_cod }}</td>
                    <td class="text-center">{{ $o->name }}</td>
                    <td class="text-center">
                    <a href="{{ route('user.order.pembayaran',['id' => $o->id]) }}" class="btn btn-success">Bayar</a>
                    <a href="{{ route('user.order.pesanandibatalkan',['id' => $o->id]) }}" onclick="return confirm('Yakin ingin membatalkan pesanan')" class="btn btn-danger">Batalkan</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            </div>
           </div>
        
    </div>

    </div>
    <div class="row mb-3">
        <div class="title8 section-big-my-space" data-aos="fade-up">
            <h4>Sedang Dalam Proses</h4>
          </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-12 card">
            <table class="table table-bordered mt-3 mb-3">
            <thead class="thead-dark">
                <tr>
                <th class="text-center">Invoice</th>
                <th class="text-center">Total</th>
                <th class="text-center">Status</th>
                <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dicek as $o)
                <tr>
                    <td class="text-center">{{ $o->invoice }}</td>
                    <td class="text-center">{{ $o->subtotal + $o->biaya_cod }}</td>
                    <td class="text-center">
                        @if($o->name == 'Perlu Di Cek')
                        Sedang Di Cek
                        @else
                        {{ $o->name }}
                        @endif
                    </td>
                    <td class="text-center">
                    <a href="{{ route('user.order.detail',['id' => $o->id]) }}" class="btn btn-success">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        
    </div>
    </div>
    <div class="row mb-3">
        <div class="title8 section-big-my-space" data-aos="fade-up">
            <h4>Riwayat Pemesanan</h4>
          </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-12 card">
            <div class="table-responsive">
            <table class="table table-bordered mt-3 mb-3">
            <thead class="thead-dark">
                <tr>
                <th class="text-center">Invoice</th>
                <th class="text-center">Total</th>
                <th class="text-center">Status</th>
                <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($histori as $o)
                <tr>
                    <td class="text-center">{{ $o->invoice }}</td>
                    <td class="text-center">{{ $o->subtotal + $o->biaya_cod }}</td>
                    <td class="text-center">{{ $o->name }}</td>
                    <td class="text-center">
                    <a href="{{ route('user.order.detail',['id' => $o->id]) }}" class="btn btn-success">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            </div>
        
    </div>

    </div>
</div>
@endsection