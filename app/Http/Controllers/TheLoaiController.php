<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\TheLoai;

class TheLoaiController extends Controller
{
    public function getDanhSach(){
      $theloai = TheLoai::all();
      return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }

    public function getThemTheLoai(){
      return view('admin.theloai.them');
    }

    public function postThemTheLoai(Request $request){
      $this->validate($request,[
        'name' => 'required',
        'TenKhongDau'=>'required',],[
          'Ten.required' => 'Yeu Cau Khong Duoc De Trong ',
          'TenKhongDau.required' => 'Yeu Cau Khong Duoc De Trong Ten Khong Dau'
        ]);
      $theloai = new TheLoai();
      $theloai->Ten = $request->name;
      $theloai->TenKhongDau = $request->TenKhongDau;
      $theloai->save();
      return redirect('admin/theloai/them')->with('thongbao','Them thanh cong ');
  }

    public function getXoaTheLoai($id){
      $theloai = TheLoai::find($id);
      $theloai->delete();
      return redirect('admin/theloai/danhsach');

    }

}
