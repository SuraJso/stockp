<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\userRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(userRequest $request)
    {

            $users = new User;
            $users->usr_username = $request->usr_username;
            $users->usr_password = Hash::make($request->usr_password);
            $users->usr_level = $request->usr_level;
            $users->usr_status = $request->usr_status;

            $users->save();

            return redirect('/user')->with('status','เพิ่มข้อมูลสำเร็จ');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users->usr_username = $request->usr_username;
        $users->usr_password = Hash::make($request->usr_password);
        $users->usr_level = $request->usr_level;
        $users->usr_status = $request->usr_status;

        $users->update();

        return redirect('/user')->with('status','แก้ไขสำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('/user')->with('status','ลบสำเร็จ');
    }
}
