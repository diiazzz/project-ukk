@extends('user.app')
@section('content')
<div class="page-header text-center" style="background-image: url({{asset('user_asset/assets/images/page-header-bg.jpg')}})">
    <div class="container">
        <h1 class="page-title">Account<span>Alamat</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Account</a></li>
            <li class="breadcrumb-item active" aria-current="page">Alamat</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->
{{-- @php
    dd($check);   
@endphp --}}

@if($check != 0)
<div class="site-section">
    <div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4>{{$alamat[0]->detail}},{{$alamat[0]->kota}}</h4>
                    <a href="alamat/{{$alamat[0]->id}}/hapus">Hapus</a>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

    </div>
</div>
@else
<div class="site-section">
    <div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.alamat.simpan') }}" method="POST">
                    @csrf
                        <div class="form-group">
                        <label for="">Pilih Provinsi</label>
                        <select name="province_id" id="province_id" class="form-control">
                        <option value="">Pilih Provinsi</option>
                        @foreach($province as $provinsi)
                            <option value="{{ $provinsi->province_id }}">{{ $provinsi->title }}</option>
                        @endforeach
                        </select>
                        </div>
                        <div class="form-grup">
                            <label for="">Pilih Kota/Kabupaten</label>
                            <select name="cities_id" id="cities_id" class="form-control">
                        </select>
                        </div>
                        <div class="form-grup">
                            <label for="">Alamat Lengkap</label>
                            <input type="text" name="detail" id="" placeholde="Kecamatan/Desa/Nama Jalan" class="form-control">
                        </select>
                        </div>
                        <div class="mt-4 text-right">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

    </div>
</div>

@endif
@endsection
@section('js')
<script type="text/javascript">
var toHtml = (tag, value) => {
    $(tag).html(value);
}
console.log('oioi')
    //  $('#province_id').select2();
    //  $('#cities_id').select2();
     $('#province_id').on('change',function(){
     var id = $('#province_id').val();
     var url = window.location.href;
     var urlNya = url.substring(0, url.lastIndexOf('/alamat/'));   
         $.ajax({
             type:'GET',
             url:urlNya + '/getcity/' + id,
             dataType:'json',
             success:function(data){
                var op = '<option value="">Pilih Kota</option>';
                if(data.length > 0) {
                var i = 0;
                for(i = 0; i < data.length; i++) {
                    op += `<option value="${data[i].city_id}">${data[i].title}</option>`
                }
                }
                toHtml('[name="cities_id"]', op);
             }
         })

 });
</script>
@endsection