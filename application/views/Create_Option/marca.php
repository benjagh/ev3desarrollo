<?php
if ($msg == "main") {
	$msg = "";
} elseif ($msg == "vacio") {
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
                    <a href="<?php echo base_url(); ?>ShowForm/tipo_de_producto/main" class="list-group-item">
                        Tipo de producto</a>
                    <a href="<?php echo base_url(); ?>ShowForm/marca/main" class="list-group-item active">
                        Marca </a>
                    <a href="<?php echo base_url(); ?>ShowForm/producto/main" class="list-group-item">
                        Producto</a>
<!--                    <a href="--><?php //echo base_url(); ?><!--ShowForm/create_product_category/main" class="list-group-item">-->
<!--                        <span class="fa fa-tasks" aria-hidden="true"></span> Product Category</a>-->
<!--                    <a href="--><?php //echo base_url(); ?><!--ShowForm/create_product_name/main" class="list-group-item">-->
<!--                        <span class="fa fa-plus" aria-hidden="true"></span> Product Name</a>-->
                    <a href="<?php echo base_url(); ?>ShowForm/proveedor/main" class="list-group-item">
                        Proveedores</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="rounded-0 panel panel-default">
                    <div class="panel-heading rounded-0 main-color-bg">
                        <h3 class="panel-title">Agregar marca</h3>
                    </div>

                    <div class="panel-body">
                        <!-- /.rounded-0 panel End -->
                        <div class="row">
                            <div class="col-md-3">
                                <?php echo form_open_multipart('Insert/marca'); ?>
                                <div class="box-body">
                                    <!--											  <p  style="font-size: 20px; color: #066;">--><?php //echo $msg; ?>
                                    <!--</p>-->
                                    <div class="form-group" style="width: 400px;">
                                        <label for="marca">Marca</label>
                                        <input type="text" class="form-control" id="marca" placeholder=""
                                            name="marca">
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="pull-left btn btn-primary">Agregar</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- /.rounded-0 panel End -->
                <!-- /.rounded-0 panel 2nd -->
                <div class="rounded-0 panel panel-default">
                    <div class="panel-heading rounded-0">
                        <h3 class="panel-title">Lista de marcas</h3>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">#</th>
                                        <th style="text-align: center;">Marca</th>
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
                                        <td><?php echo $single_value->marca; ?></td>
                                        <td style="text-align: center;">
                                            <a style="margin: 5px;" class="btn btn-danger btn-sm rounded-0"
                                                href="<?php echo base_url(); ?>Delete/marca/<?php echo $single_value->marca_id; ?>">Borrar
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
