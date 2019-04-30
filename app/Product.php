<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'price', 'content'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
