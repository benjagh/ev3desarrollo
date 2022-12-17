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
            <li><a href="#">Secciones</a></li>
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
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Secciones</a>
                    <a href="<?php echo base_url(); ?>ShowForm/tipo_de_producto/main"
                        class="list-group-item">
                       Tipo de producto</a>
                    <a href="<?php echo base_url(); ?>ShowForm/marca/main" class="list-group-item">
                        Marca </a>
                    <a href="<?php echo base_url(); ?>ShowForm/producto/main" class="list-group-item">
                        Producto</a>
<!--                    <a href="--><?php //echo base_url(); ?><!--ShowForm/create_product_category/main" class="list-group-item">-->
<!--                        <span class="fa fa-tasks" aria-hidden="true"></span> Product Category</a>-->
<!--                    <a href="--><?php //echo base_url(); ?><!--ShowForm/create_product_name/main" class="list-group-item">-->
<!--                        <span class="fa fa-plus" aria-hidden="true"></span> Product Name</a>-->
                    <a href="<?php echo base_url(); ?>ShowForm/proveedor/main" class="list-group-item active">
                       Proveedores</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="rounded-0 panel panel-default">
                    <div class="panel-heading rounded-0 main-color-bg">
                        <h3 class="panel-title">Agregar proveedor</h3>
                    </div>

                    <div class="panel-body">

                        <!-- /.rounded-0 panel End -->
                        <?php echo form_open_multipart('Insert/supplier'); ?>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-6" style="">
                                    <label for="company_name">Nombre del proveedor</label>
                                    <input type="text" class="form-control" id="company_name" placeholder=""
                                        name="company_name">
                                </div>
                                <div class="col-sm-6">
                                    <label for="telefono">Contacto</label>
                                    <input type="text" class="form-control" id="telefono" placeholder=""
                                        name="telefono">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6" style="">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" class="form-control" id="direccion" placeholder=""
                                        name="direccion">
                                </div>
                                <div class="col-sm-6">
                                    <label for="deuda">Deuda</label>
                                    <input type="text" class="form-control" id="deuda" placeholder="$"
                                        name="deuda">
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
                <!-- /.rounded-0 panel 2nd -->
                <div class="rounded-0 panel panel-default">
                    <div class="panel-heading rounded-0">
                        <form method="post" action="<?php echo base_url(); ?>export_csv/export">
                            <input type="submit" name="export" class="btn btn-primary btn-xs rounded-0 pull-right" value="Exportar a excel" />
                            <h3 class="panel-title">Lista de proveedores
                            </h3>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">#</th>
                                        <th style="text-align: center;">Nombre de empresa</th>
                                        <th style="text-align: center;">Contacto</th>
                                        <th style="text-align: center;">Dirección</th>
                                        <th style="text-align: center;">Deuda</th>
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
                                        <td><?php echo $single_value->nombre_proveedor; ?></td>
                                        <td><?php echo $single_value->telefono; ?></td>
                                        <td><?php echo $single_value->direccion; ?></td>
                                        <td style="text-align: right;"><?php echo '$'.$single_value->deuda; ?></td>
                                        <td style="text-align: center;">
                                            <a style="margin: 5px;" class="btn btn-danger btn-sm rounded-0"
                                                href="<?php echo base_url(); ?>Delete/supplier/<?php echo $single_value->proveedor_id; ?>">Borrar
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </form> <!-- /.Excel form -->
                </div>
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.Container -->
</section>
