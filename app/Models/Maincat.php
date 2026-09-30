<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maincat extends Model
{
     public function subcat1s(){
        return $this->hasMany(subcat1::class);
    }
}
