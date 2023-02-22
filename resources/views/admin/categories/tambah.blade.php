@extends('admin.layout.app')
@section('content')
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                </span> Kategori </h3>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col">
                      <h4 class="card-title">Tambah Kategori</h4>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('admin.categories.store') }}" method="POST">
                                @csrf
                                <div class="form-floating">
                                  <input type="text" class="form-control" name="name" id="firstnamefloatingInput" placeholder="Nama Kategori">
                                  <label for="firstnamefloatingInput">Nama Kategori</label>
                              </div>
                                <div class="text-right pt-3">
                                    <button type="submit" class="btn btn-success text-right">Simpan</button>
                                    <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-primary">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
@endsection
