<?php
class SeguridadController extends Controller{

public function actionAjaxActualizarEstadoUsuario(){

	
            $ide_usuario = Yii::app()->request->getParam("ide_usuario");
            $estado = Yii::app()->request->getParam("estado");

            $respuesta = SisUsuario::model()->actualizarEstadoUsuario($ide_usuario, $estado);

         header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$respuesta));
		
	}

	public function actionAjaxActualizarRolUsuario(){

	
            $ide_usuario = Yii::app()->request->getParam("ide_usuario");
            $ide_rol = Yii::app()->request->getParam("ide_rol");

            $respuesta = SisUsuario::model()->actualizarRolUsuario($ide_usuario, $ide_rol);

         header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$respuesta));
		
	}
	public function actionAjaxRegistrarUsuario(){


	

$des_usuario=$_POST['des_usuario'];
$des_password=$_POST['des_password'];
$ide_rol=$_POST['ide_rol'];
$ide_persona=$_POST['ide_persona'];


		$respuesta = SisUsuario::model() -> registrarUsuario($des_usuario,$des_password,$ide_rol,$ide_persona);

		header('Content-Type: application/json; charset="UTF-8"');
    	  Util::renderJSON(array( 'success' => $respuesta ));
	}

	public function actionAjaxVerificarCorreo(){


$des_correo=$_POST['des_correo'];


		$respuesta = SisUsuario::model() -> registrarUsuario($des_usuario,$des_password,$ide_rol,$ide_persona);

		header('Content-Type: application/json; charset="UTF-8"');
    	  Util::renderJSON(array( 'success' => $respuesta ));
	}

public function actionAjaxListaradmrols(){
	
		
			$roles = admrol::model()->ListarRolesCombo();

		
		
    	Util::renderJSON($roles);
}

public function actionAjaxRestablecerPassword(){

	try {
            $ide_usuario = Yii::app()->request->getParam("ide_usuario");
            $des_password = Yii::app()->request->getParam("des_password");

            $usuario=SisUsuario::model()->RestablecerPassword($ide_usuario, md5($des_password));
            Util::renderJSON(array('success' => TRUE));
        } catch (Exception $e) {
            Util::renderJSON(array('success' => FALSE));
        }
		
	}
public function actionAjaxObtenerUsuario(){
		$ide_usuario = $_POST['ide_usuario'];
		$usuario = SisUsuario::model()->obtenerUsuarioxId($ide_usuario);

		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$usuario[0]));
	}
	public function actionAjaxObtenerUsuarioRol(){
		$ide_usuario = $_POST['ide_usuario'];
		$usuario = SisUsuario::model()->obtenerUsuarioRolxId($ide_usuario);

		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$usuario[0]));
	}

	public function actionListadoPersonas(){
		
		$empleados = Sispersona::model()->listaPersonasPorCondicion(18);

		$this->render("listadoPersonas", array(
			'empleados'=>$empleados,
		));
	}


	public function actionlistaUsuarios(){

		$this->render("listaUsuarios");
	}

public function actionAjaxListadoUsuarios(){
		
		$usuarios = SisUsuario::model()->listadoUsuarios();

		Util::renderJSON($usuarios);
	}

}