<?php
class VentasController extends Controller{

	public function actionAjaxBuscarCliente(){
		$query = $_POST['query'];
		
	
		$clientes = Cliente::model()->BuscarCliente($query);

		Util::renderJSON($clientes);
	}



	public function actionregistrarFactura(){

		$this->render("registrarFactura");
	}
	public function actionAjaxListadoClientes(){
		// Condicion de empleados = 18
		$clientes = Cliente::model()->listadoClientes();

		Util::renderJSON($clientes);
	}
	public function actionAjaxObtenerNroFactura(){
		// Condicion de empleados = 18
		$Factura = Factura::model()->ObtenerNroFactura();
		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$Factura[0]));
		
	}

	public function actionListadoClientes(){

		
		$clientes = Cliente::model()->listadoClientes();
		$this->render("listadoClientes",array(
			'clientes'=>$clientes,
			));
	}

	public function actionAjaxObtenerCliente(){
		$idCliente = $_POST['idCliente'];
		$clientes = Cliente::model()->obtenerClientexId($idCliente);

		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$clientes[0]));
	}

	public function actionAjaxEditarCliente(){
		$idCliente=$_POST['idCliente'];
		$RazSoc_Cli=$_POST['RazSoc_Cli'];
		$tipoPersona_Cli=$_POST['tipoPersona_Cli'];
		$ruc_Cli=$_POST['ruc_Cli'];
		$direccion_Cli=$_POST['direccion_Cli'];
		$telefono_Cli=$_POST['telefono_Cli'];
		$email_Cli=$_POST['email_Cli'];
		$estado_Cli=$_POST['estado_Cli'];

		$respuesta = Cliente::model() -> actualizarCliente($idCliente,$RazSoc_Cli,$tipoPersona_Cli,$ruc_Cli,$direccion_Cli,$telefono_Cli,$email_Cli,$estado_Cli);

		Util::renderJSON(array( 'success' => $respuesta ));
	}

public function actionAjaxAgregarCliente(){


	
$RazSoc_Cli=$_POST['RazSoc_Cli'];
$tipoPersona_Cli=$_POST['tipoPersona_Cli'];
$ruc_Cli=$_POST['ruc_Cli'];
$direccion_Cli=$_POST['direccion_Cli'];
$telefono_Cli=$_POST['telefono_Cli'];
$email_Cli=$_POST['email_Cli'];


		$respuesta = Cliente::model() -> agregarCliente($RazSoc_Cli,$tipoPersona_Cli,$ruc_Cli,$direccion_Cli,$telefono_Cli,$email_Cli);

		header('Content-Type: application/json; charset="UTF-8"');
    	  Util::renderJSON(array( 'success' => $respuesta ));
	}

public function actionAjaxAgregarFactura(){


	
$nroSerie=$_POST['nroSerie'];
$nroFact=$_POST['nroFactura'];
$idCliente=$_POST['idCliente'];
$idEmpleado=$_POST['idEmpleado'];
$subTotal=$_POST['subTotal'];
$IGV=$_POST['IGV'];
$Total=$_POST['Total'];


		$respuesta = Factura::model() -> agregarFactura($nroSerie,$nroFact, $idCliente,$idEmpleado,$subTotal,$IGV,$Total);

		header('Content-Type: application/json; charset="UTF-8"');
    	  Util::renderJSON(array( 'success' => $respuesta ));
	}




public function actionAjaxAgregarDetalleFactura(){


 $json=$_POST['json'];
$array = json_decode($json);

$nroSerie=$_POST['nroSerie'];
$nroFact=$_POST['nroFact'];
$nro_documento=$_POST['nroFact'];
$tipo_documento="1";
$tipo="S";	
foreach($array as $obj){
			$idProducto=$obj->Codigo;
			$cantidad=$obj->Cantidad;
			$Precio=$obj->Precio;			
			$Total=$obj->Importe;			
 Detallefactura::model() -> agregarDetalleFactura($nroSerie,$nroFact,$idProducto,$cantidad,$Precio);

 Inventario::model() -> agregarInventario($tipo_documento,$nroSerie,$nro_documento,$tipo,$idProducto,$cantidad,$Precio,$Total);

}

//$array_string=mysql_escape_string(serialize($array));

      


		

		//header('Content-Type: application/json; charset="UTF-8"');
    	  Util::renderJSON(array( 'success' => true ));
	}

public function actionAjaxActualizarEstadocliente(){
		$idCliente = $_POST['idCliente'];
		$estado_Cli = $_POST['estado_Cli'];

		$respuesta = Cliente::model()->actualizarEstadoCliente($idCliente, $estado_Cli);

		Util::renderJSON(array('success' => TRUE));
	}
}