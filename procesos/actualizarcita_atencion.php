<?php
require_once "../clases/conexion.php";
require_once "../clases/crudcita2.php";
//require_once "mn_funciones.php";

$fecha_agh=date("Y")."-".date("m")."-".date("d")." ".date("H").":".date("i");;
$observacion_agc="";
//echo $fecha_agh;
$obj=new crudcita2();
$datos=array(
$_POST['idpersonacita'],
$_POST['id_eps'],
$_POST['id_profesional'],
$fecha_agh,
$observacion_agc);
echo $obj->agregar2($datos);

?>