<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maghale extends Model
{
     public function Nazarmaghale(){
    return $this->hasMany(Nazarmaghale::class);
       
     }
}
