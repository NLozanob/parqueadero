@extends('layouts.app')

@section('title','Create Order')

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
									<!-- SELECT CUSTOMER -->
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label" for="selectcustomer">Customer <strong style="color: red;">(*)</strong></label>
											<select class="form-control select2" style="width: 100%;" name="customer" id="customer">
												<option value>Select Customer</option>
												@foreach($customers as $customer)
													<option value="{{$customer->id}}">{{$customer -> name}}</option>
												@endforeach
											</select>
										</div>										
									</div>
									<!-- DATE -->
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Date Order<strong style="color:red;">(*)</strong></label>
											<input type="date" class="form-control" name="date" placeholder="YYYY-MM-DD" autocomplete="off" value="{{$date}}">
										</div>
									</div>

									<!-- SELECT PRODUCTS TABLE -->
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									   <div class="card">
									       <div class="card-header bg-secondary">
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
									                               <option value="{{$product->id}}"  data-price="{{$product->price}}">{{$product->name}}</option>
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
									                   <button type="button" class="btn btn-success btn-block" id="add_producto">Add</button>
									               </div>
									           </div>
									       </div>
									   </div>
									</div>

									<!-- Tabla para mostrar los detalles del pedido -->
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4">
									    <div class="card">
									        <!-- <div class="card-header bg-secondary">
									            <h3>Order Details</h3>
									        </div> -->
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


								</div>
								</div>
								</div>
								<input type="hidden" class="form-control" name="estado" value="1">
								<input type="hidden" class="form-control" name="registradopor" value="{{ Auth::user()->id }}">
							</div>
                        
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Create</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('orders.index') }}" class="btn btn-danger btn-block btn-flat">Back</a>
									</div>
								</div>
							</div>
						</form>
						<br>
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
		monthsShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
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
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        // Actualizar precio unitario al cambiar la selección de producto
        $("#product").change(function () {
            var selectedProductId = $(this).val();
            var selectedProductPrice = $(this).find('option:selected').data('price');
            $("#price").val(selectedProductPrice);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        // Arreglo para almacenar los detalles del pedido
        var orderDetails = [];

        // Función para agregar una fila a la tabla
        function addRowToTable(productName, quantity, price, subtotal) {
            var row = "<tr>" +
                        "<td>" + productName + "</td>" +
                        "<td>" + quantity + "</td>" +
                        "<td>" + price + "</td>" +
                        "<td>" + subtotal + "</td>" +
                        '<td><button type="button" class="btn btn-danger btn-sm btn-delete">Delete</button></td>' +
                      "</tr>";
            $("#order_details_table tbody").append(row);
        }

        // Función para calcular el subtotal
        function calculateSubtotal(quantity, price) {
            return quantity * price;
        }

		// Función para calcular y actualizar el total
        function updateTotal() {
            var total = 0;
            $("#order_details_table tbody tr").each(function() {
                var subtotal = parseFloat($(this).find("td:eq(3)").text());
                total += subtotal;
            });
            $("#total").text(total.toFixed(2));
        }

        // Evento clic del botón "Add"
        $("#add_producto").on('click', function () {
            var productName = $("#product option:selected").text();
            var quantity = parseInt($("#quantity").val());
            var price = parseFloat($("#price").val());
            var subtotal = calculateSubtotal(quantity, price);

            // Agregar detalles a la tabla y al arreglo
            addRowToTable(productName, quantity, price, subtotal);
            orderDetails.push({productName: productName, quantity: quantity, price: price, subtotal: subtotal});

            // Limpiar campos
            $("#quantity").val(0);
            $("#price").val('');
            $("#subtotal").val('');

			// Actualizar total
			updateTotal();

            // Asignar evento clic al botón de eliminar
            $(".btn-delete").off().on('click', function () {
                var rowIndex = $(this).closest('tr').index();
                $(this).closest('tr').remove();
                orderDetails.splice(rowIndex, 1);
				updateTotal();
            });
        });

        // Formulario de pedido submit
        $("form").on('submit', function () {
            // Serializar los detalles del pedido y agregarlos al formulario
            var serializedOrderDetails = JSON.stringify(orderDetails);
            $("<input>").attr("type", "hidden").attr("name", "order_details").val(serializedOrderDetails).appendTo($(this));
        });
    });
</script>
@endpush