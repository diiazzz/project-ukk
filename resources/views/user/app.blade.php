<!DOCTYPE html>
<html lang="en">
  <head>
    <title>D.MACRAME </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 



 

    @php
                          @$user_id = \Auth::user()->id;
                          @$total_keranjang = \DB::table('keranjang')
                          ->select(DB::raw('count(products_id) as jumlah'))
                          ->groupBy('products_id')
                          ->where('user_id',$user_id)
                          ->first();
    @endphp

    <link rel="stylesheet" href="{{ asset('user_asset/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user_asset/assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('user_asset/assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('user_asset/assets/css/plugins/jquery.countdown.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('user_asset/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('user_asset/assets/css/skins/skin-demo-21.css') }}">
    <link rel="stylesheet" href="{{ asset('user_asset/assets/css/demos/demo-21.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="{{ asset('shopper') }}/css/aos.css">

    {{-- <link rel="stylesheet" href="{{ asset('shopper') }}/css/style.css"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
  </head>
  <body class="bg-light">
  <div class="page-wrapper">
    <header class="header">
      <div class="header-bottom sticky-header">
          <div class="container" style="background-color: rgb(176, 233, 171); height:120px">
              <div class="header-left">
                  <button class="mobile-menu-toggler">
                      <span class="sr-only">Toggle mobile menu</span>
                      <i class="icon-bars"></i>
                  </button>
                  
                  <a href="index.html" class="logo">
                    <img src="{{ asset('assets/images/logo.png')}}" alt="Molla Logo" width="300" class="img-fluid p-4" height="20">
                  </a>
              </div>
              <div class="header-center">
                  <nav class="main-nav">
                      <ul class="menu sf-arrows">
                          <li class="megamenu-container">
                              <a href="/" class="sf">Home</a>
                          </li>
                          <li class="megamenu-container">
                              <a href="{{ route('user.produk') }}" class="sf">Produk</a>
                          </li>
                          <li>
                            <a href="#" class="sf-with-ul">Acount</a>

                            <ul>
                                @if(Route::has('login'))
                                    @auth
                                <li><a href="{{route('user.index')}}">User</a></li>
                                <li><a href="{{route('user.alamat')}}">Alamat</a></li>
                                <li><a href="{{route('user.order')}}">Transaksi</a></li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                @else
                                <li><a href="#signin-modal" data-toggle="modal">Login</a></li>
                                @endauth
                                @endif
                            </ul>
                        </li>
                      </ul><!-- End .menu -->
                  </nav><!-- End .main-nav -->
              </div><!-- End .header-left -->

              <div class="header-right">
                  <div class="header-search">
                      <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                      <form action="{{route('user.produk.cari')}}" method="get">

                          <div class="header-search-wrapper">
                              <label for="q" class="sr-only">Search</label>
                              <input type="search" class="form-control" name="cari" id="q" placeholder="Search in..." required>
                          </div><!-- End .header-search-wrapper -->
                      </form>
                  </div><!-- End .header-search -->

                  @if(Route::has('login'))
                  @auth
                  <div class="dropdown cart-dropdown">
                      <a href="{{route('user.keranjang')}}" class="dropdown-toggle">
                          <i class="icon-shopping-cart"></i>
                          <span class="cart-count">{{isset($total_keranjang->jumlah) ? $total_keranjang->jumlah : 0}}</span>
                      </a>
                  </div><!-- End .cart-dropdown -->
                  @endauth
                  @endif
              </div><!-- End .header-right -->
          </div><!-- End .container -->
      </div><!-- End .header-bottom -->
  </header><!-- End .header -->

        <!-- Sign in / Register Modal -->
        <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="icon-close"></i></span>
                        </button>
    
                        <div class="form-box">
                            <div class="form-tab">
                                <ul class="nav nav-pills nav-fill" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="tab-content-5">
                                  <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                          <form method="POST" action="{{ route('login') }}">
                                              @csrf
                                            <div class="form-group">
                                                <label for="singin-email">email address *</label>
                                                <input type="text" class="form-control" id="singin-email" name="email" required>
                                            </div><!-- End .form-group -->
    
                                            <div class="form-group">
                                                <label for="singin-password">Password *</label>
                                                <input type="password" class="form-control" id="singin-password" name="password" required>
                                            </div><!-- End .form-group -->
    
                                            <div class="form-footer">
                                                <button type="submit" class="btn btn-outline-primary-2">
                                                    <span>LOG IN</span>
                                                    <i class="icon-long-arrow-right"></i>
                                                </button>
    
    
                                                <a href="#" class="forgot-link">Forgot Your Password?</a>
                                            </div><!-- End .form-footer -->
                                        </form>
                                     
                                    </div><!-- .End .tab-pane -->
                                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                        <form action="{{ route('register') }}" method="post">
                                          @csrf
                                            <div class="form-group">
                                                <label for="name">Name *</label>
                                                <input type="text" class="form-control" id="name" name="name" required>
                                            </div><!-- End .form-group -->

                                            <div class="form-group">
                                                <label for="email">Your email address *</label>
                                                <input type="email" class="form-control" id="email" name="email" required>
                                            </div><!-- End .form-group -->
    
                                            <div class="form-group">
                                                <label for="password">Password *</label>
                                                <input type="password" class="form-control" id="password" name="password" required>
                                            </div><!-- End .form-group -->

                                            <div class="form-group">
                                                <label for="password_confirmation">Re-Password *</label>
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                            </div><!-- End .form-group -->
    
                                            <div class="form-footer">
                                                <button type="submit" class="btn btn-outline-primary-2">
                                                    <span>SIGN UP</span>
                                                    <i class="icon-long-arrow-right"></i>
                                                </button>
    
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                                    <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .form-footer -->
                                        </form>

                                    </div><!-- .End .tab-pane -->
                                </div><!-- End .tab-content -->
                            </div><!-- End .form-tab -->
                        </div><!-- End .form-box -->
                    </div><!-- End .modal-body -->
                </div><!-- End .modal-content -->
            </div><!-- End .modal-dialog -->
        </div><!-- End .modal -->

    @yield('content')
    <div class="container-fluid text-dark mt-5 pt-5" style="background-color:rgb(176, 233, 171) ">
        <div class="row px-xl-5">
            <div class="col-lg-4 col-md-12 mb-5">
                <a href="" class="text-decoration-none">
                    <img src="{{ asset('assets/images/logo-footer.png')}}" alt="Molla Logo" width="200" class="img-fluid" height="20">
                </a>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Jl. Simo Sidomulyo, Surabaya</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>diaz@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>0895371344555</p>
            </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  <script src="{{ asset('shopper') }}/js/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
  <script src="{{ asset('shopper') }}/js/jquery-ui.js"></script>
  <script src="{{ asset('shopper') }}/js/popper.min.js"></script>
  <script src="{{ asset('shopper') }}/js/bootstrap.min.js"></script>
  <script src="{{ asset('shopper') }}/js/owl.carousel.min.js"></script>
  <script src="{{ asset('shopper') }}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{ asset('shopper') }}/js/aos.js"></script>
  <script src="{{ asset('user_asset')}}/assets/js/jquery.hoverIntent.min.js"></script>
  <script src="{{ asset('user_asset')}}/assets/js/jquery.waypoints.min.js"></script>
  <script src="{{ asset('user_asset')}}/assets/js/superfish.min.js"></script>
  <script src="{{ asset('user_asset')}}/assets/js/owl.carousel.min.js"></script>
  <script src="{{ asset('user_asset')}}/assets/js/jquery.plugin.min.js"></script>
  <script src="{{ asset('user_asset')}}/assets/js/jquery.magnific-popup.min.js"></script>
  <script src="{{ asset('user_asset')}}/assets/js/jquery.countdown.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <!-- Main JS File -->
  <script src="{{ asset('user_asset/assets/js/main.js') }}"></script>
  <script src="{{ asset('user_asset/assets/js/demos/demo-8.js')}}"></script>

<script src="{{ asset('shopper') }}/js/main.js"></script>

@error('email')
<script>
  toastr.error('Login/Register Gagal','error');
</script>
@enderror
    @yield('js')
  </body>
</html>