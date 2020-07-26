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
                  <h6 class="m-0 font-weight-bold text-primary">ประเภทสินค้า</h6>
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
                          <th>อุปกรณ์</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                        <th>ID</th>
                        <th>ชื่อ</th>
                        <th>อุปกรณ์</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($typeproducts as $pt)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$pt->pdt_name}}</td>
                        <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModalCenter{{$pt->pdt_id}}">แก้ไข</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModalCenter{{$pt->pdt_id}}">ลบ</button>
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                   </>
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
                <form action="/instypeproduct" method="POST">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="typeproduct_name" class="col-form-label">ชื่อประเภทสินค้า</label>
                        <input type="text" name="pdt_name" class="form-control" id="typename">
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
        <!-- Modal Edit -->
        @foreach ($typeproducts as $pt)
        <div class="modal fade" id="editModalCenter{{$pt->pdt_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">แก้ไขข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{url('edittypeproduct/'.$pt->pdt_id)}}" method="POST">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="typeproduct_name" class="col-form-label">ชื่อประเภทสินค้า</label>
                        <input type="text" name="pdt_name" class="form-control" id="typename" value="{{$pt->pdt_name}}">
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
        <!-- Modal Edit -->
        @foreach ($typeproducts as $pt)
        <div class="modal fade" id="delModalCenter{{$pt->pdt_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">ลบข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{url('deltypeproduct/'.$pt->pdt_id)}}" method="post">{{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        คุณจะลบข้อมุล {{$pt->pdt_name}} จริงใช่มั้ย
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
        s
@endsection
