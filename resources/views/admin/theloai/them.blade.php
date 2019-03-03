@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">The Loai
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
              @if (session('thongbao'))
                <div class="alert alert-success">
                    {{ session('thongbao') }}
                </div>
              @elseif(session('loi'))
              <div class="alert alert-danger">
                  {{ session('loi') }}
              </div>
            @endif
            @if($errors->any())

              <div class="alert alert-danger">
                <ul>
                  @foreach($errors->all() as $er)
                    <li> {{$er}} </li>
                  @endforeach
                </ul>

              </div>
            @endif


              <form action="admin/theloai/them" method="POST" style="padding:0px;margin:0px;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" >


                    <div class="form-group">
                        <label>Ten</label>
                        <input class="form-control" name="name" placeholder="Please Enter Name" />
                    </div>
                    <div class="form-group">
                        <label>Ten Khong Dau</label>
                        <input type="text" class="form-control" name="TenKhongDau" placeholder="Please Enter Email" />
                    </div>


                    <button type="submit" class="btn btn-default">Them The Loai</button>
                    <button type="reset" class="btn btn-default">Reset</button>


                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
@endsection
