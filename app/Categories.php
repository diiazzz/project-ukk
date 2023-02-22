<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $table = 'categories';
    protected $fillable = ['name'];


    public function produk()
    {
        return $this->hasMany(Product::class, 'categories_id');
    }
}
