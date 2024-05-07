@extends('layouts.app')

@section('title','Edit Customer')

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
						<form method="POST" action="{{ route('customers.update',$customer)}}" enctype="multipart/form-data">
                            @csrf
							@method('PUT')
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Name <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="name" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ $customer->name }}">
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Price <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="price" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ $customer->price }}">
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Quantity <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="quantity" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ $customer->quantity }}">
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Description <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="description" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ $customer->description }}">
										</div>
                                        
                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Image</label>
                                                <input type="file" class="form-control-file" name="image" id="image" value="{{ $customer->image}}">
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
										<a href="{{ route('customers.index') }}" class="btn btn-danger btn-block btn-flat">Back</a>
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