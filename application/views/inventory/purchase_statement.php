<div class="panel-body">
							<table class="table table-striped table-bordered table-hover">
								<thead>
								<tr>
									<th style="text-align: center;">#</th>
									<th style="text-align: center;">Detalles</th>
									<th style="text-align: center;">Nombre Proveedor</th>
									<th style="text-align: center;">Precio unidad</th>
									<th style="text-align: center;">cantidad</th>
									<th style="text-align: center;">Cantidad total</th>
<!--									<th style="text-align: center;">Selling Price</th>-->
									<th style="text-align: center;">Pagado</th>
									<th style="text-align: center;">Adeudado</th>
									<th style="text-align: center;">Fecha Expiracion</th>
								</tr>
								</thead>
								<!-- /.Row from DB-->
								<tbody>
								<?php
								$total_qty = 0;
								$precio_total = 0;
								$total_paid = 0;
								$total_due = 0;
								for ($i = 1; $i <= $count_it; $i++) {
									$one_time = 0;
									foreach (${"product_result" . $i} as $single_value) {
										$total_qty += $single_value->cantidad;
										$precio_total += $single_value->precio_compra;
										$total_paid += $single_value->compra_pagada;
										$total_due += $single_value->compra_vencida;
										$one_time++;
										?>
										<tr>
											<td style="text-align: center;"><?php echo $i; ?></td>
											<td style="text-align: left;">
												Producto:	<?php echo $single_value->nombre_producto; ?>  <br>
												Generic:	<?php echo $single_value->marca; ?></br>
												Presentation:	<?php echo $single_value->tipo_de_producto; ?>
											</td>
											<td style="text-align: center;"><?php echo $single_value->nombre_proveedor; ?></td>
											<td style="text-align: center;"><?php echo '$'.$single_value->precio_unitario; ?></td>
											<td style="text-align: center;"><?php echo $single_value->cantidad; ?></td>
											<td style="text-align: center;"><?php echo '$'.$single_value->precio_compra; ?></td>
<!--											<td style="text-align: center;">--><?php //echo $single_value->precio_venta_unitario; ?><!--</td>-->
											<td style="text-align: center;"><?php echo '$'.$single_value->compra_pagada; ?></td>
											<td style="text-align: center;"><?php echo '$'.$single_value->compra_vencida; ?></td>
											<td style="text-align: center;"><?php echo $single_value->fecha_caducidad; ?></td>
										</tr>
										<?php
									}
								}
								?>
								<tr style="font-weight: bolder;">
									<td style="text-align: right;" colspan="4">Total</td>
									<td style="text-align: center;" colspan=""><?php echo $total_qty; ?></td>
									<td style="text-align: center;"colspan=""><?php echo '$'.$precio_total; ?>/-</td>
									<td style="text-align: center;"colspan=""><?php echo '$'.$total_paid; ?>/-</td>
									<td style="text-align: center;"colspan=""><?php echo '$'.$total_due; ?>/-</td>

<!--									<td style="text-align: center;" colspan="3"></td>-->
								</tr>
								</tbody>
							</table>
						</div>
