@extends('layout.app')

@section('content')

              <!-- Page Heading -->
 <!--        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
              <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->
              <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModalCenter">เพิ่มข้อมูล</button>
              <!-- DataTales Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">บุคลากร</h6>
                </div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">{{session('status')}}</div>
                @endif
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th>ID</th>
                            <th>ชื่อ</th>
                            <th>สถานะ</th>
                            <th>ระดับ</th>
                            <th>อุปกรณ์</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>ชื่อ</th>
                            <th>สถานะ</th>
                            <th>ระดับ</th>
                            <th>อุปกรณ์</th>
                        </tr>
                      </tfoot>
                      @foreach ($users as $user)
                      <tbody>
                        <tr>
                        <td>{{$user->usr_id}}</td>
                        <td>{{$user->usr_username}}</td>
                        <td>@if ($user->usr_status === 0) ไม่สามรถใช้งานได้ @endif ใช้งานได้</td>
                        <td>@if ($user->usr_level === 0) สมาชิก @endif แอดมิน</td>
                        <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModalCenter">แก้ไข</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModalCenter">ลบ</button>
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- Modal -->
        <div class="modal fade" id="addModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">เพิ่มข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="/" method="POST">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="username" class="col-form-label">ชื่อ</label>
                        <input type="text" name="usr_usrname" class="form-control" >
                        <label for="password" class="col-form-label">รหัสผ่าน</label>
                        <input type="number" name="usr_password" class="form-control">
                        <label for="level" class="col-form-label">Level</label>
                        <select name="usr_level">
                                    <option value="0">user</option>
                                    <option value="1">admin</option>

                        </select>
                        <label for="status" class="col-form-label">Status</label>
                        <select name="usr_status">
                            <option value="0">user</option>
                            <option value="1">admin</option>

                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
            </div>
        </div>
        <!-- Modal edit -->
        <div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">เพิ่มข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="/edituser" method="POST">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="username" class="col-form-label">ชื่อ</label>
                        <input type="text" name="usr_usrname" class="form-control" value="" >
                        <label for="password" class="col-form-label">รหัสผ่าน</label>
                        <input type="number" name="usr_password" class="form-control" value="">
                        <label for="level" class="col-form-label">Level</label>
                        <select name="usr_level">
                                    <option value="0">user</option>
                                    <option value="1">admin</option>

                        </select>
                        <label for="status" class="col-form-label">Status</label>
                        <select name="usr_status">
                            <option value="0">user</option>
                            <option value="1">admin</option>

                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
            </div>
        </div>

        <!-- Modal Delete -->

        <div class="modal fade" id="delModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">ลบข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="/" method="post">
                    {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        คุณจะลบข้อมูล ... จริงใช่มั้ย
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
                </div>
                </form>
            </div>
            </div>
        </div>

@endsection
