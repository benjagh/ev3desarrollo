<?php
if ($msg == "main") {
	$msg = "";
} elseif ($msg == "empty") {
	$msg = "Please fill out all required fields";
} elseif ($msg == "created") {
	$msg = "Created Successfully";
} elseif ($msg == "edit") {
	$msg = "Edited Successfully";
} elseif ($msg == "delete") {
	$msg = "Eliminado correctamente";
}
?>
<!-- /.Breadcrumb -->
<section id="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Inventario</a></li>
            <li class="active"><?php echo $msg; ?></li>
        </ol>
    </div>
</section>
<style>
	tr.expired {
		background: #ff000012 !important;
		color: #c57575 !important;
	}
</style>

<!-- /.container -->
<section id="main">
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="index.html" class="list-group-item active main-color-bg">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Inventario</a>
                    <a href="<?php echo base_url(); ?>ShowForm/medicine_purchase_info/main"
                        class="list-group-item active">
                        <span class="" aria-hidden="true"></span> Agregar información de producto</a>
                    <a href="<?php echo base_url(); ?>ShowForm/medicine_purchase_statement/main" class="list-group-item">
                        <span class="" aria-hidden="true"></span> Detalle de compras</a>
                    <a href="<?php echo base_url(); ?>ShowForm/supplier_payment/main" class="list-group-item">
                        <span class="" aria-hidden="true"></span>  Pagos a proveedores</a>
<!--                    <a href="--><?php //echo base_url(); ?><!--ShowForm/create_product_name/main" class="list-group-item">-->
<!--                        <span class="fa fa-plus" aria-hidden="true"></span> Ledger</a>-->
                </div>
            </div>
            <div class="col-md-9">
                <div class="rounded-0 panel panel-default">
                    <div class="panel-heading rounded-0 main-color-bg">
                        <h3 class="panel-title"> Agregar información de producto</h3>
                    </div>

                    <div class="panel-body">

                        <!-- /.rounded-0 panel End -->
                        <?php echo form_open_multipart('Insert/medicine_purchase_info'); ?>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-3" style="">
                                    <label for="nombre_producto">Producto</label>
									<select name="nombre_producto" id="nombre_producto" class="form-control selectpicker"
											data-live-search="true">
										<option value="">-- Seleccionar --</option>
										<?php foreach ($all_medicine as $info) { ?>
											<option value="<?php echo $info->nombre_producto."#".$info->nombre_producto_id; ?>"><?php echo $info->nombre_producto; ?></option>
										<?php } ?>
									</select>
                                </div>
								<div class="col-sm-3" style="">
									<label for="generic">Marca</label>
									<select name="generic" id="generic" class="form-control selectpicker"
											data-live-search="true">
										<option value="">-- Seleccionar --</option>
										<?php foreach ($all_generic as $info) { ?>
											<option value="<?php echo $info->marca."#".$info->marca_id; ?>"><?php echo $info->marca; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-sm-3" style="">
									<label for="presentation">Tipo de Producto</label>
									<select name="presentation" id="presentation" class="form-control selectpicker"
											data-live-search="true">
										<option value="">-- Seleccionar --</option>
										<?php foreach ($all_presen as $info) { ?>
											<option value="<?php echo $info->tipo_de_producto."#".$info->tipo_producto_id; ?>"><?php echo $info->tipo_de_producto; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-sm-3" style="">
									<label for="supplier">Empresa proveedora</label>
									<select name="supplier" id="supplier" class="form-control selectpicker"
											data-live-search="true">
										<option value="">-- Seleccionar --</option>
										<?php foreach ($all_sup as $info) { ?>
											<option value="<?php echo $info->nombre_proveedor."#".$info->proveedor_id; ?>"><?php echo $info->nombre_proveedor; ?></option>
										<?php } ?>
									</select>
								</div>
                            </div>
                            <div class="row">
								<div class="col-sm-3">
									<label for="cantidad">Cantidad total</label>
									<input type="number" class="form-control" id="cantidad" name="cantidad">
								</div>
                                <div class="col-sm-3" style="">
                                    <label for="precio_unitario">Precio unitario</label>
                                    <input type="number" step=any class="form-control" id="precio_unitario"  name="precio_unitario">
                                </div>
								<div class="col-sm-3">
									<label for="precio_compra">Cantidad total</label>
									<input type="number" step=any class="form-control" id="precio_compra" placeholder="$"
										   name="precio_compra">
								</div>
								<div class="col-sm-3">
									<label for="precio_venta_unitario">Precio de venta</label>
									<input type="number" step=any class="form-control" id="precio_venta_unitario" placeholder="$"
										   name="precio_venta_unitario">
								</div>
                            </div>
                            <div class="row">
								<div class="col-sm-3">
									<label for="unidad">Volumen</label>
									<input type="text" class="form-control" id="unidad" placeholder=""
										   name="unidad">

								</div>
								<div class="col-sm-3">
									<label for="compra_pagada">Monto pagado</label>
									<input type="number" class="form-control" id="compra_pagada" placeholder="$"
										   name="compra_pagada">
								</div>
								<div class="col-sm-3">
									<label for="compra_vencida">Monto adeudado</label>
									<input type="number" step=any class="form-control" id="compra_vencida" placeholder="$"
										   name="compra_vencida">
								</div>
								<div class="col-sm-3">
									<label for="ex_date">Fecha de expiración</label>
									<input type="date"  class="form-control new_datepicker" id="ex_date"
										 placeholder="Date" name="ex_date" autocomplete="off">
								</div>
								<div class="col-sm-3" style="display: none">
									<label for="date">Fecha</label>
									<input type="text" class="form-control new_datepicker" id="date"
										   value="<?php echo date('y-m-d'); ?>" placeholder="Date" name="date" autocomplete="off">
								</div>
                            </div>
							<div class="row">
								<div class="col-sm-4" style="margin-top: 17px;">
									<button type="submit" class="pull-left btn btn-primary">Agregar</button>
								</div>
							</div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.rounded-0 panel End -->
			</div>
                <!-- /.rounded-0 panel 2nd -->
			<div class="col-md-12">
                <div class="rounded-0 panel panel-default">
                    <div class="panel-heading rounded-0">
                        <form method="post" action="<?php echo base_url(); ?>export_csv/export">
                            <h3 class="panel-title">Lista de productos
<!--								<input type="submit" name="export"-->
<!--                                    class="btn btn-success btn-xs" value="Export to CSV" />-->
							</h3>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">#</th>
                                        <th style="text-align: center;">Detalles</th>
                                        <th style="text-align: center;">Proveedor</th>
                                        <th style="text-align: center;">Cantidad disp</th>
                                        <th style="text-align: center;">Precio unitario</th>
										  <th style="text-align: center;">Cantidad total</th>
										 <th style="text-align: center;">Precio de venta</th>
										   <th style="text-align: center;">Pagado</th>
										  <th style="text-align: center;">Adeudado</th>
										<th style="text-align: center;">Fecha de expiración</th>
                                        <th style="text-align: center;">Acción</th>
                                    </tr>
                                </thead>
                                <!-- /.Row from DB-->
                                <tbody>
                                    <?php
								$count = 0;
								foreach ($all_value as $single_value) {
									$count++;
									$mid = $single_value->nombre_producto_id;
									$available = $single_value->cantidad;
									if(isset($sold[$mid]))
										$available -= $sold[$mid];
									if($single_value->informe_detallado != "Payment"){
									?>

                                    <tr class="<?= (date("Y-m-d") >= $single_value->fecha_caducidad) ? 'expired' : '' ?>">
                                        <td style="text-align: center;"><?php echo $count; ?></td>
                                        <td style="text-align: left;">
										<b>Producto:</b>	<?php echo $single_value->nombre_producto; ?>  <br>
										<b>Marca:</b>	<?php echo $single_value->marca; ?></br>
										<b>Presentación:</b>	<?php echo $single_value->tipo_de_producto; ?> </br>
										<b>Volumen:</b>	<?php echo $single_value->unidad; ?> </br>
										<b>Fecha:</b>	<?php echo $single_value->date; ?>
										</td>
                                        <td style="text-align: center;"><?php echo $single_value->nombre_proveedor; ?></td>
                                        <!-- <td style="text-align: center;"><?php echo $single_value->cantidad; ?></td> -->
                                        <td style="text-align: center;"><?php echo $available; ?></td>
                                        <td style="text-align: center;"><?php echo '$'.$single_value->precio_unitario; ?></td>
										<td style="text-align: center;"><?php echo '$'.$single_value->precio_compra; ?></td>
										<td style="text-align: center;"><?php echo '$'.$single_value->precio_venta_unitario; ?></td>
										<td style="text-align: center;"><?php echo '$'.$single_value->compra_pagada; ?></td>
										<td style="text-align: center;"><?php echo '$'.$single_value->compra_vencida; ?></td>
										<td style="text-align: center;"><?php echo $single_value->fecha_caducidad; ?></td>
                                        <td style="text-align: center;">
											<a style="margin: 5px;" title="Update"
											   href="<?php echo base_url(); ?>ShowForm/edit_purchase_info/<?php echo $single_value->compra_id; ?>">
												<span class="glyphicon glyphicon-edit"></span>
											</a>
                                            <a style="margin: 5px;" title="Delete"
                                                href="<?php echo base_url(); ?>Delete/medicine_purchase_info/<?php echo $single_value->compra_id; ?>">
												<span class="	fa fa-trash" style="color:crimson"></span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } //if condition
								} ?>
<!--									// foreach-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </form> <!-- /.Excel form -->
                </div>
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.Container -->


<script type="text/javascript">

	$("#compra_pagada").on("change paste keyup", function () {
		var compra_pagada = $('#compra_pagada').val();
		var precio_compra = $('#precio_compra').val();
		var total = parseFloat(precio_compra) - parseFloat(compra_pagada);
		$('#compra_vencida').val(total);
	});
	$("#precio_unitario,#cantidad").on("change paste keyup", function () {
		var cantidad = $('#cantidad').val();
		var precio_unitario = $('#precio_unitario').val();
		//var total = parseFloat(precio_compra) - parseFloat(compra_pagada);
		var amount =cantidad * precio_unitario;
		$('#precio_compra').val(amount);
	});
</script>