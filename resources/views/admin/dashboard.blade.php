@extends('admin.layout.app')
@section('content')

<div class="container-fluid">
  <div class="row mb-3 pb-1">
    <div class="col-12">
        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-16 mb-1">Halo {{Auth::user()->name}}</h4>
                <p class="text-muted mb-0">Here's what's happening with your store
                    today.</p>
            </div>
        </div><!-- end card header -->
    </div>
    <!--end col-->
</div>
<div class="row">
  <div class="col-xl-4 col-md-4">
      <!-- card -->
      <div class="card card-animate">
          <div class="card-body">
              <div class="d-flex align-items-center">
                  <div class="flex-grow-1 overflow-hidden">
                      <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                        Pendapatan</p>
                  </div>
              </div>
              <div class="d-flex align-items-end justify-content-between mt-4">
                  <div>
                      <h4 class="fs-22 fw-semibold ff-secondary mb-4">Rp. <span class="counter-value" data-target="{{$pendapatan->penghasilan}}">{{ number_format($pendapatan->penghasilan,2,',','.') }}</span>
                      </h4>

                  </div>
                  <div class="avatar-sm flex-shrink-0">
                      <span class="avatar-title bg-soft-primary rounded fs-3">
                          <i class="bx bx-dollar-circle text-primary"></i>
                      </span>
                  </div>
              </div>
          </div><!-- end card body -->
      </div><!-- end card -->
  </div><!-- end col -->

  <div class="col-xl-4 col-md-4">
      <!-- card -->
      <div class="card card-animate">
          <div class="card-body">
              <div class="d-flex align-items-center">
                  <div class="flex-grow-1 overflow-hidden">
                      <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                          Transaksi</p>
                  </div>
              </div>
              <div class="d-flex align-items-end justify-content-between mt-4">
                <div>
                  <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{$transaksi->count()}}">{{ $transaksi->count()}}</span>
                  </h4>

              </div>
                  <div class="avatar-sm flex-shrink-0">
                      <span class="avatar-title bg-soft-primary rounded fs-3">
                          <i class="bx bx-shopping-bag text-primary"></i>
                      </span>
                  </div>
              </div>
          </div><!-- end card body -->
      </div><!-- end card -->
  </div><!-- end col -->

  <div class="col-xl-4 col-md-4">
      <!-- card -->
      <div class="card card-animate">
          <div class="card-body">
              <div class="d-flex align-items-center">
                  <div class="flex-grow-1 overflow-hidden">
                      <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                          Pelanggan</p>
                  </div>
              </div>
              <div class="d-flex align-items-end justify-content-between mt-4">
                  <div>
                      <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{ $pelanggan->total_user }}">{{ $pelanggan->total_user }}<span>
                      </h4>
                  </div>
                  <div class="avatar-sm flex-shrink-0">
                      <span class="avatar-title bg-soft-primary rounded fs-3">
                          <i class="bx bx-user-circle text-primary"></i>
                      </span>
                  </div>
              </div>
          </div><!-- end card body -->
      </div><!-- end card -->
  </div><!-- end col -->

</div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Transaksi Terbaru</h4>
                    <div class="table-responsive">
                      <table class="table table-nowrap table-striped-columns">
                        <thead>
                            <tr>
                              <th> Invoice </th>
                              <th> Pemesan </th>
                              <th> Subtotal </th>
                              <th> Status Pesanan </th>
                              <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($order_baru as $order)
                            <tr>
                              <td>{{ $order->invoice }}</td>
                              <td>{{ $order->nama_pemesan }}</td>
                              <td>{{ $order->subtotal + $order->biaya_cod }}</td>
                              <td>{{ $order->name }}</td>
                              <td> <a href="{{ route('admin.transaksi.detail',['id'=>$order->id]) }}" class="btn btn-warning btn-sm">Detail</a></td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection