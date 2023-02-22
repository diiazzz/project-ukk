<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class PengaturanController extends Controller
{
    public function user()
    {
        $user = Auth::user();

        return view('user.user', compact('user'));
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
            // return $user->foto;
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
        
        return redirect()->route('user.index');
    }

}
