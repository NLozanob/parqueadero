@extends('layouts.app')

@section('title','Create Orders')

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
						<form method="POST" action="{{route('orders.store')}}" enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="row">
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label" for="selectcustomer">Select Customer<strong style="color:red">(*)</strong></label>
											<select class="form-control" name="selectcustomer" id="selectcustomer">
												<option value>Select Customer</option>
												@foreach($customers as $customer)
													<option value="{{ $customer->id }}">{{ $customer->name }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6 col-md-4 col-xs-12">
								<div class="form-group label-floating">
									<label class="control-label">Date Order<strong style="color:red;">(*)</strong></label>
									<input type="date" class="form-control" name="date" placeholder="YYYY-MM-DD" autocomplete="off" value="{{$date}}">
								</div>
							</div>
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
										<a href="{{ route('orders.index') }}" class="btn btn-danger btn-block btn-flat">Back</a>
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

@push('scripts')
<script type="text/javascript">
	$("#customer").select2({
		allowClear: true
	});
</script>

<script type="text/javascript">
	$.fn.datepicker.dates['en'] = {
		days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		daysShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
		daysMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
		months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		monthsShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
		format: "yyyy-mm-dd"
	};
	$('#date').datepicker({
		language: 'en'
	});
</script>
@endpush