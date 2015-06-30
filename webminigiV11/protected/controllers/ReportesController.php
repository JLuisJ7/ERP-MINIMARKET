<?php
class ReportesController extends Controller{


public function actionAjaxTotalVentas(){
$idProducto = $_POST['idProducto'];	
$enero= Inventario::model()->TotalVentas(1,$idProducto); 
$febrero= Inventario::model()->TotalVentas(2,$idProducto); 
$marzo= Inventario::model()->TotalVentas(3,$idProducto); 
$abril= Inventario::model()->TotalVentas(4,$idProducto); 
$mayo= Inventario::model()->TotalVentas(5,$idProducto); 
$junio= Inventario::model()->TotalVentas(6,$idProducto); 
$julio= Inventario::model()->TotalVentas(7,$idProducto); 
$agosto= Inventario::model()->TotalVentas(8,$idProducto); 
$septiembre= Inventario::model()->TotalVentas(9,$idProducto); 
$octubre= Inventario::model()->TotalVentas(10,$idProducto); 
$noviembre= Inventario::model()->TotalVentas(11,$idProducto); 
$diciembre= Inventario::model()->TotalVentas(12,$idProducto); 
$Cenero= Inventario::model()->TotalCompras(1,$idProducto); 
$Cfebrero= Inventario::model()->TotalCompras(2,$idProducto); 
$Cmarzo= Inventario::model()->TotalCompras(3,$idProducto); 
$Cabril= Inventario::model()->TotalCompras(4,$idProducto); 
$Cmayo= Inventario::model()->TotalCompras(5,$idProducto); 
$Cjunio= Inventario::model()->TotalCompras(6,$idProducto); 
$Cjulio= Inventario::model()->TotalCompras(7,$idProducto); 
$Cagosto= Inventario::model()->TotalCompras(8,$idProducto); 
$Cseptiembre= Inventario::model()->TotalCompras(9,$idProducto); 
$Coctubre= Inventario::model()->TotalCompras(10,$idProducto); 
$Cnoviembre= Inventario::model()->TotalCompras(11,$idProducto); 
$Cdiciembre= Inventario::model()->TotalCompras(12,$idProducto); 


	$ventas = array(
				  1 => round($enero['r'],1),
				  2 => round($febrero['r'],1),
				  3 => round($marzo['r'],1),
				  4 => round($abril['r'],1),
				  5 => round($mayo['r'],1),
				  6 => round($junio['r'],1),
				  7 => round($julio['r'],1),
				  8 => round($agosto['r'],1),
				  9 => round($septiembre['r'],1),
				  10 => round($octubre['r'],1),
				 11=> round($noviembre['r'],1),
				 12 => round($diciembre['r'],1)
				  );
				  $compras = array(
				  1 => round($Cenero['r'],1),
				  2 => round($Cfebrero['r'],1),
				 3 => round($Cmarzo['r'],1),
				  4 => round($Cabril['r'],1),
				  5 => round($Cmayo['r'],1),
				  6 => round($Cjunio['r'],1),
				  7 => round($Cjulio['r'],1),
				  8 => round($Cagosto['r'],1),
				  9 => round($Cseptiembre['r'],1),
				  10 => round($Coctubre['r'],1),
				 11=> round($Cnoviembre['r'],1),
				 12 => round($Cdiciembre['r'],1)
				  );					 
	
	//echo json_encode($data);
	//echo json_encode($compras);
	header('Content-Type: application/json; charset="UTF-8"');
    echo CJSON::encode(array(
    	'C'=>$compras,
    	'V'=>$ventas
    	)
    );
		

}

public function actionAjaxTotalOrdenesAnio(){
	$idProveedor = $_POST['idProveedor'];	
$enero= Ordencompra::model()->TotalOrdenesMes(1,$idProveedor); 
$febrero= Ordencompra::model()->TotalOrdenesMes(2,$idProveedor); 
$marzo= Ordencompra::model()->TotalOrdenesMes(3,$idProveedor); 
$abril= Ordencompra::model()->TotalOrdenesMes(4,$idProveedor); 
$mayo= Ordencompra::model()->TotalOrdenesMes(5,$idProveedor); 
$junio= Ordencompra::model()->TotalOrdenesMes(6,$idProveedor); 
$julio= Ordencompra::model()->TotalOrdenesMes(7,$idProveedor); 
$agosto= Ordencompra::model()->TotalOrdenesMes(8,$idProveedor); 
$septiembre= Ordencompra::model()->TotalOrdenesMes(9,$idProveedor); 
$octubre= Ordencompra::model()->TotalOrdenesMes(10,$idProveedor); 
$noviembre= Ordencompra::model()->TotalOrdenesMes(11,$idProveedor); 
$diciembre= Ordencompra::model()->TotalOrdenesMes(12,$idProveedor); 


	$compras = array(
				  1 => round($enero['r'],2),
				  2 => round($febrero['r'],2),
				  3 => round($marzo['r'],2),
				  4 => round($abril['r'],2),
				  5 => round($mayo['r'],2),
				  6 => round($junio['r'],2),
				  7 => round($julio['r'],2),
				  8 => round($agosto['r'],2),
				  9 => round($septiembre['r'],2),
				  10 => round($octubre['r'],2),
				 11=> round($noviembre['r'],2),
				 12 => round($diciembre['r'],2)
				  );
				 					 
	
	//echo json_encode($data);
	//echo json_encode($compras);
	header('Content-Type: application/json; charset="UTF-8"');
    echo CJSON::encode(array(    	
    	'C'=>$compras
    	)
    );
		

}

public function actionAjaxTotalOrdenes(){

$enero= Ordencompra::model()->TotalOrdenesMeses(1); 
$febrero= Ordencompra::model()->TotalOrdenesMeses(2); 
$marzo= Ordencompra::model()->TotalOrdenesMeses(3); 
$abril= Ordencompra::model()->TotalOrdenesMeses(4); 
$mayo= Ordencompra::model()->TotalOrdenesMeses(5); 
$junio= Ordencompra::model()->TotalOrdenesMeses(6); 
$julio= Ordencompra::model()->TotalOrdenesMeses(7); 
$agosto= Ordencompra::model()->TotalOrdenesMeses(8); 
$septiembre= Ordencompra::model()->TotalOrdenesMeses(9); 
$octubre= Ordencompra::model()->TotalOrdenesMeses(10); 
$noviembre= Ordencompra::model()->TotalOrdenesMeses(11); 
$diciembre= Ordencompra::model()->TotalOrdenesMeses(12); 


	$compras = array(
				  1 => round($enero['r'],2),
				  2 => round($febrero['r'],2),
				  3 => round($marzo['r'],2),
				  4 => round($abril['r'],2),
				  5 => round($mayo['r'],2),
				  6 => round($junio['r'],2),
				  7 => round($julio['r'],2),
				  8 => round($agosto['r'],2),
				  9 => round($septiembre['r'],2),
				  10 => round($octubre['r'],2),
				 11=> round($noviembre['r'],2),
				 12 => round($diciembre['r'],2)
				  );
				 					 
	
	//echo json_encode($data);
	//echo json_encode($compras);
	header('Content-Type: application/json; charset="UTF-8"');
    echo CJSON::encode(array(    	
    	'C'=>$compras
    	)
    );
		

}

public function actionAjaxTotalFacturasAnio(){
$enero= Factura::model()->TotalFacturasMes(1); 
$febrero= Factura::model()->TotalFacturasMes(2); 
$marzo= Factura::model()->TotalFacturasMes(3); 
$abril= Factura::model()->TotalFacturasMes(4); 
$mayo= Factura::model()->TotalFacturasMes(5); 
$junio= Factura::model()->TotalFacturasMes(6); 
$julio= Factura::model()->TotalFacturasMes(7); 
$agosto= Factura::model()->TotalFacturasMes(8); 
$septiembre= Factura::model()->TotalFacturasMes(9); 
$octubre= Factura::model()->TotalFacturasMes(10); 
$noviembre= Factura::model()->TotalFacturasMes(11); 
$diciembre= Factura::model()->TotalFacturasMes(12); 


	$ventas = array(
				  1 => round($enero['r'],2),
				  2 => round($febrero['r'],2),
				  3 => round($marzo['r'],2),
				  4 => round($abril['r'],2),
				  5 => round($mayo['r'],2),
				  6 => round($junio['r'],2),
				  7 => round($julio['r'],2),
				  8 => round($agosto['r'],2),
				  9 => round($septiembre['r'],2),
				  10 => round($octubre['r'],2),
				 11=> round($noviembre['r'],2),
				 12 => round($diciembre['r'],2)
				  );
				 					 
	
	//echo json_encode($data);
	//echo json_encode($compras);
	header('Content-Type: application/json; charset="UTF-8"');
    echo CJSON::encode(array(    	
    	'V'=>$ventas
    	)
    );
		

}

	public function actionClientes(){
		$this->render("Clientes");
	}
public function actionAlmacen(){
		$this->render("almacen");
	}

	public function actionProveedores(){
		$this->render("proveedores");
	}
	public function actionFacturas(){
		$this->render("facturas");
	}

	public function actionordenescompra(){
		$this->render("ordenescompra");
	}


	public function actionAjaxObtenerNroFacturasporDia(){
		
		$Factura = Factura::model()->ObtenerNroFacturasporDia();
		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$Factura[0]));
		
	}

	public function actionAjaxObtenerNroEntradaProductos(){
		$inicio = $_POST['inicio'];
		$fin = $_POST['fin'];
		$inventario = Inventario::model()->ObtenerNroEntradaProductos($inicio,$fin );
		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$inventario[0]));
		
	}

	public function actionAjaxObtenerNroSalidaProductos(){
		$inicio = $_POST['inicio'];
		$fin = $_POST['fin'];
		$inventario = Inventario::model()->ObtenerNroSalidaProductos($inicio,$fin );
		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$inventario[0]));
		
	}

	public function actionAjaxObtenerNroClientes(){
		
		$cliente = Cliente::model()->ObtenerNroClientes();
		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$cliente[0]));
		
	}

//Facturas por rango de fechas
	public function actionAjaxObtenerFacturasEntreFechas(){		

    	$inicio = $_POST['inicio'];
		$fin = $_POST['fin'];
		$factura = Factura::model()->ObtenerFacturasEntreFechas($inicio,$fin);
			Util::renderJSON($factura);
		
	}

	//Facturas por rango de fechas
	public function actionAjaxObtenerOrdenesEntreFechas(){		

    	$inicio = $_POST['inicio'];
		$fin = $_POST['fin'];
		$ordenes = Ordencompra::model()->ObtenerOrdenesEntreFechas($inicio,$fin);
			Util::renderJSON($ordenes);
		
	}


	public function actionAjaxObtenerInventarioEntreFechas(){		

    	$inicio = $_POST['inicio'];
		$fin = $_POST['fin'];
		$inventario = Inventario::model()->ObtenerInventarioEntreFechas($inicio,$fin);
			Util::renderJSON($inventario);
		
	}	

	public function actionAjaxObtenerInventarioProducto(){		

    	$idProducto = $_POST['idProducto'];		
		$inventario = Inventario::model()->ObtenerInventarioProducto($idProducto);
			Util::renderJSON($inventario);
		
	}

	public function actionAjaxObtenerOrdenesProveedor(){		

    	$idProveedor = $_POST['idProveedor'];		
		$ordenes = Ordencompra::model()->ObtenerOrdenesXProveedor($idProveedor);
			Util::renderJSON($ordenes);
		
	}

}