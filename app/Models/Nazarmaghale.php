<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nazarmaghale extends Model
{
    public function Maghale()
    {
   return $this->belongsTo(Maghale::class);
    }
}
