@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
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


              <form action="admin/user/them" method="POST" style="padding:0px;margin:0px;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" >


                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Please Enter Name" />
                    </div>
                    <div class="form-group">
                        <label>email</label>
                        <input type="email" class="form-control" name="email" placeholder="Please Enter Email" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Please Enter Password" />
                    </div>
                    <div class="form-group">
                        <label>Confirmation Password</label>
                        <input type="password" class="form-control" name="password_2" placeholder="Please Enter Password" />
                    </div>
                    <div class="form-group" >
                        <label>Quyen</label>
                        <select name="quyen" class="form-control">
                            <option value="0">0</option>
                            <option value="1">1</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-default">User Add</button>
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
