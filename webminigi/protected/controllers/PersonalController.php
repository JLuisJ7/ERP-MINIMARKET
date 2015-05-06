<?php
class PersonalController extends Controller{

	public function actionListadoEmpleados(){

		//$this->render("listadoEmpleados");
		$empleados = Sispersona::model()->listaPersonasPorCondicion(18);

		$this->render("listadoEmpleados", array(
			'empleados'=>$empleados,
		));

	}

	private function getPersonaService(){
		$personaService = new SisPersonaServiceImpl();
		return $personaService;
	}

	public function actionAjaxListadoEmpleados(){
		// Condicion de empleados = 18
		$empleados = $this->getPersonaService()->listaPersonasPorCondicion(18);

		Util::renderJSON($empleados);
	}

	public function actionAjaxObtenerEmpleado(){

		$idePersona = $_POST['idePersona'];
		$empleados = Sispersona::model()->obtenerPersonaPorIde($idePersona);

		$params = array(
			'des_tipodocumento'=>$empleados[0]['des_tipodocumento'], 
			'des_tipopersona'=>$empleados[0]['des_tipopersona'], 
			'des_sexo'=>$empleados[0]['des_sexo'], 
			'des_estcivil'=>$empleados[0]['des_estcivil']);

		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('salida'=>$empleados[0], 'detalle'=>$params));
	}

	public function actionAjaxSaveEmpleado(){
		try {
            $empleado = Yii::app()->request->getPost("empleado");
            
            $this->getPersonaService()->guardarDataPersona($empleado);
            Util::renderJSON(array('data' => $empleado, 'success' => TRUE));
        } catch (Exception $exc) {
            Util::renderJSON(array('success' => FALSE, 'message' => $exc->getMessage()));
        }
	}

	public function actionAjaxActualizarEmpleado(){

    	try {
            $idePersona = Yii::app()->request->getParam("idePersona");
            $ideEstado = Yii::app()->request->getParam("ideEstado");

            $this->getPersonaService()->actualizarEstadoPersona($idePersona, $ideEstado);
            Util::renderJSON(array('success' => TRUE));
        } catch (Exception $e) {
            Util::renderJSON(array('success' => FALSE));
        }
	}
}