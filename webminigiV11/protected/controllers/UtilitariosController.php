<?php
class UtilitariosController extends Controller{

public function actionAjaxObtenerParametroGeneral(){

		$idParametro = $_POST['idParametro'];
		$Parametro = ParametroGeneral::model()->ObtenerParametroGeneral($idParametro);
		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$Parametro[0]));
		
	}
	public function actionAjaxActualizarParametroGeneral(){
		$idParametro=$_POST['idParametro'];
		$valor_Param=$_POST['valor_Param'];
		

		$respuesta = ParametroGeneral::model() -> actualizarParametroGeneral($idParametro,$valor_Param);

		Util::renderJSON(array( 'success' => $respuesta ));
	}


	public function actionparametrosGenerales(){
		$this->render("parametrosGenerales");
	}



}