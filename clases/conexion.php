<?php
	/**
	 * Conexion a la BD
	 */
	class conectar{
		public function conexion(){
			//$conexion=mysqli_connect('localhost','gastro_root','m3d1n3t@123','gastro_medinet');
			$conexion=mysqli_connect('localhost','root','654321','medinet_v3');
			//$conexion=mysqli_connect('localhost','root','','medinet_v4');
			mysqli_set_charset($conexion,"utf8");
			return $conexion;
		}
	}

?>