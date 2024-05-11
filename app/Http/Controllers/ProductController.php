<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller{
    public function index(){
        $products= Product::all();
        return view('products.index', compact('products'));
    }

    public function create(){
        return view('products.create');
    }

    public function store(ProductRequest $request){
        $image = $request->file('image');
			$slug = str::slug($request->name);
			if (isset($image))
			{
				$currentDate = Carbon::now()->toDateString();
				$imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

				if (!file_exists('uploads/products'))
				{
					mkdir('uploads/products',0777,true);
				}
				$image->move('uploads/products',$imagename);
			}else{
				$imagename = "";
			}

            $product = new Product();
			$product->name = $request->name;
			$product->description = $request->description;
			$product->price = $request->price;
			$product->quantity = $request->quantity;
			$product->image = $imagename;
            $product->status = 1;
            $product->registerby = $request->user()->id;
			$product->save();

            return redirect()->route('products.index');
    }

    public function show(string $id){
        
    }

    public function edit(Product $product){
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, $id){
			$product = Product::find($id);
			
			$image = $request->file('image');
			$slug = str::slug($request->name);
			if (isset($image)){
				$currentDate = Carbon::now()->toDateString();
				$imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

				if (!file_exists('uploads/products')){
					mkdir('uploads/products',0777,true);
				}
				$image->move('uploads/products',$imagename);
			}else{
				$imagename = "";
			}
			
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->image = $imagename;
            $product->registerby = $request->user()->id;
            $product->save();
            
            return redirect()->route('products.index')->with('successMsg','El registro se ha actualizado exitosamente');
    
}

    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('products.index')->with('delete','ok');
    }

    public function changestatusproduct(Request $request){
		$product = Product::find($request->product_id);
		$product->status=$request->status;
		$product->save();
	}
}