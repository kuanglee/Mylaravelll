<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;

class TinTucController extends Controller
{
    public function getDanhSach(){
      $tintuc = TinTuc::all();
      // $values = TinTuc::select('tintuc.TieuDe')
      // ->join('loaitin','tintuc.idLoaitin' , '=' ,'loaitin.id')
      // ->get();
      return view('admin/tintuc/danhsach',['tintuc'=>$tintuc]);
    }
    public function getThemTinTuc(){
      return view('admin/tintuc/them');
    }
    public function postThemTinTuc(Request $request){
      $tintuc = new TinTuc();
      $this->validate($request,[
        'TieuDe' => 'required',
        'TieuDeKhongDau'=>'required',
        'upload.*'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
      ]);
      $tintuc->TieuDe = $request->TieuDe;
      $tintuc->TieuDeKhongDau = $request->TieuDeKhongDau;
      $tin->TomTat = $request->TomTat;
      $tintuc->NoiDung = $request->NoiDung;
      $tintuc->NoiBat = $request->NoiBat;

      if ($request->hasfile('upload')) {
          $image = $request->file('upload');
          $name = rand() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path("upload/quang"),$name);
          $tintuc->Hinh = $name;
      }

    }
}
