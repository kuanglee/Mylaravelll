<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    //
    public function login(Request $request){
      $username =  $request['username'];
      $password =  $request['password'];
      $data = array($username,$password);
      // $user = User::find(1);
      // if(Auth::login($user))
      // return view('thanhcong',['user'=>Auth::user()]);
      // else
      // return view('dangnhap',['error'=>'Đăng nhập thất bại']);
      $this->validate($request,
        ['email'=>'required',
          'password'=>'required|min:3|max:32',
        ],[
          'email.required'=>'Ban chua nhap name',
          'password.required'=>'Ban chua nhap password',
          'password.min'=>'Password khong duoc nho hon 3 ki tu ',
          'password.max'=>'Password khong duoc duoc lon hon 32 ki tu'
        ]);
      if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
          {
            return view('thanhcong',['user'=>Auth::user()]);
          }
      else
          {
            return view('dangnhap',['error'=>'Đăng nhập thất bại']);
          }
    }
    public function logout(){
      Auth::logout();
      return view('dangnhap');
    }
}
