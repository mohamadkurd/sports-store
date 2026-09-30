<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Productimg;
use App\Models\Maincat;
use App\Models\Subcat1;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
           public function sizeproduct($id){
            //رفتن به صفحه سایز ها با استفاده از ایدی محصول
        $size =  Size::where('product_id',$id)->get();
        $product =  Product::where('id',$id)->get();
       
        return view('sizeproduct',['sizes'=>$size ,'products'=>$product]);
    }

    
          public function insertsize(Request $request){
             //نوشتن سایز ها 
            $size =  new Size();
            $size -> product_id = $request ->product_id ;
            $size -> size = $request ->size ;
            $size ->save(); 

             return back()->withErrors(['msg' => 'دسته اصلی با موفقیت ثبت شد']);
        } 
         public function sizedel($id){
            $size = Size::find($id);
            $size->delete();
return back()->withErrors(['msg' => '  با موفقیت حذف شد']);
}
}
