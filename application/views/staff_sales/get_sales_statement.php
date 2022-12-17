<div class="box box-info">
	<p style="padding: 3px;">
		<button id="print_button" title="Haga clic para imprimir" type="button"
				onClick="window.print()" class="btn btn-flat fa fa-print">Print
		</button>
	</p>
	<div class="box-body table-responsive" style="width: 98%; overflow-x: scroll; color: black;">
		<table id="example2" class="table table-bordered table-hover">
			<thead>
<!--			<tr>-->
<!--				<th style="text-align: center;" colspan="15">Sales Statement</th>-->
<!--			</tr>-->
			<tr>
				<th style="text-align: center;">SL.</th>
				<th style="text-align: center;">Fecha</th>
				<th style="text-align: center;">No. Factura</th>
				<th style="text-align: center;">Producto</th>
				<th style="text-align: center;">Precio unitario</th>
				<th style="text-align: center;">Cantidad</th>

				<th style="text-align: center;">Total</th>
				<th style="text-align: center;">Monto</th>
				<th style="text-align: center;">Cantidad de descuento</th>
				<th style="text-align: center;">Cantidad total</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$total_qty = 0;
			$precio_total2 = 0;
			for ($i = 1; $i <= $count_it; $i++) {
				$one_time = 0;
				foreach (${"product_result" . $i} as $single_value) {
					$total_qty += $single_value->cantidad;

					$one_time++;
					?>
					<tr>
					<?php if ($single_value->informe  != "Previous Due" && $single_value->informe  != "Payment") { ?>
						<?php if ($one_time == 1) { ?>
							<td style="text-align: center;"><?php echo $i; ?></td>
							<td style="text-align: center;"><?php echo date('d/m/y', strtotime($single_value->date)); ?></td>
							<td style="text-align: center;"><?php echo $single_value->invoice; ?></td>
						<?php } else { ?>
							<td style="text-align: center;"></td>
							<td style="text-align: center;"></td>
							<td style="text-align: center;"></td>
						<?php } ?>
						<td style="text-align: center; white-space: nowrap;">
							<?php echo $single_value->nombre_producto; ?>
						</td>
						<td style="text-align: center;"><?php echo $single_value->precio_venta_unitario; ?></td>
						<td style="text-align: center;"><?php echo $single_value->cantidad; ?> </td>
						<td style="text-align: center;"><?php echo $single_value->precio_total; ?>/-</td>
						<td style="text-align: center;"><?php echo $single_value->cantidad_total; ?>/-</td>
						<td style="text-align: center;"><?php echo $single_value->descuento_total; ?></td>
						<td style="text-align: center;"><?php echo $single_value->precio_descuento; ?>/-</td>
						<?php  $precio_total2 += $single_value->cantidad_total; ?>
						</tr>
						<?php
					}
				}
			}
			?>
			<tr style="font-weight: bolder;">
				<td style="text-align: right;" colspan="5">Producto total</td>
				<td style="text-align: center;"><?php echo $total_qty; ?></td>
				<td style="text-align: center;" colspan="3"></td>
				<td style="text-align: center;">Ventas totales: <?php echo $precio_total2; ?>/-</td>
				<!--<td style="text-align: center;" colspan=""></td>-->
			</tr>
			</tbody>
		</table>
	</div>
</div>

<style>
	@media print {
		a[href]:after {
			content: none !important;
		}

		#print_button {
			display: none;
		}

		#no_print1 {
			display: none;
		}
	}
</style>
