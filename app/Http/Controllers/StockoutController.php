<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stockout;
use App\Product;
class StockoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stockouts = Stockout::with('product','user')->get();
        $products = Product::all();
        return view('stockout',compact('stockouts','products'));
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
        $stockouts = new Stockout;
        $stockouts->pd_id = $request->pd_id;
        $stockouts->stockout_count = $request->stockout_count;
        $stockouts->stockout_price = $request->stockout_price;
        $stockouts->stockout_date = $request->stockout_date;
        $stockouts->usr_id = $request->usr_id;

        $stockouts->save();
        return redirect('/stockout')->with('status','เพิ่มข้อมูลสำเร็จ');
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
        $stockouts = Stockout::find($id);
        $stockouts->pd_id = $request->pd_id;
        $stockouts->stockout_count = $request->stockout_count;
        $stockouts->stockout_price = $request->stockout_price;
        $stockouts->stockout_date = $request->stockout_date;
        $stockouts->usr_id = $request->usr_id;

        $stockouts->update();
        return redirect('/stockout')->with('status','แก้ไขสำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stockouts = Stockout::findOrFail($id);
        $stockouts->delete();
        return redirect('/stockout')->with('status','ลบสำเร็จ');
    }
}
