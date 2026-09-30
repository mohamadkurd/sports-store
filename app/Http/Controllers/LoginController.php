<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login2(){
        //لاگ اوت شدن و رفتن به صفحه لاگین
        Auth::logout();
        return view('shop.login2');
    }

    public function login3(Request $request){
          ///لاگین شدن و رفتن به صفحه بروفایل
            //   $users = User::where('email',$request ->email)->get();
          
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
           //  dd(Auth::user()->id);
            //$user->session()->regenerate();

            return Redirect()->route('profile');
        } 

        return back()->withErrors([
            'email' => 'THE PROVIDED'
        ])->onlyInput('email');
    }
}
