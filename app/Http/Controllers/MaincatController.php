<?php

namespace App\Http\Controllers;

use App\Models\Facktour;
use Illuminate\Support\Facades\File;
use App\Models\maincat;

use Illuminate\Http\Request;


class MaincatController extends Controller
{
      public function maincat(){
        $maincat =  maincat::all();
        return view('maincat',['maincats' => $maincat]);
    }

    
          public function insertMaincat(Request $request){
             $request->validate([
       
        'maincatimg' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000000',
    ]);
   
       $imageName = time().'.'.$request->maincatimg->extension();
    $request->maincatimg->move(public_path('images'), $imageName);
    
            $maincat =  new maincat();
            $maincat -> maincatname = $request ->maincatname;
            $maincat -> maincatimg =  'images/'.$imageName;
            $maincat ->save(); 

             return back()->withErrors(['msg' => 'دسته اصلی با موفقیت ثبت شد']);
        } 

 public function maincatdel($id){
            $maincat = maincat::find($id);
            File::delete($maincat->maincatimg);
            $maincat->delete();
return back()->withErrors(['msg' => 'دسته اصلی با موفقیت حذف شد']);
}



        public function maincatup($id){
        $maincat = maincat::find($id);
        
    return view('maincatup',['maincats'=>$maincat]);
    
    }
   public function maincatup2(Request $request){
     $maincat = maincat::find($request->id);
     File::delete($maincat->maincatimg);

 $request->validate([
   
        'maincatimg' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000000',
    ]);
       $imageName = time().'.'.$request->maincatimg->extension();
    $request->maincatimg->move(public_path('images'), $imageName);
    

     $maincat->maincatname=$request->maincatname;
    $maincat -> maincatimg = 'images/'.$imageName;
     $maincat -> save();
return back()->withErrors(['msg' => 'The Message']);
   }

  public function sefaresh(){
   ///نمایش سفارشات در پنل ادمین
        $facktours =  Facktour::all();
    
        return view('sefaresh',compact(['facktours']));
    }


}