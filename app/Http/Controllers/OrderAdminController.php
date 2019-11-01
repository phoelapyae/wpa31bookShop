<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Order;
use App\Book;
use App\Shop;
use App\City;
use App\Customer;

class OrderAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.orders.index');
    }

    public function anyData(){
        $model = Order::query();
        return \DataTables::eloquent($model)
        ->addColumn('book',function(Order $order){
            $data = Book::select('title')->where('id', $order->bookId)->first();
            return $data['title'];
        })
        ->addColumn('price',function(Order $order){
            $data = Book::select('price')->where('id', $order->bookId)->first();
            return $data['price'];
        })
        ->addColumn('shop',function(Order $order){
            $data = Shop::select('shopname')->where('id', $order->shop_id)->first();
            return $data['shopname'];
        })
        ->addColumn('city',function(Order $order){
            $data = City::select('cityname')->where('id', $order->city_id)->first();
            return $data['cityname'];
        })
        ->addColumn('option',function(Order $order){
            return view('backend.orders.option',compact('order'));
        })
        ->rawColumns(['option'])
        ->toJson();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        return redirect()->route('orders.index');
    }
}
