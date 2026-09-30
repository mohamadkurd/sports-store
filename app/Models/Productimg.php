<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productimg extends Model
{
     public function Product()
    {
   return $this->belongsTo(Product::class);
    }
}
