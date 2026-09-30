<?php

namespace App\Http\Controllers;

use App\Models\Facktour;
use App\Models\Maincat;
use App\Models\Subcat1;
use App\Models\Sabad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacktourController extends Controller
{
   public function facktour(){
        //نمایش فرم فاکتور بعد سبد و قبل برداخت
        $subcat1s =  Subcat1::all();
        $maincats =  Maincat::all();
        $sabads = Sabad::where('user_id',Auth::user()->id)->where('status',0)->get();
        $s = 0;
        foreach($sabads as $sabad1)
            {
               $s+= $sabad1->product->productghimat*$sabad1->tedad;
            }
        return view('shop.facktour',compact('s','sabads','subcat1s','maincats'));
      
    }
      public function facktourinsert(Request $request){

        $request->validate([
          'nam' => ['required', 'min:2',' max:255'],
          'famil' => ['required', 'min:2',' max:255'],
          'ostan' => ['required', 'min:2',' max:255'],
          'shahr' => ['required', 'min:2',' max:255'],
          'khiabankoche' => ['required', 'min:2',' max:255'],
          'phone' => ['required', 'min:2',' max:255'],
          'codposti' => [ ' max:255'],
          'tozihat' => [ ' max:500'],
           
          ]);
             //برکردن فرم فاکتور توسظ کاربر
            $facktour =  new Facktour();
            $facktour -> user_id = Auth::user()->id ;
            $facktour -> nam = $request ->nam ;
            $facktour -> famil = $request ->famil ;
            $facktour -> ostan = $request ->ostan ;
            $facktour -> shahr = $request ->shahr ;
            $facktour -> khiabankoche = $request ->khiabankoche ;
            $facktour -> phone = $request ->phone ;
            $facktour -> codposti = $request ->codposti ;
            $facktour -> tozihat = $request ->tozihat;
            $facktour -> mablaghkol = $request ->kol1;
      
            $facktour ->save(); 
            
           
        return back()->withErrors(['msg' => '  با موفقیت  شد']);
        } 
}