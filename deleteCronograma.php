<?php
	$errores='';
	extract ($_REQUEST);
	try{
		$conexion = new PDO('mysql:host=localhost;dbname=GestionActivos','root','');
	}catch(PDOException $e){
		echo "Error: ". $e->getMessage();
	}
	$sql="DELETE FROM CRONOGRAMAS WHERE ID = '$_REQUEST[id]'";
	$resultado = $conexion->query($sql);

	if($resultado == true){
		header('Location: cronograma.php');
		$errores .='Cronograma eliminado correctamente';
	}
?>