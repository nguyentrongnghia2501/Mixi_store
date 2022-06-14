<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('admin.user.login',[
           'title'=>'Đăng nhập hệ thống Quản trị vnc'

        ]);
    }
    public function store(Request $request){
                   // dd($request->all());
                   $request->validate([
                       'email' => 'required|email:filter',
                       'password' => 'required',
                   ]);
               // if(Auth::attempt([

               //     'email'=>$request ->input('email'),
               //     'password'=>$request ->input('password'),
               //     //kt
               // ])
                   if(Auth::attempt([
                       'email'=>$request ->input('email'),
                       'password'=>$request ->input('password'),
                   ])){
                           return redirect()->route('admin');
                   }
                   Session::flash('error','email hoặc password không chính xác');
                   return redirect()->back();

    }
}
