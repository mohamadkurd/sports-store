<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Unique;

class RegisterController extends Controller
{
     public function loginRegister(){
      //نمایش صفحه ثبت نام
        return view('shop.login-register');
    }

       public function Register(Request $request){
         //بر کردن فرم ثبت نام توست کاربر
          $request->validate([
         //'password' => bcrypt($request->validate('password')),
          'name' => ['required', 'min:2',' max:255'],
          'email' => ['required'],
          'password' => ['required', 'min:6',' max:255'],
           
          ]);
              $users =  new User();
              $users -> name = $request ->name ;
              $users -> email = $request ->email ;
              $users -> password = $request ->password;
              $users ->save(); 
      
         return Redirect()->route('login');
        } 

}

