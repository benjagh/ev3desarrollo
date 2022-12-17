<!-- /.Breadcrumb -->
<!--<section id="breadcrumb">-->
<!--	<div class="container"   id="no_print2">-->
<!--		<ol class="breadcrumb">-->
<!--			<li><a href="#">Sales / Sell Medicine </a></li>-->
<!--			<li class="active">--><?php //echo $msg; ?>
<!--</li>-->
<!--		</ol>-->
<!--	</div>-->
<!--</section>-->

<!-- /.container -->
<style>
	fieldset{
		border: 1px solid #d1d1d1;
    	padding: 0.5em 1em;
	}
	fieldset legend{
		margin-bottom: 0.2em;
		border: unset;
		width: auto;
		padding: 0 0.5em;
		color: #b3b3b3;
		font-size: 1em;
	}
</style>
<section id="main">
    <div class="container">

        <div class="row">
            <!--			<div class="col-md-3"  id="no_print3">-->
            <!--				<div class="list-group">-->
            <!--					<a href="index.html" class="list-group-item active main-color-bg">-->
            <!--						<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Sales</a>-->
            <!--					<a href="--><?php //echo base_url(); ?>
            <!--ShowForm/venta_productos/main"-->
            <!--					   class="list-group-item">-->
            <!--						<span class="	fa fa-capsules" aria-hidden="true"></span> Sell Medicine</a>-->
            <!--					<a href="--><?php //echo base_url(); ?>
            <!--ShowForm/declaracion_ventas/main"-->
            <!--					   class="list-group-item">-->
            <!--						<span class="	fa fa-capsules" aria-hidden="true"></span> Sales Statement</a>-->
            <!--				</div>-->
            <!--			</div>-->
            <div class="col-md-12" id="full_page">
                <div class="rounded-0 panel panel-default" id="no_print1">
                    <div class="panel-heading rounded-0 main-color-bg">
                        <h3 class="panel-title"> Venta de productos </h3>
                    </div>

                    <div class="panel-body">

                        <!-- /.rounded-0 panel End -->

                        <div class="box-body">
                        <div class="row">
								<div class="col-sm-4" style="">
									<label for="date">Fecha</label>
									<input type="text" class="form-control datepicker"
										   placeholder="Insert Date" name="date" id="date" value="<?php  echo date('Y-m-d'); ?>"
										   autocomplete="off">
								</div>
								<div class="col-sm-6" style="">
									<label for="nombre_cliente">Correo de cliente</label>
									<input type="email" class="form-control"
										   placeholder="Correo" name="correo_cliente" id="correo_cliente"
										   autocomplete="off" required>
								</div>
							</div>
							<fieldset class="border pb-2" style="border: 1px solid #d1d1d1;padding: 0.5em 1em">
								<legend>Seleccionar producto</legend>
								<div class="row">
									<div class="col-sm-7" style="">
										<label for="nombre_producto">Producto</label>
										<select name="nombre_producto" id="nombre_producto" class="form-control selectpicker"
												data-live-search="true">
											<option value="">-- Seleccionar --</option>
											<?php foreach ($all_value as $info) {
												if($info->nombre_producto != '') {
												?>
												<option value="<?php echo $info->nombre_producto_id."###".$info->nombre_producto."###".$info->marca."###".$info->tipo_de_producto; ?>"><?php echo $info->nombre_producto." - ".$info->marca."  - ".$info->unidad." [ ".$info->tipo_de_producto." - ".$info->cantidad." ]"; ?></option>
											<?php }} ?>
										</select>
									</div>
									<div class="col-sm-4">
										<label for="cantidad">Cantidad</label>
										<input type="number" class="form-control" id="cantidad" name="cantidad" value="0" autocomplete="off">
									</div>

									<div class="col-sm-4">
										<label for="precio_venta_unitario">Precio de venta</label>
										<input type="number" class="form-control" id="precio_venta_unitario" placeholder="$"
											name="precio_venta_unitario" readonly>
									</div>

									<div class="col-sm-4">
										<label for="precio_compra">Cantidad total</label>
										<input type="number" class="form-control" id="precio_compra" placeholder="$"
											name="precio_compra" readonly>
									</div>

									<div class="col-sm-4" style="margin-top: 25px;">
										<button type="button" class="pull-left btn btn-primary" id="add_item">Agregar</button>
									</div>
								</div>
							</fieldset>


                        </div>
                    </div>
                </div><!-- /.rounded-0 panel End -->
            </div>
            <!-- /.rounded-0 panel 2nd -->
            <div class="col-md-12" id="no_print4">
                <div class="rounded-0 panel panel-default">
                    <div class="panel-heading rounded-0">
                        <h3 class="panel-title">Ventas de productos</h3>
                    </div>


                    <table id="salesList" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Fecha</th>
                                <th style="text-align: center;">Producto</th>
                                <th style="text-align: center;">Precio unidadario</th>
                                <th style="text-align: center;">Cantidad</th>
                                <th style="text-align: center;">Monto</th>
                                <th style="text-align: left;">Acción</th>
                            </tr>
                        </thead>
                        <tbody id="show_all_sales">

                        </tbody>
                        <tr>
                            <td colspan="">
                                Monto<input type="text" class="form-control" id="amount"
                                    style="color: black; border: black 2px solid;" value="0" name="amount" readonly>
                            </td>
                            <td colspan="">
                                Descuento<input type="number" class="form-control" id="discount"
                                    style="color: black; border: black 2px solid;" value="0" placeholder="Discount"
                                    name="discount">
                            </td>
                            <td colspan="2">
                                Subtotal<input type="text" class="form-control" id="sub_total" value="0"
                                    style="color: black; border: black 2px solid;" name="sub_total" readonly>
                            </td>
                            <td colspan="2">
                                Cantidad pagada<input type="number" class="form-control" id="pay" value="0"
                                    style="color: black; border: black 2px solid;" name="pay" readonly>
                            </td>
                            <!--							<td colspan="2">-->
                            <!--								Due<input type="text" class="form-control" id="due"-->
                            <!--										  value="0" style="color: black; border: black 2px solid;" name="due"-->
                            <!--										  readonly>-->
                            <!--							</td>-->
                            <td colspan="2">
                                <div style="margin-top: 20px;">
                                    <button style="" type="button" class=" btn btn-success " id="sell_btn">Vender</button>
                                </div>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.Container -->
</section>


<script type="text/javascript">
$("#nombre_producto").on("change paste keyup", function() {
    // var nombre_producto = $('#nombre_producto').val();
    var medicine = $('#nombre_producto').val().split("###");
    var nombre_producto_id = medicine[0];
    var nombre_producto = medicine[1];
    var post_data = {
        'nombre_producto': nombre_producto,
        'nombre_producto_id': nombre_producto_id,
        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
    };

    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Get_ajax_value/get_medicine_price",
        data: post_data,
        success: function(data) {
            $('#precio_venta_unitario').val(data);
        }
    });
}); // Medicine Price
//amount calculation
$("#cantidad").on("change paste keyup", function() {
    var precio_venta_unitario = $('#precio_venta_unitario').val();
    var cantidad = $('#cantidad').val();
    var total = parseFloat(precio_venta_unitario) * parseFloat(cantidad);
    $('#precio_compra').val(total);
});

// ADD MEDICINE
var complete_total = 0;
var all_purchase = new Array();
var product_count = 0;
$("#add_item").click(function() {
    var date = $('#date').val();
    // var nombre_cliente = $('#nombre_cliente').val();
    var correo_cliente = $('#correo_cliente').val();
    var medicine = $('#nombre_producto').val().split("###");
    var nombre_producto_id = medicine[0];
    var nombre_producto = medicine[1];
    var marca = medicine[2];
    var tipo_de_producto = medicine[3];
    var precio_venta_unitario = $('#precio_venta_unitario').val();
    var cantidad = $('#cantidad').val();
    var precio_compra = $('#precio_compra').val();
    all_purchase[product_count] = new Array(date, nombre_producto, precio_venta_unitario, cantidad, precio_compra,
        nombre_producto_id, marca, tipo_de_producto, correo_cliente);
    var full_table = "";
    var test_total = 0;
    for (var i = 0; i < all_purchase.length; i++) {
        test_total += Number(all_purchase[i][4]);
        full_table += "<tr>";
        for (var j = 0; j < all_purchase[i].length - 4; j++) {
            full_table += "<td style='text-align: center;'>" + all_purchase[i][j] + "</td>";
        }
        full_table += "<td><button class='btn btn-danger' onclick='delete_data(" + i +
            ")'>Delete</button></td></tr>";
    }
    $('#show_all_sales').html(full_table);
    $('#precio_venta_unitario').val('');
    $('#cantidad').val('0');
    $('#nombre_producto').val('');
    $('#precio_compra').val('');
    product_count++;
    complete_total = test_total;
    calculation();
});
// DELECT ADDED MEDICINE
function delete_data(arr_no) {
    all_purchase.splice(arr_no, 1);
    var full_table = "";
    var test_total = 0;
    for (var i = 0; i < all_purchase.length; i++) {
        test_total += Number(all_purchase[i][5]);
        full_table += "<tr>";
        for (var j = 0; j < all_purchase[i].length - 4; j++) {
            full_table += "<td style='text-align: center;'>" + all_purchase[i][j] + "</td>";
        }
        full_table += "<td><button class='btn btn-danger' onclick='delete_data(" + i + ")'>Delete</button></td></tr>";
    }
    $('#show_all_sales').html(full_table)

    product_count--;
    console.log(all_purchase);
    complete_total = test_total;
    calculation();
}

$("#discount, #pay").on("change paste keyup", function() {
    calculation();
});

function calculation() {
    $('#amount').val(complete_total);
    var discount = $('#discount').val();
    if (discount == "") {
        discount = 0;
    }
    $('#sub_total').val(Number(complete_total - discount));
    $('#pay').val(Number(complete_total - discount));
    var pay = $('#pay').val();
    if (pay == "") {
        pay = 0;
    }
    var after_pay = Number(complete_total - discount - pay);
    if (after_pay >= 0) {
        $('#due').val(after_pay);
    }
}
$("#sell_btn").click(function() {
    //$(#no_print4).hide();
    var amount = $('#amount').val();
    var discount = $('#discount').val();
    var sub_total = $('#sub_total').val();
    var pay = $('#pay').val();
    var due = $('#due').val();
    if (pay != 0 && pay > 0) {
        var post_data = {
            'amount': amount,
            'discount': discount,
            'sub_total': sub_total,
            'pay': pay,
            'due': due,
            'all_purchase': all_purchase
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/sales_confirm",
            data: post_data,
            success: function(data) {
                $('#full_page').html(data);

            }
        });
    } else {
        alert("No se puede vender");
    }
});
</script>