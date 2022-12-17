<?php
/**
 * Created by PhpStorm.
 * User: bmmah
 * Date: 4/2/2019
 * Time: 10:56 PM
 */

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
	<div class="container" id="no_print3">
		<ol class="breadcrumb">
			<li><a href="#" >Cuentas</a></li>
			<li class="active"><?php echo $msg; ?></li>
		</ol>
	</div>
</section>

<!-- /.container -->
<section id="main">
	<div class="container">

		<div class="row">
			<div class="col-md-3" id="no_print2">
				<div class="list-group">
					<a href="#" class="list-group-item active main-color-bg">
						<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Cuentas</a>
					<a href="<?php echo base_url(); ?>ShowForm/perdidas/main"
					   class="list-group-item">
						<span class="	" aria-hidden="true"></span> Perdidas</a>
				</div>
			</div>
			<div class="col-md-9" id="no_print1">
				<div class="rounded-0 panel panel-default">
					<div class="panel-heading rounded-0 main-color-bg">
						<h3 class="panel-title"> Perdidas</h3>
					</div>

					<div class="panel-body">

						<!-- /.rounded-0 panel End -->
						<?php echo form_open_multipart('Insert/info_producto'); ?>
						<div class="box-body">
							<div class="row">
								<!-- <div class="col-sm-4" style="">
									<label for="date_from">Date From</label>
									<input type="date" class="form-control datepicker"
										   placeholder="Insert Date" name="date_from" id="date_from"
										   autocomplete="off">
								</div> -->
								<div class="col-sm-4" style="">
									<label for="date_to">A partir de la fecha <small><i>(Elegir fecha)</i></small></label>
									<input type="date" class="form-control _datepicker"
										   placeholder="Insert Date" name="date_to" id="date_to"
										   autocomplete="off">
								</div>
								<div class="col-sm-4" style="">
									<label for="date_to">Nombre del producto</label>
									<select name="product" id="product" class="form-control selectpicker"
											data-live-search="true">
										<option value="">-- Seleccionar --</option>
										<?php foreach ($all_value as $info) {
										if($info->nombre_producto != '') {?>
											<option value="<?php echo $info->nombre_producto_id; ?>"><?php echo $info->nombre_producto; ?></option>
										<?php } }?>
									</select>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4" style="margin-top: 17px;">
									<button type="button" class="pull-left btn btn-primary" id="search_report">Buscar</button>
								</div>
							</div>
							</form>
						</div>
					</div>
				</div><!-- /.rounded-0 panel End -->
			</div>
			<!-- /.rounded-0 panel 2nd -->
			<div class="col-md-12" >
				<div class="rounded-0 panel panel-default" >
					<div class="panel-heading rounded-0">
<!--							<h3 class="panel-title">Profit-Loss</h3>-->

					</div>
					<div class="panel-body" id="show_report">

					</div>

				</div>
			</div>
		</div> <!-- /.row -->
	</div> <!-- /.Container -->
</section>


<script type="text/javascript">
	$("#search_report").click(function () {
		var date_from = $('#date_from').val();
		var date_to = $('#date_to').val();
		var product = $('#product').val();
		var post_data = {
			'date_from': date_from, 'date_to': date_to, 'nombre_producto_id': product
		};
		console.log(post_data);
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>Get_ajax_value/get_product_profit_loss_info",
			data: post_data,
			success: function (data) {
				$('#show_report').html(data);
			}
		});
	});
</script>
