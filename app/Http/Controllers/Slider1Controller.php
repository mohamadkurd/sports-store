<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Slider1;
use Illuminate\Http\Request;

class Slider1Controller extends Controller
{
      public function slider(){
        $slider =  Slider1::all();
        return view('slider',['sliders' => $slider]);
    }
    

          public function insertSlider(Request $request){
             $request->validate([
       
        'aks' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000000',
    ]);
   
       $imageName = time().'.'.$request->aks->extension();
    $request->aks->move(public_path('images'), $imageName);
    
            $slider =  new Slider1();
            $slider -> matn = $request ->matn;
            $slider -> etc = $request ->etc;
            $slider -> aks =  'images/'.$imageName;
            $slider ->save(); 

             return back()->withErrors(['msg' => '  با موفقیت ثبت شد']);
        } 

         public function sliderdel($id){
            $slider = slider1::find($id);
            File::delete($slider->aks);
            $slider->delete();
return back()->withErrors(['msg' => ' با موفقیت حذف شد']);
}
    }