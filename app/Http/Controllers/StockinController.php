<?php

namespace App\Http\Controllers;

use App\Stockin;
use Illuminate\Http\Request;
use App\Product;

class StockinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stockins = Stockin::with('product','user')->get();
        $products = Product::all();
        return view('stockin',compact('stockins','products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stockins = new Stockin;
        $stockins->pd_id = $request->pd_id;
        $stockins->stockin_count = $request->stockin_count;
        $stockins->stockin_price = $request->stockin_price;
        $stockins->stockin_date = $request->stockin_date;
        $stockins->usr_id = $request->usr_id;

        $stockins->save();
        return redirect('/stockin')->with('status','เพิ่มข้อมูลสำเร็จ');
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
        $stockins = Stockin::find($id);
        $stockins->pd_id = $request->pd_id;
        $stockins->stockin_count = $request->stockin_count;
        $stockins->stockin_price = $request->stockin_price;
        $stockins->stockin_date = $request->stockin_date;
        $stockins->usr_id = $request->usr_id;

        $stockins->update();
        return redirect('/stockin')->with('status','แก้ไขสำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stockins = Stockin::findOrFail($id);
        $stockins->delete();
        return redirect('/stockin')->with('status','ลบสำเร็จ');
    }
}
