<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Maincat;
use App\Models\subcat1;
use App\Models\Product;
use Illuminate\Http\Request;

class Subcat1Controller extends Controller
{
    
      public function subcat1(){
        $subcat1 =  Subcat1::all();
        $maincat =  Maincat::all();
        return view('subcat1',['subcat1s' => $subcat1 ,'maincats'=>$maincat]);
    }

    
          public function insertSubcat1(Request $request){
                    $request->validate([
       
        'subcatimg' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000000',
    ]);
   
       $imageName = time().'.'.$request->subcatimg->extension();
    $request->subcatimg->move(public_path('images'), $imageName);

            $subcat1 =  new subcat1();
             $subcat1 -> maincat_id = $request ->maincat_id;
            $subcat1 -> subcat1name = $request ->subcat1name;
             $subcat1-> subcatimg =  'images/'.$imageName;
            $subcat1 ->save(); 

             return back()->withErrors(['msg' => '  با موفقیت ثبت شد']);
        } 

       
 public function subcat1del($id){
            $subcat1 = subcat1::find($id);
             File::delete($subcat1->subcatimg);
            $subcat1->delete();
return back()->withErrors(['msg' => '  با موفقیت حذف شد']);
} 

 public function main(Request $request){
        $X = $request->code;
        $subcat1 =  Subcat1::where('maincat_id',$X)->get();
        
        return $subcat1;
    }



}
