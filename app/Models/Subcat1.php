<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcat1 extends Model
{
    
    public function maincat()
    {
        return $this->belongsTo(maincat::class);
        return $this->hasMany(product::class);
    }
}
