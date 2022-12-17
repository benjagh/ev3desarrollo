<?php
if ($msg == "main") {
	$msg = "";
} elseif ($msg == "empty") {
	$msg = "Por favor llene todos los campos requeridos";
} elseif ($msg == "created") {
	$msg = "Creado con exito";
} elseif ($msg == "edit") {
	$msg = "Editado con exito";
} elseif ($msg == "delete") {
	$msg = "Eliminado con exito";
}
?>
<!-- /.Breadcrumb -->
<section id="breadcrumb">
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="#">Inventario </a></li>
			<li class="active"><?php echo $msg; ?></li>
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
					   class="list-group-item">
						<span class="" aria-hidden="true"></span> Agregar información de producto</a>
					<a href="<?php echo base_url(); ?>ShowForm/detalle_compra/main" class="list-group-item active">
						<span class="" aria-hidden="true"></span> Detalle de compras</a>
					<a href="<?php echo base_url(); ?>ShowForm/pago_proveedores/main" class="list-group-item">
						<span class="" aria-hidden="true"></span> Pagos a proveedores</a>
<!--					<a href="--><?php //echo base_url(); ?><!--ShowForm/create_product_name/main" class="list-group-item">-->
<!--						<span class="fa fa-plus" aria-hidden="true"></span> Ledger</a>-->
				</div>
			</div>
			<div class="col-md-9">
				<div class="rounded-0 panel panel-default">
					<div class="panel-heading rounded-0 main-color-bg">
						<h3 class="panel-title"> Compras de productos a proveedores</h3>
					</div>

					<div class="panel-body">

						<!-- /.rounded-0 panel End -->
						<?php echo form_open_multipart('Insert/info_producto'); ?>
						<div class="box-body">
							<div class="row">
								<div class="col-sm-6" style="">
									<label for="date_from">Desde</label>
									<input type="date" class="form-control datepicker"
										   placeholder="Insert Date" name="date_from" id="date_from"
										   autocomplete="off">
								</div>
								<div class="col-sm-6" style="">
									<label for="date_to"> Hasta</label>
									<input type="date" class="form-control _datepicker"
										   placeholder="Insert Date" name="date_to" id="date_to"
										   autocomplete="off">
								</div>
								<div class="col-sm-6" style="">
									<label for="nombre_producto">Nombre del producto</label>
									<select name="nombre_producto" id="nombre_producto" class="form-control selectpicker"
											data-live-search="true">
										<option value="">-- Seleccionar --</option>
										<?php foreach ($all_value as $info) { ?>
											<option value="<?php echo $info->nombre_producto; ?>"><?php echo $info->nombre_producto; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-sm-6" style="">
									<label for="supplier">Empresa proveedora</label>
									<select name="supplier" id="supplier" class="form-control selectpicker"
											data-live-search="true">
										<option value="">-- Seleccionar --</option>
										<?php foreach ($all_sup as $info) { ?>
											<option value="<?php echo $info->nombre_proveedor; ?>"><?php echo $info->nombre_proveedor; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4" style="margin-top: 17px;">
									<button type="button" class="pull-left btn btn-primary" id="search_purchase">Buscar</button>
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
							<h3 class="panel-title">Compra</h3>
					</div>
					<div class="panel-body" id="show_purchase">

					</div>

				</div>
			</div>
		</div> <!-- /.row -->
	</div> <!-- /.Container -->
</section>


<script type="text/javascript">
	$("#search_purchase").click(function () {
		var date_from = $('#date_from').val();
		var date_to = $('#date_to').val();
		var nombre_producto = $('#nombre_producto').val();
		//var invoice = $('#invoice').val();
		var supplier = $('#supplier').val();
		var post_data = {
			'date_from': date_from, 'date_to': date_to, 'nombre_producto': nombre_producto, 'supplier': supplier,
			'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
		};
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>Get_ajax_value/get_purchase_statement",
			data: post_data,
			success: function (data) {
				$('#show_purchase').html(data);
			}
		});
	});
</script>