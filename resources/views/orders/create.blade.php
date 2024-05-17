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
									                       <input type="number" class="form-control" name="quantity" id="quantity" value="0">
									                   </div>
									               </div>
									               <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
									                   <div class="form-group label-floating">
									                       <label class="control-label">Price <strong style="color:red;">(*)</strong></label>
									                       <input type="number" class="form-control" name="price" id="price">
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
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4" style="margin: auto;">
									    <button type="submit" class="btn btn-block" id="register_button" style="display: none; background-color: #40A578;">Resgister</button>
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
    // Función para calcular el subtotal
    function calculateSubtotal(quantity, price) {
        return quantity * price;
    }

    $(document).ready(function () {
        // Calcular subtotal al cambiar la cantidad o el precio
        $("#quantity, #price").on('input', function () {
            var quantity = parseInt($("#quantity").val());
            var price = parseFloat($("#price").val());
            var subtotal = calculateSubtotal(quantity, price);
            $("#subtotal").val(subtotal.toFixed(2));
        });

        // Actualizar precio unitario al cambiar la selección de producto
        $("#product").change(function () {
            var selectedProductId = $(this).val();
            var selectedProductPrice = $(this).find('option:selected').data('price');
            $("#price").val(selectedProductPrice);
        });

        // Arreglo para almacenar los detalles del pedido
        var orderDetails = [];

        // Función para agregar una fila a la tabla
        function addRowToTable(productName, quantity, price, subtotal) {
            var row = "<tr>" +
                        "<td>" + productName + "</td>" +
                        "<td>" + quantity + "</td>" +
                        "<td>" + price + "</td>" +
                        "<td>" + subtotal.toFixed(2) + "</td>" +
                        "<td><button type='button' class='btn btn-danger remove_detail'>Remove</button></td>" +
                      "</tr>";
            $("#order_details_table tbody").append(row);
        }

        // Función para actualizar el total
        function updateTotal() {
            var total = orderDetails.reduce((sum, detail) => sum + detail.subtotal, 0);
            $("#total").text(total.toFixed(2));
        }

        // Función para verificar si hay detalles y mostrar el botón de registro
        function toggleRegisterButton() {
            if (orderDetails.length > 0) {
                $("#register_button").show();
            } else {
                $("#register_button").hide();
            }
        }

        // Manejar el evento de agregar producto
        $("#add_producto").click(function () {
            var productId = $("#product").val();
            var productName = $("#product option:selected").text();
            var quantity = parseInt($("#quantity").val());
            var price = parseFloat($("#price").val());
            var subtotal = calculateSubtotal(quantity, price);

            // Agregar el detalle al arreglo
            orderDetails.push({ productId, productName, quantity, price, subtotal });

            // Agregar la fila a la tabla
            addRowToTable(productName, quantity, price, subtotal);

            // Actualizar el total
            updateTotal();

            // Limpiar los campos del formulario
            $("#product").val(null).trigger('change');
            $("#quantity").val(0);
            $("#price").val('');
            $("#subtotal").val('');

            // Mostrar el botón de registro si hay detalles
            toggleRegisterButton();
        });

        // Manejar el evento de eliminar detalle
        $(document).on('click', '.remove_detail', function () {
            var rowIndex = $(this).closest('tr').index();
            orderDetails.splice(rowIndex, 1);
            $(this).closest('tr').remove();

            // Actualizar el total
            updateTotal();

            // Mostrar u ocultar el botón de registro según los detalles
            toggleRegisterButton();
        });
    });
</script>
@endpush