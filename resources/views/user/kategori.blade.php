@extends('user.app')
@section('content')
<div class="breadcrumb-main mb-3">
  <div class="container">
      <div class="row">
          <div class="col">
              <div class="breadcrumb-contain">
                  <div>
                      <h2>Kategori</h2>
                      <ul>
                          <li><a href="javascript:void(0)">Home</a></li>
                          <li><i class="fa fa-angle-double-right"></i></li>
                          <li><a href="javascript:void(0)">Kategori</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<div class="title6">
    <h4>Produk Kategori {{ $categories->name }}</h4>
  </div>
  <!--title end-->
  
  <!-- category start -->
  <section class="category3 " data-aos="fade-up">
    <div class="custom-container">
      <div class="row category-block">
        <div class="col-12 pr-0">
          <div class="category-slide5 no-arrow mb--5">
            @foreach($produks as $produk)
            <div>
              <div class="category-box">
                <div class="img-wrraper">
                  <a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}">
                    <img src="{{asset($produk->image)}}" alt="category" class="img-fluid">
                  </a>
                  <div class="category-detail">
                    <h4>{{ $produk->name }}</h4>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection