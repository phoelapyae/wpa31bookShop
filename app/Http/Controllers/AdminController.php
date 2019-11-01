<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Order;
use App\Category;
use App\Admin;
use App\Customer;
use App\Author;
use App\Publisher;
use App\City;
use App\Shop;
use App\Feedback;

class AdminController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:web,admin');
    }

    public function index(){
        $total_books = Book::count();
        $total_orders = Order::count();
        $total_categories = Category::count();
        $total_admins = Admin::count();
        $total_customers = Customer::count();
        $total_authors = Author::count();
        $total_publishers = Publisher::count();
        $total_cities = City::count();
        $total_shops = Shop::count();
        $total_feedbacks = Feedback::count();
        return view('backend.index',compact('total_books','total_orders','total_categories','total_admins','total_customers','total_authors','total_publishers','total_cities','total_shops','total_feedbacks'));
    }
}
