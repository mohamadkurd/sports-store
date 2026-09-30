<?php

namespace App\Http\Controllers;

use App\Models\Maincat;
use App\Models\Product;
use App\Models\Sabad;
use App\Models\Subcat1;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class SabadController extends Controller
{
     public function sabad(Request $request){
             if(Auth::check()) { 
            $sabad =  new Sabad();
            $sabad -> product_id = $request -> product_id ;
            $sabad -> productsize = $request -> productsize ?? 0 ;
            $sabad -> productrang = $request -> productrang ?? 0 ;
            $sabad -> user_id = Auth::user()->id; 
            $sabad ->save(); 

             return back()->withErrors(['msg' => '   شد']);
             }
             return view('shop.login2');
        } 

    public function cart($id){
        $sabad =  Sabad::where('user_id',$id)->where('status',0)->get();
        
        $product =  Product::all();
        
        return view('shop.cart',['sabads'=>$sabad ,'products'=>$product]);



}

     public function ziad(Request $request){
      /*
زیاد کردن تعداد محصول در سبد با استفاده از ایژکس
      */
        $sabad = sabad::find($request->code);

        $t = $sabad->tedad;
        
        $t++;
        $sabad->tedad = $t;
        $sabad->save();
        $sabads = Sabad::where('user_id',Auth::user()->id)->where('status',0)->get();
        $s = 0;
        foreach($sabads as $sabad1)
            {
               $s += $sabad1->product->productghimat*$sabad1->tedad;
            }
      return ['kol'=>$s];
    
    }
      public function kam(Request $request){
        $sabad = sabad::find($request->code);
        $t = $sabad->tedad;
        $t--;
         if ($t < 1) {
        $t = 1; // اگر مقدار فعلی کمتر از ۱ بود، آن را ۱ قرار بده
        }
        $sabad->tedad = $t;
        $sabad->save();
        $sabads = Sabad::where('user_id',Auth::user()->id)->where('status',0)->get();
        $s = 0;
        foreach($sabads as $sabad1)
            {
               $s+= $sabad1->product->productghimat*$sabad1->tedad;
            }
      return ['kol'=>$s];
    
    }
      
     public function sabaddel($id){
        $sabad = sabad::find($id);
         $sabad->delete();
          return back();
     }




   //نمایش سبد  برای ادمین 
     public function nemayeshsabad($id){
        $sabads =  Sabad::where('facktour_id',$id)->get();
  
        return view('nemayeshsabad',['sabads'=>$sabads ]);
}
}
