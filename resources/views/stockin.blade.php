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
                  <h6 class="m-0 font-weight-bold text-primary">สินค้าเข้า</h6>
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
                        @foreach ($stockins as $initem)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $initem->product->pd_name }}</td>
                            <td>{{ $initem->stockin_count }}</td>
                            <td>{{ $initem->stockin_price }}</td>
                            <td>{{ $initem->stockin_date }}</td>
                            <td>{{ $initem->user->usr_username }}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModalCenter{{ $initem->stockin_id }}">แก้ไข</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModalCenter{{ $initem->stockin_id }}">ลบ</button>
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
                    <form action="/insstockin" method="POST">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="productname" class="col-form-label">ชื่อสินค้า</label>
                            <select name="pd_id">
                                @foreach ($products as $pd)
                                <option value="{{$pd->pd_id}}">{{$pd->pd_name}}</option>
                                @endforeach
                            </select>
                            <label for="stockincount" class="col-form-label">จำนวนสินค้า</label>
                            <input type="number" name="stockin_count" class="form-control" id="stockincount">
                            <label for="stockinprice" class="col-form-label">ราคาสินค้า</label>
                            <input type="number" name="stockin_price" class="form-control" id="stockinprice">
                            <label for="date" class="col-form-label">วันที่</label>
                            <input type="date" name="stockin_date" class="form-control" id="stockindate">
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
                <!-- Modal Edit -->
                @foreach ($stockins as $initem)
                <div class="modal fade" id="editModalCenter{{ $initem->stockin_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">เพิ่มข้อมูล</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="{{url('editstockin/'.$initem->stockin_id)}}" method="POST">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="productname" class="col-form-label">ชื่อสินค้า</label>
                            <select name="pd_id">

                                @foreach ($products as $pd)
                                <option @if($initem->pd_id===$pd->pd_id) selected='selected' @endif value="{{$pd->pd_id}}">{{$pd->pd_name}}</option>
                                @endforeach
                            </select>
                            <label for="stockincount" class="col-form-label">จำนวนสินค้า</label>
                            <input type="number" name="stockin_count" class="form-control" id="stockincount" value="{{ $initem->stockin_count }}">
                            <label for="stockinprice" class="col-form-label">ราคาสินค้า</label>
                            <input type="number" name="stockin_price" class="form-control" id="stockinprice" value="{{ $initem->stockin_price }}">
                            <label for="date" class="col-form-label">วันที่</label>
                            <input type="date" class="form-control" name="stockin_date" value="{{ $initem->stockin_date }}">

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
        @foreach ($stockins as $initem)
        <div class="modal fade" id="delModalCenter{{ $initem->stockin_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">ลบข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{url('delstockin/'.$initem->stockin_id)}}" method="post">
                    {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        คุณจะลบข้อมูลสินค้าเข้า {{ $initem->product->pd_name }} จริงใช่มั้ย
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
