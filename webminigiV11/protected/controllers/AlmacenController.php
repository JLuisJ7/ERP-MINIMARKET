<?php
class AlmacenController extends Controller{
	public function actionAjaxListadoProductos(){
		// Condicion de empleados = 18
		$productos = Producto::model()->listadoProductos();

		Util::renderJSON($productos);
	}


public function actionAjaxActualizarEstadoProducto(){

	try {
            $idProducto = Yii::app()->request->getParam("idProducto");
            $estadoProd = Yii::app()->request->getParam("estadoProd");

            $producto=Producto::model()->actualizarEstadoProducto($idProducto, $estadoProd);
            Util::renderJSON(array('success' => TRUE));
        } catch (Exception $e) {
            Util::renderJSON(array('success' => FALSE));
        }
		
	}

public function actionAjaxObtenerEstadoProducto(){
	
		 $idProducto = Yii::app()->request->getParam("idProducto");
	
		$productos = Producto::model()->findByPK($idProducto);
    	Util::renderJSON($productos);
}
public function actionAjaxListarMarcas(){
	
		
	
		$marcas = Marca::model()->findAll(array('order'=>'nomMarca'));

		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode($marcas);
}

public function actionAjaxListarCategorias(){
	
		
	
		$marcas = Categoria::model()->findAll(array('order'=>'nomCategoria' ));

		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode($marcas);
}


	public function actionListadoProductos(){

		// $productos = Producto::model()->listadoProductos();
		$dataProvider=new CActiveDataProvider('Producto');
		$this->render("listadoProductos",array(
			'dataProvider'=>$dataProvider,
			));
	}
	public function actionAjaxObtenerProducto(){
		$idProducto = $_POST['idProducto'];
		
	
		$productos = Producto::model()->obtenerProductoxId($idProducto);

		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$productos[0]));
	}
	public function actionAjaxBuscarProducto(){
		$query = $_POST['query'];
		
	
		$productos = Producto::model()->BuscarProducto($query);

		Util::renderJSON($productos);
	}


	public function actionAjaxObtenerProducto_upd(){
		$idProducto = $_POST['idProducto'];
		
	
		$productos = Producto::model()->obtenerProductoxId_upd($idProducto);

		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$productos[0]));
	}

	public function actionAjaxEditarProducto(){

		$idProducto=$_POST['idProducto'];
      	$desc_Prod=$_POST['desc_Prod'];
      	$presentacion=$_POST['presentacion'];
      	$tipoProd=$_POST['tipoProd'];
      	
      	$stock=$_POST['stock'];
      	$idMarca=$_POST['idMarca'];
      	$idCategoria=$_POST['idCategoria'];
      	$estadoProd=$_POST['estadoProd'];
      	$Precio=$_POST['Precio'];




		$respuesta = Producto::model()->actualizarProducto($idProducto,$desc_Prod,$presentacion,$tipoProd,$stock,$idMarca,$idCategoria,$estadoProd,$Precio);

		Util::renderJSON(array( 'success' => $respuesta ));
	}

	public function actionAjaxAgregarProducto(){

		$desc_Prod =$_POST['desc_Prod'];
		$presentacion =$_POST['presentacion'];
		$tipoProd =$_POST['tipoProd'];
		$stock =$_POST['stock'];
		$precio =$_POST['precio'];
		$idMarca =$_POST['idMarca'];
		$idCategoria =$_POST['idCategoria'];
		try {
                      
            $producto=Producto::model()->agregarProducto($desc_Prod, $presentacion,$tipoProd,$stock,$idMarca,$idCategoria,$precio);
            Util::renderJSON(array( 'success' => $producto ));
        } catch (Exception $exc) {
            Util::renderJSON(array('success' => FALSE));
        }
		

	}
	/*public function actionAjaxActualizarEstadoProducto(){

	try {
            $idProducto = Yii::app()->request->getParam("idProducto");
            $estadoProd = Yii::app()->request->getParam("estadoProd");

            $producto=Producto::model()->actualizarEstadoProducto($idProducto, $estadoProd);
            Util::renderJSON(array('success' => TRUE));
        } catch (Exception $e) {
            Util::renderJSON(array('success' => FALSE));
        }
		
	}*/

	public function actionAjaxAgregarCategoria(){

		$nomCategoria =$_POST['nomCategoria'];
	
	
		$respuesta = Categoria::model()->agregarCategoria($nomCategoria);

		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$respuesta));
	}
	public function actionAjaxAgregarMarca(){

		$nomMarca =$_POST['nomMarca'];
	
	
		$respuesta = Marca::model()->agregarMarca($nomMarca);

		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$respuesta));
	}

	public function actionAjaxEliminarProducto(){


		$idProducto = $_POST['idProducto'];
		$respuesta = Producto::model()->eliminarProducto($idProducto);

		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$respuesta));
	}

}