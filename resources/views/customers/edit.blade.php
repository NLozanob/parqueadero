@extends('layouts.app')

@section('title','Edit Customer')

@section('content')

<div class="content-wrapper" style="background-color: #F5F7F8">
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
						<div class="card-header" style="background-color: #495E57">
							<h3>@yield('title')</h3>
						</div>
						<form method="POST" action="{{ route('customers.update',$customer)}}" enctype="multipart/form-data">
                            @csrf
							@method('PUT')
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
									<div class="form-group label-floating">
											<label class="control-label">Name<strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="name" placeholder="Example, plush" autocomplete="off" value="{{$customer->name}}">
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Identification document<strong style="color:red;">(*)</strong></label>
											<input type="input" class="form-control" name="identification_document" placeholder="0000" autocomplete="off" value="{{$customer->identification_document}}">
										</div>
                                        <label class="control-label">Address<strong style="color:red;">(*)</strong></label>
                                        <div class="form-group label-floating">
                                            <div style="display:flex;">
										        <textarea class="form-control" name="address" rows="2" placeholder="Enter address" value="{{$customer->address}}">{{ old('address', $customer->address) }}</textarea>
                                            </div>
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Phone number<strong style="color:red;">(*)</strong></label>
											<input type="input" class="form-control" name="phone_number" placeholder="0000000000" autocomplete="off" value="{{$customer->phone_number}}">
										</div>
										<div class="form-group label-floating">
											<label class="control-label">Email<strong style="color:red;">(*)</strong></label>
											<input type="input" class="form-control" name="email" placeholder="example@email.com" autocomplete="off" value="{{$customer->email}}">
										</div>
                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Image</label>
                                                <input type="file" class="form-control-file" name="image" id="image">
												@if($customer->image)
        											<img src="{{ asset('uploads/customers/'.$customer->image) }}" alt="Customer Image" style="height: 70px; width: 70px">
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
										<button type="submit" class="btn btn-block" style="background-color: #40A578;">Create</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('customers.index') }}" class="btn btn-danger btn-block">Back</a>
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