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
			<li><a href="#">Inventario</a></li>
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
					<a href="<?php echo base_url(); ?>ShowForm/medicine_purchase_info/main"
					   class="list-group-item">
						<span class="" aria-hidden="true"></span> Agregar información de producto</a>
					<a href="<?php echo base_url(); ?>ShowForm/medicine_purchase_statement/main" class="list-group-item">
						<span class="" aria-hidden="true"></span> Detalle de compras</a>
					<a href="<?php echo base_url(); ?>ShowForm/supplier_payment/main" class="list-group-item active">
						<span class="" aria-hidden="true"></span> Pagos a proveedores</a>
<!--					<a href="--><?php //echo base_url(); ?><!--ShowForm/create_product_name/main" class="list-group-item">-->
<!--						<span class="fa fa-plus" aria-hidden="true"></span> Ledger</a>-->
				</div>
			</div>
			<div class="col-md-9">
				<div class="rounded-0 panel panel-default">
					<div class="panel-heading rounded-0 main-color-bg">
						<h3 class="panel-title"> Pagos a proveedores</h3>
					</div>

					<div class="panel-body">

						<!-- /.rounded-0 panel End -->
						<?php echo form_open_multipart('Insert/medicine_purchase_info'); ?>
						<div class="box-body">
							<div class="row">

								<div class="col-sm-6" style="">
									<label for="s_supplier">Empresa proveedora</label>
									<select name="s_supplier" id="s_supplier" class="form-control selectpicker"
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
									<button type="button" class="pull-left btn btn-primary" id="search">Buscar</button>
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
	$('#search').on('click', function (e) {
		var s_supplier = $('#s_supplier').val();
		var post_data = {
			's_supplier': s_supplier
		};
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>Get_ajax_value/show_purchase_due",
			data: post_data,
			success: function (data) {
				$('#show_purchase').html(data);
			}
		});
	});
</script>