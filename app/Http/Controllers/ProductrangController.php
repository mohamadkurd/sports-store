<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Productrang;

use Illuminate\Http\Request;

class ProductrangController extends Controller
{
          public function productrang($id){
            //رفتن به صفحه رنگ ها با استفاده از ایدی محصول
        $productrang =  Productrang::where('product_id',$id)->get();
        $product =  Product::where('id',$id)->get();
       
        return view('productrang',['productrangs'=>$productrang ,'products'=>$product]);
    }

    
          public function insertproductrang(Request $request){
             //نوشتن رنگ ها 
            $productrang =  new Productrang();
            $productrang -> product_id = $request ->product_id ;
            $productrang -> rang = $request ->rang ;
            $productrang -> namerang = $request ->namerang ;
            $productrang ->save(); 

             return back()->withErrors(['msg' => 'دسته اصلی با موفقیت ثبت شد']);
        } 
         public function delproductrang($id){
            $productrang = Productrang::find($id);
            $productrang->delete();
return back()->withErrors(['msg' => '  با موفقیت حذف شد']);
}
}
