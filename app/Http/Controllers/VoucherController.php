<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Auth;
use App\Book;
use App\Order;
use Session;
use DB;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadPDF(){
        $orders = Order::with('books')->get();
        $total_number = Order::sum('number');
        $data = [
            'orders' => $orders,
            'total_number' => $total_number
        ];
        // dd($data);
        // $customPaper = array(0,0,567.00,283.80);
        $pdf = PDF::loadView('backend.vouchers.paper',$data);
        return $pdf->download('wpa31bookShop.pdf');
    }

    public function index()
    {
        $orders = Order::with('books')->get();
        $total_number = Order::sum('number');
        
        return view('backend.vouchers.paper',compact('orders','total_number'));
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
        //
    }
}
