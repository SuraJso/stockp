@extends('layout.app')

@section('content')

    <div class="container py-2">
        <div class="row my-2">
            <!-- edit form column -->

            <div class="col-lg-8 order-lg-1 personal-info">
                <form role="form">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">First name</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" value="Jane" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Password</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="password" value="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Email</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="email" value="email@gmail.com" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Level</label>
                        <div class="col-lg-9">
                            <select id="user_status" class="form-control" size="0">
                                <option value="0">user</option>
                                <option value="1">admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Status</label>
                        <div class="col-lg-9">
                            <select id="user_status" class="form-control" size="0">
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
