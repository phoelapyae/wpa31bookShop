<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Auth;
use App\Book;
use App\Order;
use Session;
use DB;


class DownloadController extends Controller
{
    public function downloadPDF(){
        $orders = Order::with('books')->get();
        $total_number = Order::sum('number');
 
        $data = [
            'orders' => $orders,
            'total_number' => $total_number
        ];
      
        $pdf = PDF::loadView('backend.vouchers.paper',$data);
        return $pdf->download('wpa31bookShop.pdf');
    }
}
