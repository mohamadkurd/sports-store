<?php

namespace App\Http\Controllers;

use App\Models\Nazarmaghale;
use Illuminate\Http\Request;

class NazarmaghaleController extends Controller
{
    public function nazarmaghale(Request $request){
             ////  فرم   برای نظر دادن مقاله
            $nazarm =  new Nazarmaghale();
            $nazarm-> maghale_id = $request -> maghale_id ;
            $nazarm -> nazar = $request -> nazar ;
            $nazarm -> username = $request -> username ;
            $nazarm->save(); 
        
              return back()->withErrors(['msg' => '   شد']);
        } 

        public function nazarm2(){
     // نمایش نظر مقاله در ادمین
        $nazarms =  Nazarmaghale::all();
    
        return view('nazarm2',compact(['nazarms']));
    }

          public function nmok(Request $request){
            // تایید نظر با ایژکس
        $nazarms = Nazarmaghale::find($request->code);
        $m=1;
        $nazarms->status = $m;
        $nazarms->save();
          return ["نظر تایید شد"];
    
    }
      public function nmno(Request $request){
        $nazarms = Nazarmaghale::find($request->code);
        $m=0;
        $nazarms->status = $m;
        $nazarms->save();;
          return [" نظر رد شد "];
    
    }
 
    
}