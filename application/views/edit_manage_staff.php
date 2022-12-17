<?php

//if ($msg == "main") {
//	$msg = "";
//} elseif ($msg == "empty") {
//	$msg = "Please fill out all required fields";
//} elseif ($msg == "created") {
//	$msg = "Created Successfully";
//} elseif ($msg == "edit") {
//	$msg = "Edited Successfully";
//} elseif ($msg == "delete") {
//	$msg = "Eliminado correctamente";
//}
foreach ($one_value as $one_info) {
	$record_id = $one_info->id;
	$one_name = $one_info->username;
	$one_password= $one_info->password;
}
?>
<!-- /.Breadcrumb -->
<section id="breadcrumb">
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="#">Secciones</a></li>
<!--			<li class="active">--><?php //echo $msg; ?><!--</li>-->
		</ol>
	</div>
</section>

<!-- /.container -->
<section id="main">
	<div class="container">

		<div class="row">
			<div class="col-md-3">
				<div class="list-group">
					<a href="#" class="list-group-item active main-color-bg">
						<span class="glyphicon glyphicon-person" aria-hidden="true"></span> Administrar usuario</a>
					<a href="<?php echo base_url(); ?>ShowForm/adm_usuario/main" class="list-group-item">
						<span class="fa fa-truck-moving" aria-hidden="true"></span> Editar usuario</a>
				</div>
			</div>
			<div class="col-md-9">
				<div class="rounded-0 panel panel-default">
					<div class="panel-heading rounded-0 main-color-bg">
						<h3 class="panel-title">Editar usuario</h3>
					</div>

					<div class="panel-body">

						<!-- /.rounded-0 panel End -->
						<?php echo form_open_multipart('Insert/edit_staff_info/'.$record_id); ?>
						<div class="box-body">
							<div class="row">
								<div class="col-sm-6">
									<label for="username">Usuario</label>
									<input type="text" class="form-control" id="username" placeholder=""
										   value="<?php echo $one_name; ?>"name="username">
								</div>
								<div class="col-sm-6">
									<label for="password">Contraseña</label>
									<input type="password" class="form-control" id="password" placeholder=""
										   value="<?php echo $one_password; ?>"  name="password">
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
				<!-- /.rounded-0 panel 2nd -->

			</div>
		</div> <!-- /.row -->
	</div> <!-- /.Container -->
</section>

