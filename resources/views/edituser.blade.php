@extends('layout.app')

@section('content')

    <div class="container py-2">
        <div class="row my-2">
            <!-- edit form column -->

            <div class="col-lg-8 order-lg-1 personal-info">
                <form role="form">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">ชื่อ</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="usr_username" type="text" value="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">รหัสผ่าน</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="usr_password" type="password" value="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Level</label>
                        <div class="col-lg-9">
                            <select id="user_status" name="usr_level" class="form-control" size="0">
                                <option value="0">user</option>
                                <option value="1">admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Status</label>
                        <div class="col-lg-9">
                            <select id="user_status" name="usr_status" class="form-control" size="0">
                                <option value="0">Ready</option>
                                <option value="1">None</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
