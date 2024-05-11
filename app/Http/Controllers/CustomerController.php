<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller{
    public function index(){
        $customers= Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create(){
        return view('customers.create');
    }

    public function store(CustomerRequest $request){
        $image = $request->file('image');
			$slug = str::slug($request->name);
			if (isset($image))
			{
				$currentDate = Carbon::now()->toDateString();
				$imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

				if (!file_exists('uploads/customers'))
				{
					mkdir('uploads/customers',0777,true);
				}
				$image->move('uploads/customers',$imagename);
			}else{
				$imagename = "";
			}

            $customer = new Customer();
			$customer->name = $request->name;
            $customer->identification_document = $request->identification_document;
			$customer->address = $request->address;
			$customer->phone_number = $request->phone_number;
            $customer->email = $request->email;
			$customer->image = $imagename;
            $customer->status = 1;
            $customer->registerby = $request->user()->id;
			$customer->save();

            return redirect()->route('customers.index');
    }

    public function show(string $id){
        
    }

    public function edit(Customer $customer){
        return view('customers.edit', compact('customer'));
    }

    public function update(CustomerRequest $request, $id){

			$customer = Customer::find($id);
			
			$image = $request->file('image');
			$slug = str::slug($request->name);
			if (isset($image)){
				$currentDate = Carbon::now()->toDateString();
				$imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

				if (!file_exists('uploads/customers')){
					mkdir('uploads/customers',0777,true);
				}
				$image->move('uploads/customers',$imagename);
			}else{
				$imagename = "";
			}
			
			$customer->name = $request->name;
            $customer->identification_document = $request->identification_document;
			$customer->address = $request->address;
			$customer->phone_number = $request->phone_number;
            $customer->email = $request->email;
			$customer->image = $imagename;
			$customer->status = 1;
            $customer->registerby = $request->user()->id;
			$customer->save();
            
            return redirect()->route('customers.index')->with('successMsg','El registro se ha actualizado exitosamente');
    
    }

    public function destroy(Customer $customer){
        $customer->delete();
        return redirect()->route('customers.index')->with('delete','ok');
    }

    public function changestatuscustomer(Request $request){
		$customer = Customer::find($request->customer_id);
		$customer->status=$request->status;
		$customer->save();
	}
}