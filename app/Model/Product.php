<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'name', 'detail', 'stock', 'price', 'discount'
    ];
    // A product can have may reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
