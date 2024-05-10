<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller{
  
    public function index(){
        $orders= Order::select('customers.name', 'customers.identification_document', 'orders.date', 'orders.value', 'orders.status')
        ->join('customers', 'customer_id', '=', 'orders.customer_id')->get();
        return view('orders.index', compact('orders'));
    }

    
    public function create(){
        $products= Product::where('status', '=', '1')->orderBy('name')->get();
        $customers= Customer::where('status', '=', '1')->orderBy('name')->get();
        $date= Carbon::now();
        $date= $date->format('Y-m-d');

        return view('orders.create', compact('products','customers','date'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        try {
            $order= new Order();
            $order->customer_id= $request->customer_id;
            $order->date= $request->date;
            $order->value= $request->value;
            $order->status= $request->status;
            $order->registerby= $request->registerby;
            $order->route= $request->route;
            $order->save();

            $idorder= $order->id;

            $cont= 0;
            while ($cont < count($item)){
                $detailorders= new DetailOrder();
                $detailorders->order_id= $idorder;
                $detailorders->product_id= $request->product_id[$cont];
                $detailorders->quantity= $request->quantity[$cont];
                $detailorders->subtotal= $request->subtotal[$cont];
                $detailorders->registerby= $request->registerby;
                $detailorders->save();
            }

            DB::commit();
            return redirect()->route('orders.index')->with('sucessMsg', 'Exitoso');

        } catch (Exception $e) {
            return redirect()->back()->with('successMesg', 'Error: Fatality');
            DB::rollBack();
        }
    }

    public function show(string $id){
        //
    }

    public function edit(string $id){
        //
    }

    public function update(Request $request, string $id){
        //
    }

    public function destroy(string $id){
        //
    }
}
