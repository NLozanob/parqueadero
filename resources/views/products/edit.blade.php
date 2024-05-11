@extends('layouts.app')

@section('title','Edit Product')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
		<div class="container-fluid">
		</div>
    </section>
	@include('layouts.partial.msg')
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header bg-secondary">
							<h3>@yield('title')</h3>
						</div>
						<form method="POST" action="{{ route('products.update',$product)}}" enctype="multipart/form-data">
                            @csrf
							@method('PUT')
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Name <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="name" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ $product->name }}">
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Price <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="price" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ $product->price }}">
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Quantity <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="quantity" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ $product->quantity }}">
										</div>
                                        <div class="form-group label-floating">
										<label class="control-label">Description<strong style="color:red;">(*)</strong></label>
                                        <div class="form-group label-floating">
                                            <div style="display:flex;">
										        <textarea class="form-control" name="description" rows="2" placeholder="Enter address">{{ old('description', $product->description) }}</textarea>
                                            </div>
										</div>
										</div>
                                        
                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Image</label>
                                                <input type="file" class="form-control-file" name="image" id="image">
												@if($product->image)
        											<img src="{{ asset('uploads/products/'.$product->image) }}" alt="Product Image" style="height: 70px; width: 70px">
    											@endif
                                            </div>
                                        </div>
								
									</div>
								</div>
								<input type="hidden" class="form-control" name="registerby" value="{{ Auth::user()->id }}">
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Edit</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('products.index') }}" class="btn btn-danger btn-block btn-flat">Back</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection