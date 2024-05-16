<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Http\Requests\OrderRequest;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders=Order::select('customers.name', 'customers.identification_document','orders.date','orders.price','orders.status')
        -> join ('customers','customer_id','=','orders.customer_id')->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::where('status', '=', '1')->orderBy('name')->get();
        $customers = Customer::where('status', '=', '1')->orderBy('name')->get();
        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        return view('orders.create', compact('products', 'customers', 'date'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $order = new Order();

            $order -> customer_id = $request->customer_id;
            $order -> date = $request->date;
            $order -> price = $request->price;
            $order -> status = $request->status;
            $order -> registerby = $request->registerby;
            $order -> route = $request->route;
            $order -> save();

            $idorder= $order ->id;
            
            $cont = 0;
            
            //TODO: ARREGLAR ESTA PARTE
            // while ($cont < count($item)) {
            //     $detailorders = new DetailOrder();
            //     $detailorders -> order_id= $idorder;
            //     $detailorders -> product_id= $idproduct;
            //     $detailorders -> quantity= $quantity;
            //     $detailorders -> subtotal = $subtotal;                

            // }
            DB::commit();
            return redirect()->route('orders.index')->with('successMsg', 'Exitoso');

        } catch (Exception $e) {
            return redirect()->back()->with('successMsg', 'Error to register the info');
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}