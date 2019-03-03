@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
          
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tieu De</th>
                        <th>Tieu De Khong Dau</th>
                        <th>Tom Tat</th>
                        <th>Noi Dung</th>
                        <th>Hinh</th>
                        <th>Noi Bat </th>
                        <th>So Luot Xem</th>
                        <th>ID Loai Tin</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($tintuc as $values)
                    <tr class="even gradeC" align="center">
                        <td>{{$values->id}}</td>
                        <td>{{$values->TieuDe}}</td>
                        <td>{{$values->TieuDeKhongDau}}</td>
                        <td>{{$values->TomTat}}</td>
                        <td>{{$values->NoiDung}}</td>

                        <td><img src="upload/tintuc/{{$values->Hinh}}" height="30px" width="30px"></td>
                        <td>{{$values->NoiBat}}</td>
                        <td>{{$values->SoLuotXem}}</td>
                        <td>{{$values->idLoaiTin}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/loaitin/xoa/{{$values->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loaitin/sua/{{$values->id}}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
