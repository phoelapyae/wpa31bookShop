<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class ReportController extends Controller
{
    public function index(){
        return view('backend.reports.index');
    }
}
