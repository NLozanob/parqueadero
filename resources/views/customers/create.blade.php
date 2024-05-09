@extends('layouts.app')

@section('title','Create Customers')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
		<div class="container-fluid">
		</div>
    </section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header bg-secondary">
							<h3>@yield('title')</h3>
						</div>
						<form method="POST" action="{{route('customers.store')}}" enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Name<strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="name" placeholder="Example, plush" autocomplete="off" value="{{ old('name')}}" required>
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Identification document<strong style="color:red;">(*)</strong></label>
											<input type="input" class="form-control" name="identification_document" placeholder="0000" autocomplete="off" value="{{ old('identification_document')}}" required>
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Address<strong style="color:red;">(*)</strong></label>
											<input type="input" class="form-control" name="address" placeholder="cl #, Cr # ##" autocomplete="off" value="{{ old('address')}}" required>
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Phone number<strong style="color:red;">(*)</strong></label>
											<input type="input" class="form-control" name="phone_number" placeholder="0000000000" autocomplete="off" value="{{ old('phone_number')}}" required>
										</div>
										<div class="form-group label-floating">
											<label class="control-label">Email<strong style="color:red;">(*)</strong></label>
											<input type="input" class="form-control" name="email" placeholder="example@email.com" autocomplete="off" value="{{ old('email')}}" required>
										</div>
										</div>
                                        <div class="row">
                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Image</label>
                                                <input type="file" class="form-control-file" name="image" id="image" >
                                            </div>
                                        </div>
								</div>
									</div>
								</div>
								<input type="hidden" class="form-control" name="status" value="1">
								<input type="hidden" class="form-control" name="registradopor" value="{{ Auth::user()->id }}">
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
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