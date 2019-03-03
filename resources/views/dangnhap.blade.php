


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Lap trinh laravel">
    <meta name="author" content="">
    <title>Admin</title>
    <base href="{{asset('')}}" target="_blank">

    <!-- Bootstrap Core CSS -->
    <link href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin_asset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>


</head>

<body>

  <div class="container" style="margin-top:30px;">
    <div class="col-md-6 col-md-offset-3">
      @if(isset($error))
      <div class="alert alert-danger">
        {{ $error}}
      @else
      {{""}}
      </div>

      @endif

      <div class="panel panel-primary" style="width:800px; margin:auto;">
        <div class="panel-heading">LOGIN</div>
        <div class="panel-body">
          



          @if($errors->any())

            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $er)
                  <li> {{$er}} </li>
                @endforeach
              </ul>

            </div>

          @endif

          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <form action="{{route('login')}}" method="POST" style="padding:0px;margin:0px;">
            <!--row -->
            <div class="row">
              <div class="col-md-2">Email</div>
              <div class="col-md-10"><input type="email" name="email" value="" require class="form-control"></div>

            </div>
            <!--END row -->

            <!--row -->
            <div class="row" style="margin-top: 5px;">
              <div class="col-md-2">Password</div>
              <div class="col-md-10"><input type="password" name="password" value="" require class="form-control"></div>
            </div>
            <!--END row -->

            <!--row -->
            <div class="row" style="margin-top: 5px;">
              <div class="col-md-2"></div>
              <div class="col-md-10"><input type="submit" name="" value="Login" require class="btn btn-primary">
                <input type="reset" name="" value="Reset" class="btn btn-danger"></div>
            </div>
            <!--END row -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
