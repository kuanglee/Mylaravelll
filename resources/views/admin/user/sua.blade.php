@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Edit</small>
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
              @foreach($user as $values)
                <form action="admin/user/sua/{{$values->id}}" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="name" value="{{$values->name}}"  />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" type="email" value="{{$values->email}}" disabled />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" type="password" placeholder="Please Enter Password" />
                    </div>
                    <div class="form-group">
                        <label>RePassword</label>
                        <input type="password" class="form-control" name="password_2" placeholder="Please Enter RePassword" />
                    </div>
                    <div class="form-group" >
                        <label>Quyen</label>
                        <select name="quyen" class="form-control">
                            <option value="0" <?php if($values->quyen == 0){echo "";}else {echo "selected";} ?>>Admin</option>
                            <option value="1" <?php if($values->quyen == 1){echo "selected";}  else {echo "";} ?>>User</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">User Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>

                <form>
                @endforeach
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
