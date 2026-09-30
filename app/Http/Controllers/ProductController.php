<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Maincat;
use App\Models\Subcat1;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ProductController extends Controller
{
  //رفتن به ادمین با محصولات
  public function home(){
        $product =  Product::all();
      return view('home',['products'=>$product]);
  }

     public function product(){
        $product =  Product::all();
        $subcat1 =  Subcat1::all();
        $maincat =  Maincat::all();
        return view('product',['products'=>$product,'maincats'=>$maincat,'subcat1s'=>$subcat1]);
    }

          public function insertProduct(Request $request){
                       $request->validate([
       
        'productaks' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000000',
    ]);

      $imageName = time().'.'.$request->productaks->extension();
    $request->productaks->move(public_path('images'), $imageName);

            $product =  new product();
              $product -> productaks =  'images/'.$imageName;
             $product -> subcat1_id = $request ->subcat1_id ;
            $product -> productname = $request ->productname;
            $product -> productghimat = $request ->productghimat;
            $product -> producttozihat= $request ->producttozihat;
            $product ->save(); 

             return back()->withErrors(['msg' => 'دبا موفقیت ثبت شد']);
        } 
  
   public function productdel($id){
            $product = product::find($id);
            File::delete($product->productaks);
            $product->delete();
return back()->withErrors(['msg' => '  با موفقیت حذف شد']);
} 


       public function productup($id){
        $product = product::find($id);
        
    return view('productup',['products'=>$product]);
    
    }
       public function productup2(Request $request){
        //ابدیت قیمتها
     $product = product::find($request->id);
     $product->productghimat=$request->productghimat;
     $product -> save();
return back()->withErrors(['msg' => 'The Message']);

   }

   
       public function producttakhfif($id){
        $product = product::find($id);
        
    return view('producttakhfif',['products'=>$product]);
    
    }
       public function producttakhfif2(Request $request){
        //ابدیت قیمتها
     $product = product::find($request->id);
     $product->productghimat=$request->productghimat;
     $product->productghimatghabl=$request->productghimatghabl;
     $product -> save();
return back()->withErrors(['msg' => 'The Message']);

   }

       public function producttozihat($id){
        $product= product::find($id);
    return view('productt',['products'=>$product]);
    
    }
       public function producttozihat2(Request $request){
        //ابدیت توضیحات
     $product = product::find($request->id);
     $product->producttozihat=$request->producttozihat;
    
     $product -> save();
return back()->withErrors(['msg' => 'The Message']);

   }

        public function mojod(Request $request){
          //کلید به معنی موجود بودن محصول
        $product = Product::find($request->code);
        $m = $product->productmojodi;
        $m=1;
        $product->productmojodi = $m;
        $product->save();
          return ["موجود شد"];
    
    }
      public function namojod(Request $request){
        $product = Product::find($request->code);
        $m = $product->productmojodi;
        $m=0;
        $product->productmojodi = $m;
        $product->save();
          return ["موجودی اتمام "];
    
    }


     public function jadid(){
  if (Session::has('catId')) {
   $catId = Session::get('catId');
  //برای نشان دادن به ترتیب ارزانی با استفاده از ایژکس
     $products = Product::orderBy('id','desc')->where('subcat1_id',$catId)->paginate(2);
    
    }
    else{
     $products = Product::orderBy('id','desc')->paginate(2);

    } // $x= $request->search;
    //  $products = Product::where('productname','like',"%$x%")->get();
    // dd($products);
     $h="";
     foreach($products as $product)   
{
        $h.=" <a href='/singleproduct/$product->id' class=' bg-white rounded-xl shadow-box hover:drop-shadow-lg transition px-4 py-4'>
            <img class='mx-auto' src='"."http://localhost:8000/".$product->productaks."' alt=''>
            <div class='text-zinc-600 text-sm'>
             $product->productname
            </div>
            <div class='flex items-start justify-end gap-x-1 text-xs text-zinc-500 mt-3'>
              <span>
                4.8
              </span>
              <svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' fill='#f9bc00' viewBox='0 0 256 256'><path d='M234.5,114.38l-45.1,39.36,13.51,58.6a16,16,0,0,1-23.84,17.34l-51.11-31-51,31a16,16,0,0,1-23.84-17.34L66.61,153.8,21.5,114.38a16,16,0,0,1,9.11-28.06l59.46-5.15,23.21-55.36a15.95,15.95,0,0,1,29.44,0h0L166,81.17l59.44,5.15a16,16,0,0,1,9.11,28.06Z'></path></svg>
            </div>
            <div class='flex justify-between items-center mt-3'>
              <div class='bg-red-500 rounded-full px-2 py-1 text-white flex items-center gap-x-1 text-xs'>
                10%
              </div>";
               if($product->productmojodi!=0)
             $h.=" <div class='flex justify-center gap-x-1 text-sm text-zinc-700'>
                <div>$product->productghimat</div>
                <div>تومان</div>
              </div>";
              
              if($product->productmojodi!=1)
                $h.="<div class='text-xs text-red-400'>
                  ناموجود
                </div>";
                
            $h.="</div>
          </a>";
 }

   
       return response()->json(['data' => $h ]);
    
}

 public function arzan(){
  if (Session::has('catId')) {
   $catId = Session::get('catId');
  //برای نشان دادن به ترتیب ارزانی با استفاده از ایژکس
     $products = Product::orderBy('productghimat','asc')->where('subcat1_id',$catId)->paginate(2);
    
    }
    else{
     $products = Product::orderBy('productghimat','asc')->paginate(2);

    } // $x= $request->search;
    //  $products = Product::where('productname','like',"%$x%")->get();
    // dd($products);
     $h="";
     foreach($products as $product)   
{
        $h.=" <a href='/singleproduct/$product->id' class=' bg-white rounded-xl shadow-box hover:drop-shadow-lg transition px-4 py-4'>
            <img class='mx-auto' src='"."http://localhost:8000/".$product->productaks."' alt=''>
            <div class='text-zinc-600 text-sm'>
             $product->productname
            </div>
            <div class='flex items-start justify-end gap-x-1 text-xs text-zinc-500 mt-3'>
              <span>
                4.8
              </span>
              <svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' fill='#f9bc00' viewBox='0 0 256 256'><path d='M234.5,114.38l-45.1,39.36,13.51,58.6a16,16,0,0,1-23.84,17.34l-51.11-31-51,31a16,16,0,0,1-23.84-17.34L66.61,153.8,21.5,114.38a16,16,0,0,1,9.11-28.06l59.46-5.15,23.21-55.36a15.95,15.95,0,0,1,29.44,0h0L166,81.17l59.44,5.15a16,16,0,0,1,9.11,28.06Z'></path></svg>
            </div>
            <div class='flex justify-between items-center mt-3'>
              <div class='bg-red-500 rounded-full px-2 py-1 text-white flex items-center gap-x-1 text-xs'>
                10%
              </div>";
               if($product->productmojodi!=0)
             $h.=" <div class='flex justify-center gap-x-1 text-sm text-zinc-700'>
                <div>$product->productghimat</div>
                <div>تومان</div>
              </div>";
              
              if($product->productmojodi!=1)
                $h.="<div class='text-xs text-red-400'>
                  ناموجود
                </div>";
                
            $h.="</div>
          </a>";
 }

   
       return response()->json(['data' => $h ]);
    
}

   public function geran(){
     if (Session::has('catId')) {
    $catId = Session::get('catId');
  //برای نشان دادن به ترتیب  با استفاده از ایژکس
    
    $products = Product::orderBy('productghimat','desc')->where('subcat1_id',$catId)->paginate(2);
     }
    
    else{
     $products = Product::orderBy('productghimat','desc')->paginate(2);
     }
     $h="";
     foreach($products as $product)   
{
        $h.=" <a href='/singleproduct/$product->id' class=' bg-white rounded-xl shadow-box hover:drop-shadow-lg transition px-4 py-4'>
            <img class='mx-auto' src='"."http://localhost:8000/".$product->productaks."' alt=''>
            <div class='text-zinc-600 text-sm'>
             $product->productname
            </div>
            <div class='flex items-start justify-end gap-x-1 text-xs text-zinc-500 mt-3'>
              <span>
                4.8
              </span>
              <svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' fill='#f9bc00' viewBox='0 0 256 256'><path d='M234.5,114.38l-45.1,39.36,13.51,58.6a16,16,0,0,1-23.84,17.34l-51.11-31-51,31a16,16,0,0,1-23.84-17.34L66.61,153.8,21.5,114.38a16,16,0,0,1,9.11-28.06l59.46-5.15,23.21-55.36a15.95,15.95,0,0,1,29.44,0h0L166,81.17l59.44,5.15a16,16,0,0,1,9.11,28.06Z'></path></svg>
            </div>
            <div class='flex justify-between items-center mt-3'>
              <div class='bg-red-500 rounded-full px-2 py-1 text-white flex items-center gap-x-1 text-xs'>
                10%
              </div>";
               if($product->productmojodi!=0)
             $h.=" <div class='flex justify-center gap-x-1 text-sm text-zinc-700'>
                <div>$product->productghimat</div>
                <div>تومان</div>
              </div>";
              
              if($product->productmojodi!=1)
                $h.="<div class='text-xs text-red-400'>
                  ناموجود
                </div>";
                
            $h.="</div>
          </a>";
 }

   
       return response()->json(['data' => $h ]);
    
}

public function mojodiha(){

     $products =  Product::all();    
     $h="";
     foreach($products as $product)
      if($product->productmojodi==1)   
{

        $h.=" <a href='/singleproduct/$product->id' class=' bg-white rounded-xl shadow-box hover:drop-shadow-lg transition px-4 py-4'>
            <img class='mx-auto' src='"."http://localhost:8000/".$product->productaks."' alt=''>
            <div class='text-zinc-600 text-sm'>
             $product->productname
            </div>
            <div class='flex items-start justify-end gap-x-1 text-xs text-zinc-500 mt-3'>
              <span>
                4.8
              </span>
              <svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' fill='#f9bc00' viewBox='0 0 256 256'><path d='M234.5,114.38l-45.1,39.36,13.51,58.6a16,16,0,0,1-23.84,17.34l-51.11-31-51,31a16,16,0,0,1-23.84-17.34L66.61,153.8,21.5,114.38a16,16,0,0,1,9.11-28.06l59.46-5.15,23.21-55.36a15.95,15.95,0,0,1,29.44,0h0L166,81.17l59.44,5.15a16,16,0,0,1,9.11,28.06Z'></path></svg>
            </div>
            <div class='flex justify-between items-center mt-3'>
              <div class='bg-red-500 rounded-full px-2 py-1 text-white flex items-center gap-x-1 text-xs'>
                10%
              </div>";
               if($product->productmojodi!=0)
             $h.=" <div class='flex justify-center gap-x-1 text-sm text-zinc-700'>
                <div>$product->productghimat</div>
                <div>تومان</div>
              </div>";
              
              if($product->productmojodi!=1)
                $h.="<div class='text-xs text-red-400'>
                  ناموجود
                </div>";
                
            $h.="</div>
          </a>";

 }

   
       return response()->json(['data' => $h ]);
    
}

  public function searcha(Request $request){
      $query = $request->input('s');
     $products = Product::where('productname','like',"%$query%")->get();
       $s1="";
     foreach($products as $product)
  {
          $s1.=" <div class='mb-8 px-5' >

                    <div class='swiper search-result-desktop'>
                      <div class='swiper-wrapper grid grid-cols-1 lg:grid-cols-3 gap-2'>
                        <div>
                          <a
                            href='/singleproduct/$product->id'
                            class='flex items-center gap-x-2 rounded-xl border border-gray-100 px-4 py-2 text-zinc-500 hover:border-gray-200'
                          >
                            <img
                              src='$product->productaks'
                              alt=''
                              class='w-16'
                            />
                            <p class='line-clamp-2 text-sm'>
                              $product->productname  
                            </p>
                          </a>
                        </div>

                      </div>
                    </div>
                  </div>";

         }        
        return response()->json(['data' => $s1 ]);
  }


  public function search1(Request $request){
    $subcat1s =  Subcat1::all();
    $products = Product::latest()->paginate(2);

        if($request->ajax())
        {
            $view = view('shop.testttt2',compact('products'))->render();

            return response()->json(['html'=>$view],200);
        }
        
        return view('shop.search',compact('products','subcat1s'));
    

  }

}