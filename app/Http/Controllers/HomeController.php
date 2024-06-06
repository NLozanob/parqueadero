<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Models\Customer;
use App\Http\Controllers\CustomerController;
use App\Models\Order;
use App\Http\Controllers\OrderController;
use Carbon\Carbon;

class HomeController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){

        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $productCount = Product::where('status', '=', '1')->count();
        $customerCount = Customer::where('status', '=', '1')->count();

        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        $orderCountDay = Order::whereDate('date', '=', Carbon::now()->format('Y-m-d'))->get()->count("id");
        $orderTotalDay = Order::whereDate('date', '=', Carbon::now()->format('Y-m-d'))->get()->sum("total");

        $orderCountMonth = Order::whereMonth('date', date('m'))->get()->count("id");
        $orderTotalMonth = Order::whereMonth('date', date('m'))->get()->sum("total");
        
        return view('home', compact('productCount', 'customerCount', 'orderCountDay', 'orderTotalDay', 'orderCountMonth', 'orderTotalMonth'));
    }
}
