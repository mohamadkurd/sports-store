<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Maghale;
use App\Models\Nazarmaghale;
use Illuminate\Http\Request;

use App\Models\Maincat;
use App\Models\Product;
use App\Models\Sabad;
use App\Models\Subcat1;

use Illuminate\Support\Facades\Auth;

class MaghaleController extends Controller
{
     public function maghale(){
        $maghale =  Maghale::all();
        return view('maghale',['maghales' => $maghale]);
    }
    

          public function maghaleinsert(Request $request){
             $request->validate([
       
        'maghaleimg' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000000',
    ]);
   
       $imageName = time().'.'.$request->maghaleimg->extension();
    $request->maghaleimg->move(public_path('images'), $imageName);
    
            $maghale =  new Maghale();
            $maghale -> maghaletitle = $request -> maghaletitle;
            $maghale -> maghaletozihat = $request -> maghaletozihat;
            $maghale -> maghaleimg =  'images/'.$imageName;
            $maghale ->save(); 

             return back()->withErrors(['msg' => '  با موفقیت ثبت شد']);
        } 

         public function maghaledel($id){
            $maghale = Maghale::find($id);
            File::delete($maghale->maghaleimg);
            $maghale->delete();
return back()->withErrors(['msg' => '  با موفقیت حذف شد']);
}


//نمایش تک صفحه مقاله ها
public function singlemaghale($id){
              $maghale =  Maghale::where('id',$id)->get();
            
              $nazarmaghales = Nazarmaghale::where('maghale_id',$id)->where('status',1)->get();
              
            return view('shop.singlemaghale',['nazarmaghales'=>$nazarmaghales,'maghales' => $maghale]);
    }

     public function maghaleha(){
      //نمایش همه مقاله ها در صفحه مقاله ها
      
        $maghale =  Maghale::all();
        return view('shop.maghaleha',['maghales' => $maghale]);
    }
    }
