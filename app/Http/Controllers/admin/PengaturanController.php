<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Province;
use App\City;
use App\User;
use Illuminate\Support\Facades\Auth;
use Throwable;

class PengaturanController extends Controller
{
    public function aturalamat()
    {
        //cek apa alamat toko sudah di set atau belum
        $data['cekalamat'] = $cek = DB::table('alamat_toko')->count();

        //jika belum di setting maka ambil data provinsi untuk di tampilkan di form alamat
        if ($cek < 1) {
            $data['provinces'] = Province::all();
        } else {
            //jika sudah di setting maka tidak menampilkan form tapi tampilkan data alamat toko
            $data['alamat'] = DB::table('alamat_toko')
                ->join('cities', 'cities.city_id', '=', 'alamat_toko.city_id')
                ->join('provinces', 'provinces.province_id', '=', 'cities.province_id')
                ->select('alamat_toko.*', 'cities.title as kota', 'provinces.title as prov')->first();
        }

        // dd($data);
        return view('admin.pengaturan.alamat', $data);
    }
    public function getCity($id)
    {
        return City::where('province_id', $id)->get();
    }

    public function user()
    {
        $user = Auth::user();

        return view('admin.pengaturan.user', compact('user'));
    }

    public function updateUser(Request $request)
    {
        if ($request->file('image')) {
            
            //simpan image produk yang di upload ke direkteri public/storage/imageproduct
            $file = $request->file('image')->store('/user', 'public');
            // $request->image->move(public_path('storage'), $file);
            
            $request->merge([
                'foto' => $file
            ]);

        }
        
        
        
        $user = User::find($request->id);

        if(file_exists(public_path($user->foto)) && $user->foto != null){

            try{
                unlink(public_path($user->foto));

            } catch (Throwable $e){

            }
        }
        $user->update($request->only(['name', 'email', 'foto']));
        // User::create([
        //     'name'          => $request->name,
        //     'description'   => $request->description,
        //     'price'         => $request->price,
        //     'stok'          => $request->stok,
        //     'weigth'        => $request->weigth,
        //     'categories_id' => $request->categories_id,
        //     'image'         => $file
        
        // ]);
        // dd($file);
        
        return redirect()->route('admin.user');
    }

    public function ubahalamat($id)
    {
        //function untuk menampilkan form edit alamat
        $data['provinces'] = Province::all();
        $data['id'] = $id;
        return view('admin.pengaturan.ubahalamat', $data);
    }

    public function simpanalamat(Request $request)
    {
        //menyimpan alamat baru pada toko

        DB::table('alamat_toko')->insert([
            'city_id' => $request->cities_id,
            'detail'  => $request->detail
        ]);

        return redirect()->route('admin.pengaturan.alamat')->with('status', 'Berhasil Mengatur Alamat');
    }

    public function updatealamat($id, Request $request)
    {

        //mengupdate alamat toko
        DB::table('alamat_toko')
            ->where('id', $id)
            ->update([
                'city_id' => $request->cities_id,
                'detail'  => $request->detail
            ]);

        return redirect()->route('admin.pengaturan.alamat')->with('status', 'Berhasil Mengubah Alamat');
    }
}
