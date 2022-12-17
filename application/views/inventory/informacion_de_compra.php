<?php
foreach ($one_value as $one_info) {
	$compra_id= $one_info->compra_id;
	$nombre_producto_id = $one_info->nombre_producto_id;
	$tipo_producto_id = $one_info->tipo_producto_id;
	$marca_id = $one_info->marca_id;
	$proveedor_id = $one_info->proveedor_id;
	$nombre_producto = $one_info->nombre_producto;
	$generic = $one_info->marca;
	$presentation = $one_info->tipo_de_producto;
	$supplier = $one_info->nombre_proveedor;
	$cantidad = $one_info->cantidad;
	$precio_unitario = $one_info->precio_unitario;
	$precio_compra = $one_info->precio_compra;
	$precio_venta_unitario = $one_info->precio_venta_unitario;
	$unidad = $one_info->unidad;
	$compra_pagada= $one_info->compra_pagada;
	$compra_vencida = $one_info->compra_vencida;
	$ex_date = $one_info->fecha_caducidad;
}
?>
<!-- /.Breadcrumb -->
<section id="breadcrumb">
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="#">Inventario</a></li>
		</ol>
	</div>
</section>

<!-- /.container -->
<section id="main">
	<div class="container">

		<div class="row">
			<div class="col-md-3">
				<div class="list-group">
					<a href="index.html" class="list-group-item active main-color-bg">
						<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Inventario</a>
					<a href="<?php echo base_url(); ?>ShowForm/info_producto/main"
					   class="list-group-item active">
						<span class="	" aria-hidden="true"></span> Agregar informacion de producto</a>
					<a href="<?php echo base_url(); ?>ShowForm/detalle_compra/main" class="list-group-item">
						<span class="" aria-hidden="true"></span> Detalles de compras</a>
					<a href="<?php echo base_url(); ?>ShowForm/pago_proveedores/main" class="list-group-item">
						<span class="" aria-hidden="true"></span> Pagos a proveedores</a>
					<!--                    <a href="--><?php //echo base_url(); ?><!--ShowForm/create_product_name/main" class="list-group-item">-->
					<!--                        <span class="fa fa-plus" aria-hidden="true"></span> Ledger</a>-->
				</div>
			</div>
			<div class="col-md-9">
				<div class="rounded-0 panel panel-default">
					<div class="panel-heading rounded-0 main-color-bg">
						<h3 class="panel-title">Actualizar información de producto</h3>
					</div>

					<div class="panel-body">

						<!-- /.rounded-0 panel End -->
						<?php echo form_open_multipart('Insert/edit_info_producto/' . $compra_id); ?>
						<div class="box-body">
							<div class="row">
								<div class="col-sm-3" style="">
									<label for="date">Fecha</label>
									<input type="text" class="form-control new_datepicker" id="date"
										   value="<?php echo date('Y-m-d'); ?>" placeholder="Date" name="date" autocomplete="off">
								</div>
								<div class="col-sm-3" style="">
									<label for="nombre_producto">Producto</label>
									<select name="nombre_producto" id="nombre_producto" class="form-control selectpicker"
											data-live-search="true">
										<?php foreach ($all_medicine as $info) { ?>
											<option value="<?php echo $info->nombre_producto."###".$info->nombre_producto_id; ?>" <?= isset($nombre_producto_id) && $nombre_producto_id == $info->nombre_producto_id ? 'selected' : "" ?>><?php echo $info->nombre_producto; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-sm-3" style="">
									<label for="generic">Marca</label>
									<select name="generic" id="generic" class="form-control selectpicker"
											data-live-search="true">
										<?php foreach ($all_generic as $info) { ?>
											<option value="<?php echo $info->marca."###".$info->marca_id; ?>" <?= isset($marca_id) && $marca_id == $info->marca_id ? 'selected' : "" ?>><?php echo $info->marca; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-sm-3" style="">
									<label for="presentation">Tipo de Producto</label>
									<select name="presentation" id="presentation" class="form-control selectpicker"
											data-live-search="true">
										<?php foreach ($all_presen as $info) { ?>
											<option value="<?php echo $info->tipo_de_producto."###".$info->tipo_producto_id; ?>" <?= isset($tipo_producto_id) && $tipo_producto_id == $info->tipo_producto_id ? 'selected' : "" ?>><?php echo $info->tipo_de_producto; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-sm-3" style="">
									<label for="supplier">Proveedor</label>
									<select name="supplier" id="supplier" class="form-control selectpicker"
											data-live-search="true">
										<?php foreach ($all_sup as $info) { ?>
											<option value="<?php echo $info->nombre_proveedor."###".$info->proveedor_id; ?>" <?= isset($proveedor_id) && $proveedor_id == $info->proveedor_id ? 'selected' : "" ?>><?php echo $info->nombre_proveedor; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<label for="cantidad">Cantidad total</label>
									<input type="text" class="form-control" id="cantidad" name="cantidad" value="<?php echo $cantidad; ?>">
								</div>
								<div class="col-sm-3" style="">
									<label for="precio_unitario">Precio unitario</label>
									<input type="text" class="form-control" id="precio_unitario"  name="precio_unitario"
										   value="<?php echo $precio_unitario; ?>">
								</div>
								<div class="col-sm-3">
									<label for="precio_compra">Precio compra</label>
									<input type="text" class="form-control" id="precio_compra" placeholder="$"
										   name="precio_compra" value="<?php echo $precio_compra; ?>">
								</div>
								<div class="col-sm-3">
									<label for="precio_venta_unitario">Precio venta unitario</label>
									<input type="text" class="form-control" id="precio_venta_unitario" placeholder="$"
										   name="precio_venta_unitario" value="<?php echo $precio_venta_unitario; ?>">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<label for="unidad">unidad</label>
									<input type="text" class="form-control" id="unidad" placeholder="gm / ml"
										   value="<?php echo $unidad; ?>"   name="unidad">
								</div>
								<div class="col-sm-3">
									<label for="compra_pagada">Compra pagada</label>
									<input type="text" class="form-control" id="compra_pagada" placeholder="$"
										   name="compra_pagada" value="<?php echo $compra_pagada; ?>">
								</div>
								<div class="col-sm-3">
									<label for="compra_vencida">Compra vencida</label>
									<input type="text" class="form-control" id="compra_vencida" placeholder="$"
										   name="compra_vencida" value="<?php echo $compra_vencida; ?>">
								</div>
								<div class="col-sm-3">
									<label for="ex_date">Fecha de expiracion</label>
									<input type="date" class="form-control new_datepicker" id="ex_date"
										   placeholder="Date" name="ex_date" autocomplete="off" value="<?php echo $ex_date; ?>">
								</div>

							</div>
							<div class="row">
								<div class="col-sm-4" style="margin-top: 17px;">
									<button type="submit" class="pull-left btn btn-primary">Actualizar</button>
								</div>
							</div>
							</form>
						</div>
					</div>
				</div><!-- /.rounded-0 panel End -->
			</div>
			<!-- /.rounded-0 panel 2nd -->
			<div class="col-md-12">

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
		$("#precio_unitario").on("change paste keyup", function () {
			var cantidad = $('#cantidad').val();
			var precio_unitario = $('#precio_unitario').val();
			//var total = parseFloat(precio_compra) - parseFloat(compra_pagada);
			var amount =cantidad * precio_unitario;
			$('#precio_compra').val(amount);
		});
	</script>
