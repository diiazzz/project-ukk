@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Tambah Produk
            </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <h4 class="card-title">Tambah Produk</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('admin.product.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
									<div class="form-floating mt-1">
										<input type="text" class="form-control" required name="name" id="firstnamefloatingInput" placeholder="Nama Produk">
										<label for="firstnamefloatingInput">Nama Produk</label>
									</div>
									<div class="form-floating mt-1">
										<select class="form-control" class="form-control" id="firstnamefloatingInput1" placeholder="Nama Kategori" name="categories_id"
											id="exampleFormControlSelect2">
											@foreach ($categories as $categorie)
												<option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
											@endforeach
										</select>
										<label for="firstnamefloatingInput1">Pilih Kategori</label>
									</div>

									<div class="form-floating mt-1">
										<input type="number" class="form-control" required name="weigth" id="firstnamefloatingInput2" placeholder="Berat (gram)">
										<label for="firstnamefloatingInput2">Berat (gram)</label>
									</div>

									<div class="form-floating mt-1">
										<input type="number" class="form-control" required name="price" id="firstnamefloatingInput3" placeholder="Harga">
										<label for="firstnamefloatingInput3">Harga</label>
									</div>

									<div class="form-floating mt-1">
										<input type="number" class="form-control" required name="stok" id="firstnamefloatingInput4" placeholder="Stok">
										<label for="firstnamefloatingInput4">Stok</label>
									</div>
									
									<div class="form-floating mt-1">
										<textarea name="description" id="" cols="30" rows="10" class="form-control"  id="firstnamefloatingInput5" required></textarea>
										<label for="firstnamefloatingInput5">Deskripsi</label>
									</div>
									<div class="form-control mt-1">
										<input required type="file" name="image" class="form-control">
									</div>
									<div class="text-right mt-3">
										<button type="submit"
											class="bg-success btn btn-success text-right">Simpan</button>
										<a href="javascript:void(0)" onclick="window.history.back()"
											class="btn btn-primary">Kembali</a>

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

@section('js')
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        success: '#1bcfb4',
                    }
                }
            }
        }
    </script>
@endsection
