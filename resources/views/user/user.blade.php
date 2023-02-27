@extends('user.app')
@section('content')
<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
  <div class="container">
      <h1 class="page-title">User<span>Detail</span></h1>
  </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav">
  <div class="container">
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Acount</a></li>
          <li class="breadcrumb-item active" aria-current="page">Detail</li>
      </ol>
  </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="site-section">
    <div class="container">
    <div class="row">

        <div class="content-wrapper col-12">

                    <div class="row">
                      <div class="col-12 grid-margin">
                        <div class="card">
                          <div class="card-body">
        {{--                    
                            @php
                                dd($user->name);
                            @endphp --}}
        
                            <div class="row">
                                <div class="col-md-12">
                                    <form  method="POST" action="{{ route('user.updateuser') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="name" value="{{$user->name}}"/>
                                    </div>
                                    <div class="form-grup mb-3">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}"/>
                                            
                                        </div>
                                        
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-success text-right">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

    </div></div></div>
@endsection