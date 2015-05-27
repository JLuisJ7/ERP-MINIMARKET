<?php
class PersonalController extends Controller{
	
	public function actionAjaxListarEmpleados(){	
		
			$empleados = Sispersona::model()->ListarEmpleadoCombo()
;

		
		
    	Util::renderJSON($empleados);
}

	public function actionListadoEmpleados(){

		$this->render("listadoEmpleados");

	}
public function actionajaxListadoEmpleados(){
		
		$empleados = Sispersona::model()->listadoEmpleados();

		Util::renderJSON($empleados);
	}
public function actionAjaxObtenerEmpleado(){
		$idEmpleado = $_POST['idEmpleado'];
		$empleados = Sispersona::model()->obtenerEmpleadoxId($idEmpleado);

		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$empleados[0]));
	}
	
	public function actionAjaxEditarEmpleado(){
		$ide_persona=$_POST['ide_persona'];
		$des_nombres=$_POST['des_nombres'];
		$des_apepat=$_POST['des_apepat'];
		$des_apemat=$_POST['des_apemat'];
		$nro_documento=$_POST['nro_documento'];
		$fec_nacimiento=$_POST['fec_nacimiento'];
		$des_telefono=$_POST['des_telefono'];
		$des_correo=$_POST['des_correo'];
		$Sueldo=$_POST['Sueldo'];
		$ide_estcivil=$_POST['ide_estcivil'];
		$sexo=$_POST['sexo'];
		$ide_estado=$_POST['ide_estado'];

		$respuesta = Sispersona::model() -> actualizarEmpleado($ide_persona,$des_nombres,$des_apepat,$des_apemat,$nro_documento,$fec_nacimiento,$des_telefono,$des_correo,$Sueldo,$ide_estcivil,$sexo,$ide_estado);

		Util::renderJSON(array( 'success' => $respuesta ));
	}

public function actionAjaxAgregarEmpleado(){


	

		$des_nombres=$_POST['des_nombres'];
		$des_apepat=$_POST['des_apepat'];
		$des_apemat=$_POST['des_apemat'];
		$nro_documento=$_POST['nro_documento'];
		$fec_nacimiento=$_POST['fec_nacimiento'];
		$des_telefono=$_POST['des_telefono'];
		$des_correo=$_POST['des_correo'];
		$Sueldo=$_POST['Sueldo'];
		$ide_estcivil=$_POST['ide_estcivil'];
		$sexo=$_POST['sexo'];
		$ide_estado=$_POST['ide_estado'];

		$respuesta = Sispersona::model() -> agregarEmpleado($des_nombres,$des_apepat,$des_apemat,$nro_documento,$fec_nacimiento,$des_telefono,$des_correo,$Sueldo,$ide_estcivil,$sexo,$ide_estado);

		Util::renderJSON(array( 'success' => $respuesta ));
	}

public function actionAjaxActualizarEstadoEmpleado(){
		$ide_persona = $_POST['ide_persona'];
		$ide_estado = $_POST['ide_estado'];

		$respuesta = Sispersona::model()->actualizarEstadoEmpleado($ide_persona, $ide_estado);

		Util::renderJSON(array('success' => TRUE));
	}

}