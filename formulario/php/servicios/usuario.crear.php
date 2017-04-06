<?php
// Incluir la clase de base de datos
include_once("../classes/class.Database.php");

$postdata = file_get_contents("php://input");

$request = json_decode($postdata);
$request =  (array) $request;


$request['nombre'] = strtoupper($request['nombre']);
$request['apellido'] = strtoupper($request['apellido']);


$sql = "INSERT INTO tab_registros(nombre, apellido, telefono, dni, email, direccion) 
		VALUES ( '". $request['nombre'] ."',
				 '".$request['apellido']."',
				 '".$request['telefono']."',
				 '".$request['dni']."',
				 '".$request['email']."',
				 '".$request['direccion']."')";

//esto te ayudara a revisar si tienes algun problema con INSERT INTO
//echo $sql;
//exit;


$Hecho = Database::ejecutar_idu($sql);
$Respuesta = "";

if ($Hecho == "1") {
	$Respuesta = json_encode( array('err' => false, 'mensaje'=>'Registro Insertado.' ));
}else{
	$Respuesta = json_encode( array('err' => true, 'mensaje'=> $Hecho ));
}

echo $Respuesta;




?>