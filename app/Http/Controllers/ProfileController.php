<?php

namespace App\Http\Controllers;

use App\Models\Facktour;
use App\Models\Sabad;
use App\Models\Maincat;
use App\Models\Subcat1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
     public function profile(){
      
        //نمایش سبدی که یوسرایدیش مثاوی ایدیه اون کاربریه که لاگین کرده
        $sabads =  Sabad::where('user_id',Auth::user()->id)->get();
        $facktours =  Facktour::where('user_id',Auth::user()->id)->get();
        $id=Auth::user()->id;
        //select
        return view('shop.profile',compact(['facktours','sabads','id']));
    }

}
