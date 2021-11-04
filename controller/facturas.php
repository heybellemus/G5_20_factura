<?php
	header('Content-Type: application/json');
	require_once("../config/conexion.php");
	require_once("../models/Facturas.php");
	$facturas = new Facturas(); //variable que va tomar una nueva instancia de la clase facturas
	
	$body =json_decode(file_get_contents("php://input"), true);

	switch($_GET["op"]){
	
		case "GetFacturas":
			$datos=$facturas->get_facturas();  // la variable datos obtendra todo lo que diga la funcion get_facturas
			echo json_encode($datos);
		break;

	
		case "GetUno":
			$datos=$facturas->get_factura($body["Id"]);
			echo json_encode($datos);
		break;

		case "InsertFacturas":
			$datos=$facturas->insert_facturas($body["Numero_Factura"],$body["Id_Socio"],$body["Fecha_Factura"],$body["Detalle"],$body["Sub_Total"],$body["Total_Isv"],$body["Total"],$body["Fecha_Vencimiento"]);
			echo json_encode("Factura Agregada");
		break;

		case "DeleteFactura":
			$datos=$facturas->eliminar_factura($body["Id"]);
			echo json_encode("Factura Eliminada");
		break;

		case "UpdateFactura":
			$datos=$facturas->actualizar_factura($body["Numero_Factura"],$body["Id_Socio"],$body["Fecha_Factura"],$body["Detalle"],$body["Sub_Total"],$body["Total_Isv"],$body["Total"],$body["Fecha_Vencimiento"],$body["Estado"]);
			echo json_encode("Factura Actualizada");
		break;

	}
?>