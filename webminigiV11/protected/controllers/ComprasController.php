<?php
class ComprasController extends Controller{

public function actionAjaxAgregarOrdenCompra(){


	
$nroSerie=$_POST['nroSerie'];
$nroOrden=$_POST['nroOrden'];
$idProveedor=$_POST['idProveedor'];
$idEmpleado=$_POST['idEmpleado'];
$subTotal=$_POST['subTotal'];
$IGV=$_POST['IGV'];
$Total=$_POST['Total'];


		$respuesta = OrdenCompra::model() -> agregarOrdenCompra($nroSerie,$nroOrden, $idProveedor,$idEmpleado,$subTotal,$IGV,$Total);

		header('Content-Type: application/json; charset="UTF-8"');
    	  Util::renderJSON(array( 'success' => $respuesta ));
	}

public function actionAjaxAgregarDetalleOrdenCompra(){


 $json=$_POST['json'];
$array = json_decode($json);

$nroSerie=$_POST['nroSerie'];
$nroOrden=$_POST['nroOrden'];
	
foreach($array as $obj){
			$idProducto=$obj->Codigo;
			$cantidad=$obj->Cantidad;
			$Precio=$obj->Precio;			
 DetalleOrdenCompra::model() -> agregarDetalleOrdenCompra($nroSerie,$nroOrden,$idProducto,$cantidad,$Precio);

}
}
	public function actionAjaxObtenerNroOrden(){
		// Condicion de empleados = 18
		$OrdenCompra = OrdenCompra::model()->ObtenerNroOrden();
		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$OrdenCompra[0]));
		
	}

	public function actionregistraCompra(){

		$this->render("registraCompra");
	}
	public function actionListadoProveedores(){

		$proveedores = Proveedor::model()->listadoProveedores();
		$this->render("listadoProveedores",array(
			'proveedores'=>$proveedores,
			));
		
	}
	public function actionAjaxListadoProveedores(){
		// Condicion de empleados = 18

		$proveedores = Proveedor::model()->listadoProveedores();

		Util::renderJSON($proveedores);
	}

	public function actionAjaxObtenerProveedor(){
		$idProveedor = $_POST['idProveedor'];
		$proveedores = Proveedor::model()->obtenerProveedorxId($idProveedor);

		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$proveedores[0]));
	}

		public function actionAjaxEditarProveedor(){

		$idProveedor=$_POST['idProveedor'];
		$RazSoc_Prov=$_POST['RazSoc_Prov'];
		$tipoPersona_Prov=$_POST['tipoPersona_Prov'];
		$ruc_Prov=$_POST['ruc_Prov'];
		$direccion_Prov=$_POST['direccion_Prov'];
		$telefono_Prov=$_POST['telefono_Prov'];
		$email_Prov=$_POST['email_Prov'];
		$estado_Prov=$_POST['estado_Prov'];


		$respuesta = Proveedor::model() -> actualizarProveedor($idProveedor,$RazSoc_Prov,$tipoPersona_Prov,$ruc_Prov,$direccion_Prov,$telefono_Prov,$email_Prov,$estado_Prov);

		Util::renderJSON(array( 'success' => $respuesta ));
	}

		public function actionAjaxAgregarProveedor(){


		

		$RazSoc_Prov=$_POST['RazSoc_Prov'];
		$tipoPersona_Prov=$_POST['tipoPersona_Prov'];
		$ruc_Prov=$_POST['ruc_Prov'];
		$direccion_Prov=$_POST['direccion_Prov'];
		$telefono_Prov=$_POST['telefono_Prov'];
		$email_Prov=$_POST['email_Prov'];



		$respuesta = Proveedor::model() -> agregarProveedor($RazSoc_Prov,$tipoPersona_Prov,$ruc_Prov,$direccion_Prov,$telefono_Prov,$email_Prov);

		
    	Util::renderJSON(array( 'success' => $respuesta ));
	}

	public function actionAjaxActualizarEstadoProveedor(){
		$idProveedor = $_POST['idProveedor'];
		$estado_Prov = $_POST['estado_Prov'];

		$respuesta = Proveedor::model()->actualizarEstadoProveedor($idProveedor, $estado_Prov);

		Util::renderJSON(array('success' => TRUE));
	}
	
}