<?php
session_start();
//Aqui evito la utilizacion de cache con fines de refrescar tablas
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado

require_once "clases/conexion.php";
require_once "procesos/mn_funciones.php";
$obj=new conectar();
$conexion=$obj->conexion();

$fechaini=cambiafecha(hoy()).' 00:00';
$fechafin=cambiafecha(hoy()).' 23:59';
$sql="SELECT fecha_aten,numero_iden_per,nombre,nombre_prof,archivo_adj FROM vw_consulta_adjuntos
WHERE $_SESSION[gcondicion] ORDER BY fecha_aten";
//echo "<br>".$sql;
$result=mysqli_query($conexion,$sql)
?>

<div>
	<table class="table table-hover table-sm table-bordered font13" id="tablaadjunto">
		<thead style="background-color: #2574a9;color: white; font-weight: bold;">
			<tr>				
				<td>Fecha</td>
				<td>Identificación</td>
				<td>Nombre</td>
				<td>Profesional</td>
				<td>Opciones</td>
			</tr>
		</thead>

		<tbody style="background-color: white">
			<?php
			while($row=mysqli_fetch_row($result)){
				$archivo="adjuntos/".$row[4];
				?>
				<tr>					
					<td><?php echo $row[0];?></td>
					<td><?php echo $row[1];?></td>
					<td><?php echo $row[2];?></td>
					<td><?php echo $row[3];?></td>
					
					<td style="text-align: center;">
						<a href="<?php echo $archivo;?>" target="new">
							<span class="btn btn-success btn.sm" data-toggle="modal" title="Visualizar el archivo">
							<i class="fas fa-search"></i>
							</span>
						</a>
					</td>
				</tr>
				<?php
			}
			?>
		</tbody>
		
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#tablaadjunto').DataTable();
	} );
</script>
