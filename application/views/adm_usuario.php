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
			<li><a href="#">Usuarios</a></li>
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
					<a href="#" class="list-group-item active main-color-bg">
						<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Administrar usuarios</a>
					<a href="<?php echo base_url(); ?>ShowForm/adm_usuario/main" class="list-group-item">
						<span class="far fa-user" aria-hidden="true"></span> Crear usuario</a>
				</div>
			</div>
			<div class="col-md-9">
				<div class="rounded-0 panel panel-default">
					<div class="panel-heading rounded-0 main-color-bg">
						<h3 class="panel-title">Crear usuario</h3>
					</div>

					<div class="panel-body">

						<!-- /.rounded-0 panel End -->
						<?php echo form_open_multipart('Insert/create_staff'); ?>
						<div class="box-body">
							<div class="row">
								<div class="col-sm-6">
									<label for="username">Nombre de usuario</label>
									<input type="text" class="form-control" id="username" placeholder="" name="username">
								</div>
								<div class="col-sm-6">
									<label for="password">Contraseña</label>
									<input type="password" class="form-control" id="password" placeholder="" name="password">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4" style="margin-top: 17px;">
									<button type="submit" class="pull-left btn btn-primary">Crear</button>
								</div>
							</div>
							</form>
						</div>
					</div>
				</div><!-- /.rounded-0 panel End -->
				<!-- /.rounded-0 panel 2nd -->
				<div class="rounded-0 panel panel-default">
					<div class="panel-heading rounded-0">
						<h3 class="panel-title">Lista de usuarios</h3>
					</div>
					<div class="panel-body">
						<div class="panel-body">
							<table class="table table-striped table-hover table-bordered">
								<thead>
								<tr>
									<th style="text-align: center;">#</th>
									<th style="text-align: center;">Usuario</th>
									<th style="text-align: center;">Acción</th>
								</tr>
								</thead>
								<!-- /.Row from DB-->
								<tbody>
								<?php
								$count = 0;
								foreach ($all_value as $single_value) {
									$count++;
									?>
									<tr>
										<td style="text-align: center;"><?php echo $count; ?></td>
										<td style="text-align: center;"><?php echo $single_value->username; ?></td>
										<td style="text-align: center;">
											<a style="margin: 5px;" class="btn btn-danger"
											   href="<?php echo base_url(); ?>Delete/adm_usuario/<?php echo $single_value->id; ?>">Borrar
											</a>
											<a style="margin: 5px;" class="btn btn-success"
											   href="<?php echo base_url(); ?>ShowForm/edit_staff_info/<?php echo $single_value->id; ?>">Editar
											</a>
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- /.row -->
	</div> <!-- /.Container -->
</section>

