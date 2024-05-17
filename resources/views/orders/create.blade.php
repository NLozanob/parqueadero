@extends('layouts.app')

@section('title','Create Order')

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
						<form method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="row">
									<!-- SELECT CUSTOMER -->
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label" for="selectcustomer">Customer <strong style="color: red;">(*)</strong></label>
											<select class="form-control select2" style="width: 100%;" name="customer" id="customer">
												<option value>Select Customer</option>
												@foreach($customers as $customer)
													<option value="{{ $customer->id }}">{{ $customer->name }}</option>
												@endforeach
											</select>
										</div>										
									</div>
									<!-- DATE -->
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Date Order<strong style="color:red;">(*)</strong></label>
											<input type="date" class="form-control" name="date" placeholder="YYYY-MM-DD" autocomplete="off" value="{{ $date }}">
										</div>
									</div>

									<!-- SELECT PRODUCTS TABLE -->
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									   <div class="card">
									       <div class="card-header" style="background-color: #495E57">
									           <h3>Order Detail</h3>
									       </div>
									       <div class="card-body">
									           <div class="row">
									               <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									                   <div class="form-group label-floating">
									                       <label class="control-label">Product <strong style="color:red;">(*)</strong></label>
									                       <select class="form-control select2" style="width: 100%;" name="product" id="product">
									                           <option value>Select Product</option>
									                           @foreach($products as $product)
									                               <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
									                           @endforeach
									                       </select>
									                   </div>
									               </div>
									               <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
									                   <div class="form-group label-floating">
									                       <label class="control-label">Quantity <strong style="color:red;">(*)</strong></label>
									                       <input type="number" class="form-control" name="quantity" id="quantity" value="1">
									                   </div>
									               </div>
									               <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
									                   <div class="form-group label-floating">
									                       <label class="control-label">Price <strong style="color:red;">(*)</strong></label>
									                       <input type="number" class="form-control" name="price" id="price" readonly>
									                   </div>
									               </div>
									               <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
									                   <div class="form-group label-floating">
									                       <label class="control-label">Subtotal</label>
									                       <input type="text" class="form-control" name="subtotal" id="subtotal" readonly>
									                   </div>
									               </div>
									               <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 mt-4">
									                   <button type="button" class="btn btn-block" id="add_producto" style="background-color: #40A578;">ADD</button>
									               </div>
									           </div>
									       </div>
									   </div>
									</div>

									<!-- Tabla para mostrar los detalles del pedido -->
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4">
									    <div class="card">
									        <div class="card-body">
									            <table class="table table-bordered" id="order_details_table">
									                <thead>
									                    <tr>
									                        <th>Product</th>
									                        <th>Quantity</th>
									                        <th>Price</th>
									                        <th>Subtotal</th>
									                        <th>Action</th>
									                    </tr>
									                </thead>
									                <tbody>
									                    <!-- Aquí se mostrarán las filas dinámicas -->
									                </tbody>
													<tfoot>
                									    <tr>
                									        <th colspan="3">Total:</th>
                									        <th id="total" colspan="2">0.00</th>
                									    </tr>
                									</tfoot>
									            </table>
									        </div>
									    </div>
									</div>

									<!-- Botón Registrar -->
									<div class="col-lg-4 col-xs-6" style="margin: auto;">
									    <button type="submit" class="btn btn-block" id="register_button" style="display: none; background-color: #40A578;">Register</button>
									</div>
								</div>
								<input type="hidden" class="form-control" name="status" value="1">
								<input type="hidden" class="form-control" name="resgisterby" value="{{ Auth::user()->id }}">
							</div>
						</form>
						
						<div class="card-footer" >
							<div class="row">
								<div class="col-lg-2 col-xs-1">
									<a href="{{ route('orders.index') }}" class="btn btn-danger btn-block">Back</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection

@push('scripts')
<!-- SCRIPT TO SELECT CLIENT -->
<script type="text/javascript">
	$("#customer").select2({
		allowClear: true
	});
</script>

<!-- SCRIPT TO LOCAL DATE -->
<script type="text/javascript">
	$.fn.datepicker.dates['en'] = {
		days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		daysShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
		daysMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
		months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		monthsShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
		format: "yyyy-mm-dd"
	};
	$('#date').datepicker({
		language: 'en'
	});
</script>

<!-- SCRIPT TO SELECT PRODUCT -->
<script type="text/javascript">
	$("#product").select2({
		allowClear: true
	});
</script>

<script type="text/javascript">
    $(document).ready(function() {
        let productSelect = $('#product');
        let productPrice = $('#price');
        let productQuantity = $('#quantity');
        let productSubtotal = $('#subtotal');
        let addProductButton = $('#add_producto');
        let orderDetailsTable = $('#order_details_table tbody');
        let totalElement = $('#total');
        let registerButton = $('#register_button');
        let total = 0;

        // Actualizar subtotal cuando se selecciona un producto o se cambia la cantidad
        function updateSubtotal() {
            let price = parseFloat(productPrice.val()) || 0;
            let quantity = parseInt(productQuantity.val()) || 0;
            let subtotal = price * quantity;
            productSubtotal.val(subtotal.toFixed(2));
        }

        productSelect.on('change', function() {
            let selectedOption = $(this).find('option:selected');
            let price = selectedOption.data('price') || 0;
            productPrice.val(price);
            updateSubtotal();
        });

        productQuantity.on('input', updateSubtotal);
		

        // Añadir producto a la tabla de detalles del pedido
        addProductButton.on('click', function() {
            let selectedOption = productSelect.find('option:selected');
            let productId = selectedOption.val();
            let productName = selectedOption.text();
            let quantity = parseInt(productQuantity.val());
            let price = parseFloat(productPrice.val());
            let subtotal = parseFloat(productSubtotal.val());

            if (productId && quantity > 0 && price > 0) {
                let newRow = `
                    <tr>
                        <td>${productName}</td>
                        <td>${quantity}</td>
                        <td>$${price.toFixed(2)}</td>
                        <td>$${subtotal.toFixed(2)}</td>
                        <td><button type="button" class="btn btn-danger btn-sm remove-product">Remove</button></td>
                    </tr>
                `;
                orderDetailsTable.append(newRow);

                total += subtotal;
                totalElement.text(total.toFixed(2));

                // Mostrar el botón de registrar
                registerButton.show();
            }
        });

        // Eliminar producto de la tabla de detalles del pedido
        orderDetailsTable.on('click', '.remove-product', function() {
            let row = $(this).closest('tr');
            let subtotal = parseFloat(row.find('td').eq(3).text().replace('$', ''));
            total -= subtotal;
            totalElement.text(total.toFixed(2));
            row.remove();

            // Ocultar el botón de registrar si no hay productos en la lista
            if (orderDetailsTable.find('tr').length === 0) {
                registerButton.hide();
            }
        });
    });
</script>
@endpush
