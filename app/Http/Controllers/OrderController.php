<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\City;
use App\Shop;
use App\Order;
use Auth;

class OrderController extends Controller
{
    public function __construct(){
        return $this->middleware('auth:web,customer');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::pluck('title','id');
        $cities = City::pluck('cityname','id');
        $shops = Shop::pluck('shopname','id');
        return view('front.order-form',compact('books','cities','shops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'number' => 'required',
            'phone' => 'required|min:5',
            'address' => 'required|min:5'
        ]);
        $order = new Order();
        
        $order->shop_id = $request->shop_id;
        $order->city_id = $request->city_id;
        $order->bookId = $request->book_id;
        $order->number = $request->number;
        $order->customer = Auth::user()->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->save();
        $order->books()->attach($request->get("book_id"));
        $request->session()->flash('alert-success','New order was created successfully.');
        return redirect()->back();
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
        //
    }
}
