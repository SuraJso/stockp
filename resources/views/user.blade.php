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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
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
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$user->usr_username}}</td>
                        <td>@if ($user->usr_status == 0) ใช้งานได้@else ไม่สามารถใช้งานได้ @endif</td>
                        <td>@if ($user->usr_level == 0) สมาชิก @else แอดมิน @endif</td>
                        <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModalCenter{{ $user->usr_id }}">แก้ไข</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModalCenter{{ $user->usr_id }}">ลบ</button>
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
                <form action="/insuser" method="POST">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="username" class="col-form-label">ชื่อ</label>
                        <input type="text" name="usr_username" class="form-control">
                        <label for="password" class="col-form-label">รหัสผ่าน</label>
                        <input type="password" name="usr_password" class="form-control">
                        <label for="level" class="col-form-label">Level</label>
                        <select name="usr_level">
                                    <option value="0">ใช้งานได้</option>
                                    <option value="1">ไม่สามารถใช้งานได้</option>

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
        @foreach ($users as $user)
        <!-- Modal edit -->
        <div class="modal fade" id="editModalCenter{{ $user->usr_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">เพิ่มข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{url('edituser/'.$user->usr_id)}}" method="POST">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="username" class="col-form-label">ชื่อ</label>
                        <input type="text" name="usr_username" class="form-control" readonly value="{{ $user->usr_username }}" >
                        <label for="password" class="col-form-label">รหัสผ่าน</label>
                        <input type="password" name="usr_password" class="form-control" value="{{ $user->usr_password }}">
                        <label for="status" class="col-form-label">สถานะ</label>
                        <select name="usr_status">
                            <option @if($user->usr_status===0) selected='selected' @endif value="0">ใช้งานได้</option>
                            <option @if($user->usr_status===1) selected='selected' @endif value="1">ไม่สามารถใช้งานได้</option>
                        </select>
                        <label for="level" class="col-form-label">ระดับ</label>
                        <select name="usr_level">
                            <option @if($user->usr_level===0) selected='selected' @endif value="0">สมาชิก</option>
                            <option @if($user->usr_level===1) selected='selected' @endif value="1">แอดมิน</option>
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
        @endforeach

        <!-- Modal Delete -->
        @foreach ($users as $user)
        <div class="modal fade" id="delModalCenter{{ $user->usr_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">ลบข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{url('deluser/'.$user->usr_id)}}" method="post">
                    {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        คุณจะลบข้อมูล {{ $user->usr_username }} จริงใช่มั้ย
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
        @endforeach

@endsection
