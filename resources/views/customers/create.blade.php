@extends('layouts.app')

@section('title','Create Customer')

@section('content')

<div class="content-wrapper" style="background-color: #F5F7F8">
    <section class="content-header">
		<div class="container-fluid">
		</div>
    </section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header" style="background-color: #495E57">
							<h3>@yield('title')</h3>
						</div>
						<form method="POST" action="{{route('customers.store')}}" enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Name<strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="name" placeholder="Example, Name" autocomplete="off" value="{{ old('name') }}" required>
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Identification document<strong style="color:red;">(*)</strong></label>
											<input type="input" class="form-control" name="identification_document" placeholder="000000" autocomplete="off" value="{{ old('identification_document') }}" required>
										</div>
                                        <label class="control-label">Address<strong style="color:red;">(*)</strong></label>
                                        <div class="form-group label-floating">
                                            <div style="display:flex;">
										        <textarea class="form-control" name="address" rows="2" placeholder="Enter Description"></textarea>
                                            </div>
										</div>
										<div class="form-group label-floating">
											<label class="control-label">Phone number<strong style="color:red;">(*)</strong></label>
											<input type="input" class="form-control" name="phone_number" placeholder="0800" autocomplete="off" value="{{ old('phone_number') }}" required>
										</div>
										<div class="form-group label-floating">
											<label class="control-label">Email<strong style="color:red;">(*)</strong></label>
											<input type="input" class="form-control" name="email" placeholder="example@gmail.com" autocomplete="off" value="{{ old('email') }}" required>
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