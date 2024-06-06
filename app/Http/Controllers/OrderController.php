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
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller{

    public function index(){
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create(){
        $products = Product::where('status', '=', '1')->orderBy('name')->get();
        $customers = Customer::where('status', '=', '1')->orderBy('name')->get();
        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        return view('orders.create', compact('products', 'customers', 'date'));
    }

    public function store(OrderRequest $request){
    //     $request->validate([
    //         'customer' => 'required|exists:customers,id',
    //         'date' => 'required|date',
    //         'status' => 'required|integer',
    //         'resgisterby' => 'required|integer',
    //         'products' => 'required|array',
    //         'products.*.id' => 'required|exists:products,id',
    //         'products.*.quantity' => 'required|integer|min:1',
    //         'products.*.price' => 'required|numeric|min:0',
    //     ]);
    
    //     DB::beginTransaction();
    //     try {
    //         // Crear la orden
    //         $order = Order::create([
    //             'customer_id' => $request->customer,
    //             'date' => $request->date,
    //             'status' => $request->status,
    //             'registered_by' => $request->resgisterby,
    //             'value' => 0, // Este campo se actualizará más adelante
    //         ]);
    
    //         $total = 0;
    
    //         // Crear los detalles de la orden
    //         foreach ($request->products as $product) {
    //             $subtotal = $product['quantity'] * $product['price'];
    //             $total += $subtotal;
    
    //             OrderDetail::create([
    //                 'order_id' => $order->id,
    //                 'product_id' => $product['id'],
    //                 'quantity' => $product['quantity'],
    //                 'price' => $product['price'],
    //                 'subtotal' => $subtotal,
    //             ]);
    //         }
    
    //         // Actualizar el valor total de la orden
    //         $order->update(['value' => $total]);
    
    //         DB::commit();
    
    //         // Redirigir a la lista de órdenes con un mensaje de éxito
    //         return redirect()->route('orders.index')->with('success', 'Order created successfully');
    //     } catch (Exception $e) {
    //         DB::rollback();
    //         return back()->withErrors(['error' => $e->getMessage()]);
    //     }

        $order = Order::create([
            'date' => Carbon::now()->toDateTimeString(),
            'price' => $request->price,
            'route' => "Por hacer",
            'customer_id' => Customer::find($request->customer)->id,
        ]);

        $order->status = 0;
        $order->registerby = $request->registerby;

        $total = 0;

        $rawProductId = $request->product_id;
        $rawQuantity = $request->quantity;
        for ($i = 0; $i < count($rawProductId); $i++) {
            $product = Product::find($rawProductId[$i]);
            $quantity = $rawQuantity[$i];
            $subtotal = $product->price * $quantity;

            $order->orderDetails()->create([
                'quantity' => $quantity,
                'subtotal' => $subtotal,
                'product_id' => $product->id,
            ]);

                $total += $subtotal;
            }
            $order->total = $total;
        
            
            // Generate bill (PDF).
            $pdfName = 'uploads/bills/bill_' . $order->id . '_' . Carbon::now()->format('YmdHis') . '.pdf';

            $order = Order::find($order->id);
            $customer = Customer::where("id", $order->customer_id)->first();
            $details = OrderDetail::with('product')
                ->where('detailorders.order_id', '=', $order->id)
                ->get();

            $pdf = PDF::loadView('orders.bill', compact("order", "customer", "details"))
                ->setPaper('letter')
                ->output();

            file_put_contents($pdfName, $pdf);

            $order->route = $pdfName;
            $order->save();


            return redirect()->route("orders.index")->with("success", "The orders has been created.");
    }
    

    public function show(string $id){
        // $order = Order::find($id);
        // $customer = Client::where("id", $order->customer_id)->first();
        // $details = OrderDetail::with('product')
        //     ->where('order_details.order_id', '=', $id)
        //     ->get();

        // return view("orders.show", compact("order", "customer", "details"));

        // $order= Order::select('customers.name AS name', 'customer.document AS document')
        // ->join('customers')
        // ->where('order.id', '=', $id)
        // ->first();

        // $details= OrderDetail::select('products.name AS name', 'products.price AS price',)
        // ->join('products')
        // ->where('order_details.order_id', '=', $id)
        // ->get();

        $order = Order::find($id);
        $customer = Customer::where("id", $order->customer_id)->first();
        $details = OrderDetail::with('product')
            ->where('orderdetails.order_id', '=', $id)
            ->get();

        return view("orders.show", compact("order", "customer", "details"));
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