<?php
class AdmCatalogoController extends Controller{

	public function actionTraeCatalogo(){
		$ideGrupo = $_POST['ideGrupo'];

		$Criteria = new CDbCriteria();
		$Criteria->condition = "ide_grupo = ".$ideGrupo;

		$catalogo = AdmCatalogo::model()->findAll($Criteria);

		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$catalogo));
	}

	private function getAdmCatalogoService(){
		$catalogoService = new AdmCatalogoServiceImpl();
		return $catalogoService;
	}

	public function actionAjaxObtenerCatalogo(){

		//$ideGrupoCatalogo = Yii::app()->request->getParam("idePersona");
		$ideGrupoCatalogo = 7;
		
		$catalogo = $this->getAdmCatalogoService()->obtenerCatalogo($ideGrupoCatalogo);

		/*header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$catalogo));*/
    	Util::renderJSON($catalogo);
	}
}