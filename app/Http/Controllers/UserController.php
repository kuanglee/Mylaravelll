<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{
    //
    public function getDanhSach(){
      $user = User::orderBy('id','desc')->get();
      return view('admin.user.danhsach',['user'=>$user]);

    }

    public function getThem(){
      return view('admin.user.them');
    }

    public function postThem(Request $request){
      $users = User::all();
      $this->validate($request,[
        'name' => 'bail|required',
        'email' => 'required|email',
        'password' => 'required|min:8|max:40',
        'password_2' => 'bail|required|same:password',
      ],[
        'name.required' => 'Yeu cau nhap name',
        'email.required' => 'Yeu cau nhap email',
        'email.email' => 'yeu cau nhap dung email',
        'password.required'=>'Ban chua nhap password',
        'password.min'=>'Password khong duoc nho hon 8 ki tu ',
        'password.max'=>'Password khong duoc duoc lon hon 32 ki tu',
        'password_2.required' => 'Yeu cau  Confirmation  password'
      ]);
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->quyen = $request->quyen;
      $array_user = array();
      foreach ($users as $key => $value) {
        $value->email = $array_user;
      }
      //echo var_dump($array_user);
      if(($request->password == $request->password_2)){
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('admin/user/them')->with('thongbao','Thêm thành công ');

      }
      else {
        return redirect('admin/user/them')->with('loi','Nhập lại Password ');
      }
    }

    public function getSua($id){
      $user = User::where('id','=',$id)->get();
      return view('admin.user.sua',['user'=>$user]);
      // $user = User::orderBy('id','desc')->get();
      // return view('admin.user.sua',['user'=>$user]);

    }

    public function postSua(Request $request , $id){
      $user = User::find($id);
      $this->validate($request,[
        'name' => 'bail|required',
        'password' => 'required|min:8|max:40',
        'password_2' => 'bail|required|same:password',
      ],[
        'name.required' => 'Yeu cau nhap name',
        'password.required'=>'Ban chua nhap password',
        'password.min'=>'Password khong duoc nho hon 8 ki tu ',
        'password.max'=>'Password khong duoc duoc lon hon 32 ki tu',
        'password_2.required' => 'Yeu cau  Confirmation  password'
      ]);

      $user->name = $request->name;

      $user->quyen = $request->quyen;

      //echo var_dump($array_user);
      if(($request->password == $request->password_2)){
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('admin/user/sua/'.$id)->with('thongbao','Sua thành công ');
      }
      else {
        return redirect('admin/user/sua/'.$id)->with('loi','Nhập lại Password ');
      }



    }

    public function getXoa($id){
      $user = User::find($id);
      $user->delete();
      return redirect('admin/user/danhsach')->with('thongbao','xoa thanh cong');
    }

    public function getDangnhapAdmin(){
        return view('admin.dangnhap');
    }

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
            return redirect('admin/user/danhsach');
          }
      else
          {
            return redirect('admin/dangnhap')->with('error','Dang nhap that bai ');
          }
    }
    public function logout(){
      Auth::logout();
      return view('dangnhap');
    }
}
