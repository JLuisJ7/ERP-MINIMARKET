<?php
class VentasController extends Controller{


public function actionAjaxListarClientes(){
	
		
	
		$clientes = Cliente::model()->ListarClientesCombo();
		
    	Util::renderJSON($clientes);
}
	public function actionAjaxBuscarCliente(){
		$query = $_POST['query'];
		
	
		$clientes = Cliente::model()->BuscarCliente($query);

		Util::renderJSON($clientes);
	}



	public function actionregistrarFactura(){
			
		if($this->verificarSessiousuario()==FALSE){
			$this->redirect("login.php");
		}else{
			$this->render("registrarFactura");
		}

		


		
	}

	public function actionFacturas(){

		
						
		if($this->verificarSessiousuario()==FALSE){

			$this->redirect("login.php");
		}else{

			$this->render("Facturas");
		}

		

	}
	public function actionBoletas(){

if($this->verificarSessiousuario()==FALSE){
			$this->redirect("login.php");
		}else{
			$this->render("boletas");
		}
		
	}


	public function actionAjaxListadoClientes(){
		
		$clientes = Cliente::model()->listadoClientes();

		Util::renderJSON($clientes);
	}
	public function actionAjaxListadoFacturas(){
		
		$facturas = Factura::model()->listadoFacturas();

		Util::renderJSON($facturas);
	}

	public function actionAjaxListadoBoletas(){
		
		$boletas = Boleta::model()->listadoBoletas();

		Util::renderJSON($boletas);
	}



	public function actionAjaxObtenerNroComprobante(){
		$nroSerie = $_POST['nroSerie'];
		$Factura = Factura::model()->ObtenerNroFactura($nroSerie);
		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$Factura[0]));
		
	}
	public function actionAjaxObtenerNroBoleta(){
		$nroSerie = $_POST['nroSerie'];
		$Boleta = Boleta::model()->ObtenerNroBoleta($nroSerie);
		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$Boleta[0]));
		
	}

	public function actionListadoClientes(){

		
		$clientes = Cliente::model()->listadoClientes();
		if($this->verificarSessiousuario()==FALSE){
			$this->redirect("login.php");
		}else{
			$this->render("listadoClientes",array(
			'clientes'=>$clientes,
			));
		}
		
	}

	public function actionAjaxObtenerCliente(){
		$idCliente = $_POST['idCliente'];
		$clientes = Cliente::model()->obtenerClientexId($idCliente);

		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$clientes[0]));
	}

	public function actionAjaxObtenerDetalle(){
		

    	$nroSerie = $_POST['nroSerie'];
		$nroFact = $_POST['nroFact'];
		$detalle = Detallefactura::model()->obtenerDetallexFact($nroSerie,$nroFact);
			Util::renderJSON($detalle);
		
	}
public function actionAjaxObtenerDetalleBoleta(){
		

    	$nroSerie = $_POST['nroSerie'];
		$nroBol = $_POST['nroBol'];
		$detalle = DetalleBoleta::model()->obtenerDetallexBoleta($nroSerie,$nroBol);
			Util::renderJSON($detalle);
		
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
public function actionAjaxAgregarBoleta(){


	
$nroSerie=$_POST['nroSerie'];
$nroBol=$_POST['nroBoleta'];
$idCliente=$_POST['idCliente'];
$idEmpleado=$_POST['idEmpleado'];
$Total=$_POST['Total'];


		$respuesta = Boleta::model() -> agregarBoleta($nroSerie,$nroBol, $idCliente,$idEmpleado,$Total);

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

public function actionAjaxAgregarDetalleBoleta(){


 $json=$_POST['json'];
$array = json_decode($json);

$nroSerie=$_POST['nroSerie'];
$nroBol=$_POST['nroBol'];
$nro_documento=$_POST['nroBol'];
$tipo_documento="3";
$tipo="S";	
foreach($array as $obj){
			$idProducto=$obj->Codigo;
			$cantidad=$obj->Cantidad;
			$Precio=$obj->Precio;			
			$Total=$obj->Importe;			
 DetalleBoleta::model() -> agregarDetalleBoleta($nroSerie,$nroBol,$idProducto,$cantidad,$Precio);

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

	public function actionAjaxActualizarEstadoFactura(){
		$nroSerie = $_POST['nroSerie'];
		$nroFact = $_POST['nroFact'];
		$estadoFact = $_POST['estadoFact'];

		$respuesta = Factura::model()->actualizarEstadoFactura($nroSerie,$nroFact,$estadoFact);

		Util::renderJSON(array('success' => TRUE));
	}
}