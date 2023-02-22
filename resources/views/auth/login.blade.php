@extends('user.app')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
  <div class="container">
      <div class="row">
          <div class="col">
              <div class="breadcrumb-contain">
                  <div>
                      <h2>login</h2>
                      <ul>
                          <li><a href="index.html">home</a></li>
                          <li><i class="fa fa-angle-double-right"></i></li>
                          <li><a href="javascript:void(0)">login</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- breadcrumb End -->

<!--section start-->
<section class="login-page section-big-py-space b-g-light">
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="custom-container">
      <div class="row">
          <div class="col-xl-4 col-lg-6 col-md-8 offset-xl-4 offset-lg-3 offset-md-2">
              <div class="theme-card">
                  <h3 class="text-center">Login</h3>
                  <form class="theme-form">
                      <div class="form-group">
                          <label >Email</label>
                          <input type="email"  class="form-control @error('email') is-invalid @enderror"  name="email" placeholder="Email" required="">
                          @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label >Password</label>
                          <input type="password"  class="form-control @error('password') is-invalid @enderror"  name="password" placeholder="Enter your password" required="">
                          @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                      <button type="submit" class="btn btn-normal btn-block">Login</button>
                    </form>
                    <p class="mt-3">Belum Punya Akun? </p>
                    <a href="/register" class="txt-default pt-3 d-block">Buat akun</a>
                  </div>
                </div>
              </div>
            </div>
          </form>
</section>

@endsection