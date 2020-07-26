<?php

namespace App\Http\Controllers;

use App\Typeproduct;
use Illuminate\Http\Request;

class TypeproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeproducts = Typeproduct::all();
        return view('typeproduct',compact('typeproducts'));
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
    public function store(Request $request)
    {
        //
        $typeproducts = new Typeproduct;
        $typeproducts->pdt_name = $request->input('pdt_name');

        $typeproducts->save();
        return redirect('/typeproduct')->with('status','เพิ่มข้อมูลสำเร็จ');
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
        $typeproducts = Typeproduct::find($id);
        $typeproducts->pdt_name = $request->input('pdt_name');

        $typeproducts->update();
        return redirect('/typeproduct')->with('status','แก้ไขสำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typeproducts = Typeproduct::findOrFail($id);
        $typeproducts->delete();
        return redirect('/typeproduct')->with('status','ลบสำเร็จ');
    }
}
