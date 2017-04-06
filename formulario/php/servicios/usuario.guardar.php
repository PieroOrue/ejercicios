<?php
// Incluir la clase de base de datos
include_once("../classes/class.Database.php");

$postdata = file_get_contents("php://input");

$request = json_decode($postdata);
$request =  (array) $request;


$request['nombre'] = strtoupper($request['nombre']);


$sql = "UPDATE tab_registros SET
			nombre    = '".$request['nombre']."',
			apellido  = '".$request['apellido']."',
			telefono  = '".$request['telefono']."',
			direccion = '".$request['direccion']."' 
			dni 	  = '".$request['dni']."' 
			email 	  = '".$request['email']."' 
			ciudad 	  = '".$request['ciudad']."' 
		WHERE id  = ".$request['id'];

$Hecho = Database::ejecutar_idu($sql);
$Respuesta = "";

if ($Hecho == "1") {
	$Respuesta = json_encode( array('err' => false, 'mensaje'=>'Registro Actualizado.' ));
}else{
	$Respuesta = json_encode( array('err' => true, 'mensaje'=> $Hecho ));
}

echo $Respuesta;

?>