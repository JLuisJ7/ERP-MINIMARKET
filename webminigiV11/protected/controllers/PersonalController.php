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

		$params = array("idePersona"=>0, "ideCondicion"=>18);
		$empleados = $this->getPersonaService()->listaPersonasGenerico($params);

		Util::renderJSON($empleados);
	}

	public function actionAjaxObtenerEmpleado(){

		$idePersona = Yii::app()->request->getPost("idePersona");

		$params = array("idePersona"=>$idePersona, "ideCondicion"=>18);
		$empleados = $this->getPersonaService()->listaPersonasGenerico($params);

		Util::renderJSON($empleados[0]);
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

	public function actionAjaxActualizarDataEmpleado(){
		try {
            $idePersona = Yii::app()->request->getPost("idePersona");
            $persona = Yii::app()->request->getPost("empleado");

            $this->getPersonaService()->guardarDataPersona($idePersona, $persona);

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