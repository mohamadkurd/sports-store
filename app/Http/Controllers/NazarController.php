<?php

namespace App\Http\Controllers;
use App\Models\Maincat;
use App\Models\Product;
use App\Models\Nazar;
use App\Models\Nazarmaghale;
use App\Models\Productimg;
use App\Models\Sabad;
use App\Models\Subcat1;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class NazarController extends Controller
{
    public function nazar(Request $request){
             //نظر گذاشتن توست یوزر
            $nazar =  new Nazar();
            $nazar -> product_id = $request -> product_id ;
            $nazar -> nazar = $request -> nazar ;
            $nazar -> user_id = Auth::user()->id ;
            $nazar ->save(); 
        
              return back()->withErrors(['msg' => '   شد']);
        }  

      public function nazarha(){
//////نمایش نظر هایی که گذاشته در بروفایل کاربر 
                        //چک کردن لاگین بودن اگر لاگین بود نظرها را نمایش سبد 
        $nazars =  Nazar::where('user_id',Auth::user()->id)->get();

       return view('shop.nazarha',compact('nazars')); 
}


public function nazar1(){
   /////نمایش نظر ها در ادمین
        $nazars =  Nazar::all();
        
        return view('nazar1',compact(['nazars']));
    }
      public function ok(Request $request){
        ///تایید کردن نظر
        $nazar = Nazar::find($request->code);
        $m=1;
        $nazar->status = $m;
        $nazar->save();
          return ["نظر تایید شد"];
    
    }
      public function no(Request $request){
        $nazar = Nazar::find($request->code);
        $m=0;
        $nazar->status = $m;
        $nazar->save();;
          return [" نظر رد شد "];
    
    }
 
}