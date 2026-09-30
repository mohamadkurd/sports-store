<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Productimg;
use App\Models\Maincat;
use App\Models\Subcat1;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductimgController extends Controller
{
  
        public function productimg($id){
         ///امدن یه صفحه اضافه کردن عکس با ایدی محصول
        $productimg =  Productimg::where('product_id',$id)->get();
        $product =  Product::where('id',$id)->get();
        $subcat1 =  Subcat1::all();
        $maincat =  Maincat::all();
        return view('productimg',['productimgs'=>$productimg ,'products'=>$product,'maincats'=>$maincat,'subcat1s'=>$subcat1]);
    }

    
          public function insertproductimg(Request $request){
             //////افزودن عکس های جدید به یک محصول 
             $request->validate([
       
         'img1' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000000',
    
    ]);

      $imageName = time().'.'.$request->img1->extension();
    $request->img1->move(public_path('images'), $imageName);
    
    

            $productimg =  new productimg();
            $productimg -> img1 =  'images/'.$imageName;
            $productimg -> product_id = $request ->product_id ;
            $productimg ->save(); 

             return back()->withErrors(['msg' => 'دسته اصلی با موفقیت ثبت شد']);
        } 
          public function productimgdel($id){
            $productimg = productimg::find($id);
            File::delete($productimg->img1);
            $productimg->delete();
return back()->withErrors(['msg' => '  با موفقیت حذف شد']);
}
}
