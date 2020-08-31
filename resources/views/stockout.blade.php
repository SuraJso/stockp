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
                  <h6 class="m-0 font-weight-bold text-primary">สินค้าออก</h6>
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
                            <th>สินค้า</th>
                            <th>จำนวน</th>
                            <th>ราคา</th>
                            <th>วันที่</th>
                            <th>เจ้าของ</th>
                            <th>อุปกรณ์</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>สินค้า</th>
                            <th>จำนวน</th>
                            <th>ราคา</th>
                            <th>วันที่</th>
                            <th>เจ้าของ</th>
                            <th>อุปกรณ์</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($stockouts as $outitem)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $outitem->product->pd_name }}</td>
                            <td>{{ $outitem->stockout_count }}</td>
                            <td>{{ $outitem->stockout_price }}</td>
                            <td>{{ $outitem->stockout_date }}</td>
                            <td>{{ $outitem->user->usr_username }}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModalCenter{{ $outitem->stockout_id }}">แก้ไข</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModalCenter{{ $outitem->stockout_id }}">ลบ</button>
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
                <form action="/insstockout" method="POST">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="productname" class="col-form-label">ชื่อสินค้า</label>
                        <select name="pd_id">
                            @foreach ($products as $pd)
                            <option value="{{$pd->pd_id}}">{{$pd->pd_name}}</option>
                            @endforeach
                        </select>
                        <label for="stockoutcount" class="col-form-label">จำนวนสินค้า</label>
                        <input type="number" name="stockout_count" class="form-control" id="stockoutcount">
                        <label for="stockoutprice" class="col-form-label">ราคาสินค้า</label>
                        <input type="number" name="stockout_price" class="form-control" id="stockoutprice">
                        <label for="date" class="col-form-label">วันที่</label>
                        <input type="date" class="form-control" name="stockout_date">

                        <input type="hidden" name="usr_id" id="usrid" value="{{ Auth::user()->usr_id}}">
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
        @foreach ($stockouts as $outitem)
        <!-- Modal edit -->
        <div class="modal fade" id="editModalCenter{{ $outitem->stockout_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">แก้ไขข้อมูล</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{url('editstockout/'.$outitem->stockout_id)}}" method="POST">
            <div class="modal-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="productname" class="col-form-label">ชื่อสินค้า</label>
                    <select name="pd_id">
                        @foreach ($products as $pd)
                        <option @if($outitem->pd_id===$pd->pd_id) selected='selected' @endif value="{{$pd->pd_id}}">{{$pd->pd_name}}</option>
                        @endforeach
                    </select>
                    <label for="stockoutcount" class="col-form-label">จำนวนสินค้า</label>
                    <input type="number" name="stockout_count" class="form-control" id="stockoutcount" value="{{ $outitem->stockout_count }}">
                    <label for="stockoutprice" class="col-form-label">ราคาสินค้า</label>
                    <input type="number" name="stockout_price" class="form-control" id="stockoutprice" value="{{ $outitem->stockout_price }}">
                    <label for="date" class="col-form-label">วันที่</label>
                    <input type="date" class="form-control" name="stockout_date" value="{{ $outitem->stockout_date }}">

                    <input type="hidden" name="usr_id" id="usrid" value="{{ Auth::user()->usr_id}}">
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
    @foreach ($stockouts as $outitem)
    <div class="modal fade" id="delModalCenter{{ $outitem->stockout_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">ลบข้อมูล</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{url('delstockout/'.$outitem->stockout_id)}}" method="post">
                {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group">
                    คุณจะลบข้อมูล {{ $outitem->product->pd_name }} จริงใช่มั้ย
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
