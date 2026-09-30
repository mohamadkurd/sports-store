<?php

namespace App\Http\Controllers;

use App\Models\Maghale;
use Illuminate\Support\Facades\File;
use App\Models\maincat;
use App\Models\Nazar;
use App\Models\Subcat1;
use App\Models\Product;
use App\Models\Productimg;
use App\Models\Productrang;
use App\Models\Sabad;
use App\Models\Size;
use App\Models\Slider1;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    
      public function index(){
        $sliders =  Slider1::all();
        $products =  Product::limit(5)->get();

        $maghales  =  Maghale::limit(5)->get();
        $subcat1s =  Subcat1::all();

       // $id=Auth::user()->id;

        // return view('shop.index',['products'=>$product,'maincats'=>$maincat,'subcat1s'=>$subcat1,'sliders' => $slider]);
        return view('shop.index',compact('sliders','products','maghales','subcat1s'));// ['products'=>$product,'maincats'=>$maincat,'subcat1s'=>$subcat1,'sliders' => $slider]);

}


 public function search1(){
     //نمایش محصولات در صفحه سرچ
      Session::forget('catId');
        $products =  Product::paginate(2);
        $subcat1s =  Subcat1::all();
   
       
        return view('shop.search',compact('products','subcat1s'));
    }

 public function search($id){
   
   
     //نمایش محصولات بر اساس دسته فرعی مثلا نمایش فقط کفش ها 
        Session::put('catId', $id);
        $products = Product::where('subcat1_id',$id)->paginate(2);
 $subcat1s =  Subcat1::all();
        return view('shop.search',compact('products','subcat1s'));
    }

public function singleproduct($id){
     // نمایش یک محصول در سینگل 
        $products = Product::where('id',$id)->get();
        
        $sabads=[];
        if(Auth::check())  //چک کردن لاگین بودن اگر لاگین بود نمایش سبد 
             $sabads =  Sabad::where('user_id',Auth::user()->id)->get();
        $productimgs = Productimg::where('product_id',$id)->get();//نمایش عکسها
        $sizes =  Size::where('product_id',$id)->get();//نمایش سایز ها
        $nazars =  Nazar::where('product_id',$id)->get();//نمایش نظرها
        $productrangs =  Productrang::where('product_id',$id)->get();//نمایش رنگ ها
        return view('shop.single-product',compact('nazars','sabads','productimgs','sizes','products','productrangs'));
    }

}