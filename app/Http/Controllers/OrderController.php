<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\User;
use App\Http\Requests\OrderRequest;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller{

    public function index(){
        $orders=Order::select('customers.name', 'customers.identification_document','orders.date','orders.price','orders.status')
        -> join ('customers','customer_id','=','orders.customer_id')->get();
        return view('orders.index', compact('orders'));
    }

    public function create(){
        $products = Product::where('status', '=', '1')->orderBy('name')->get();
        $customers = Customer::where('status', '=', '1')->orderBy('name')->get();
        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        return view('orders.create', compact('products', 'customers', 'date'));
    }

    public function store(Request $request){
        $request->validate([
            'customer' => 'required|exists:customers,id',
            'date' => 'required|date',
            'status' => 'required|integer',
            'resgisterby' => 'required|integer',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'products.*.price' => 'required|numeric|min:0',
        ]);
    
        DB::beginTransaction();
        try {
            // Crear la orden
            $order = Order::create([
                'customer_id' => $request->customer,
                'date' => $request->date,
                'status' => $request->status,
                'registered_by' => $request->resgisterby,
                'value' => 0, // Este campo se actualizará más adelante
            ]);
    
            $total = 0;
    
            // Crear los detalles de la orden
            foreach ($request->products as $product) {
                $subtotal = $product['quantity'] * $product['price'];
                $total += $subtotal;
    
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product['id'],
                    'quantity' => $product['quantity'],
                    'price' => $product['price'],
                    'subtotal' => $subtotal,
                ]);
            }
    
            // Actualizar el valor total de la orden
            $order->update(['value' => $total]);
    
            DB::commit();
    
            // Redirigir a la lista de órdenes con un mensaje de éxito
            return redirect()->route('orders.index')->with('success', 'Order created successfully');
        } catch (Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    

    public function show(string $id){
        $order = Order::find($id);
        $customer = Client::where("id", $order->customer_id)->first();
        $details = OrderDetail::with('product')
            ->where('order_details.order_id', '=', $id)
            ->get();

        return view("orders.show", compact("order", "customer", "details"));

        $order= Order::select('customers.name AS name', 'customer.document AS document')
        ->join('customers')
        ->where('order.id', '=', $id)
        ->first();

        $details= OrderDetail::select('products.name AS name', 'products.price AS price',)
        ->join('products')
        ->where('order_details.order_id', '=', $id)
        ->get();
    }

    public function edit(string $id){
        //
    }

    public function update(Request $request, string $id){
        //
    }

    public function destroy(string $id){
        $order->delete();
        return redirect()->route("orders.index")->with("success", "The order has been deleted.");
    }

    public function changestatusorder(Request $request){
        $order = Order::find($request->order_id);
        $order->status = $request->status;
        $order->save();
    }
}