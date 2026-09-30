<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     public function subcat1()
    {
   return $this->belongsTo(Subcat1::class);
   return $this->hasMany(productimg::class);
   return $this->hasMany(productrang::class);
   return $this->hasMany(Size::class);
   return $this->hasMany(Sabad::class);
   return $this->hasMany(Nazar::class);
    }
}
