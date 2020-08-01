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
                  <h6 class="m-0 font-weight-bold text-primary">สินค้า</h6>
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
                            <th>จำนวน</th>
                            <th>ประเภท</th>
                            <th>อุปกรณ์</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>ชื่อ</th>
                            <th>จำนวน</th>
                            <th>ประเภท</th>
                            <th>อุปกรณ์</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($products as $pd)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$pd->pd_name}}</td>
                            <td>{{$pd->pd_count}}</td>
                            <td>{{$pd->typeproduct->pdt_name}}</td>
                        <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModalCenter{{$pd->pd_id}}">แก้ไข</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModalCenter{{$pd->pd_id}}">ลบ</button>
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
                <form action="/insproduct" method="POST">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="productname" class="col-form-label">ชื่อสินค้า</label>
                        <input type="text" name="pd_name" class="form-control" id="pdname">
                        <label for="productcount" class="col-form-label">จำนวนสินค้า</label>
                        <input type="number" name="pd_count" class="form-control" id="pdcount">
                        <label for="product_typeproduct" class="col-form-label">ประเภทสินค้า</label>
                        <select name="pdt_id">
                            @foreach ($typeproducts as $pt)
                                    <option value="{{$pt->pdt_id}}">{{$pt->pdt_name}}</option>
                            @endforeach
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
        <!-- Modal Edit -->
        @foreach ($products as $pd)
        <div class="modal fade" id="editModalCenter{{$pd->pd_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">แก้ไขข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{url('editproduct/'.$pd->pd_id)}}" method="POST">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="product_name" class="col-form-label">ชื่อประเภทสินค้า</label>
                        <input type="text" name="pd_name" class="form-control" id="pdname" value="{{$pd->pd_name}}">
                        <label for="productcount" class="col-form-label">จำนวนสินค้า</label>
                        <input type="number" name="pd_count" class="form-control" id="pdcount" value="{{$pd->pd_count}}">
                        <label for="product_typeproduct" class="col-form-label">ประเภทสินค้า</label>
                        <select name="pdt_id" selected >
                            @foreach ($typeproducts as $pt)
                                    <option @if($pd->pdt_id===$pd->pdt_id) selected='selected' @endif value="{{$pt->pdt_id}}">{{$pt->pdt_name}}</option>
                            @endforeach
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
        @foreach ($products as $pd)
        <div class="modal fade" id="delModalCenter{{$pd->pd_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">ลบข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{url('delproduct/'.$pd->pd_id)}}" method="post">{{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        คุณจะลบข้อมูล {{$pd->pd_name}} จริงใช่มั้ย
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
