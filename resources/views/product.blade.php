@extends('layout.app')

@section('content')

              <!-- Page Heading -->
 <!--         <h1 class="h3 mb-2 text-gray-800">Tables</h1>
              <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->
              <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">เพิ่มข้อมูล</button>
              <!-- DataTales Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Office</th>
                          <th>Age</th>
                          <th>Start date</th>
                          <th>Salary</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Office</th>
                          <th>Age</th>
                          <th>Start date</th>
                          <th>Salary</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($p as $product)
                        <tr>
                            <td>{{ $p->pd_name}}</td>
                            <td>{{}}</td>
                            <td>{{}}</td>
                            <td>{{}}</td>
                            <td>{{}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                   </div>
              </div>
    <!-- Modal -->
    <form action="/" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                dsadadwa
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

        </div>
    </form>

@endsection
