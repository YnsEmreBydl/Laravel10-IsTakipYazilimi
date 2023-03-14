<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function register(){
      return view('admin.register');
    }

    public function registerpost(Request $request){
      $adminler = User::create([
        'adsoyad' => $request->adsoyad,
        'email' => $request->email,
        'sifre' => Hash::make($request->sifre)
      ]);

      auth()->login($adminler);

      return redirect()->route('login');
    }

    public function login(){
        if(request()->isMethod('POST'))
        {
          $this->validate(request(),[
            'email'=>'required|email',
            'sifre'=>'required'
          ]);

          $credentials = [
            'email'=>request()->get('email'),
            'password'=>request()->get('sifre')
          ];
          if(auth()->attempt($credentials, request()->has('benihatirla')))
          {
                return redirect()->route('home');
          }else{
            return back()->withInput()->withErrors(['email'=>'Mail adresi Yanlış']);
          }
        }
        return view('admin.login');
    }

    public function cikis(){
      auth()->logout();
      request()->session()->flush();
      request()->session()->regenerate();

      return redirect()->route('login');
    }
}
