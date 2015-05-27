<?php
class LoginController extends Controller{
    public function actionAjaxRegistrarUsuario(){


    

$des_usuario=$_POST['des_usuario'];
$des_password=$_POST['des_password'];
$ide_rol=$_POST['ide_rol'];
$ide_persona=$_POST['ide_persona'];
$des_correo=$_POST['des_correo'];


        $respuesta = SisUsuario::model() -> registrarUsuario($des_usuario,$des_password,$ide_rol,$ide_persona,$des_correo);

        header('Content-Type: application/json; charset="UTF-8"');
          Util::renderJSON(array( 'success' => $respuesta ));
    }   

public function actionAjaxVerificarCorreo(){

        $des_correo =$_POST['des_correo'];
    
    
        $respuesta = sispersona::model()->verificarCorreo($des_correo);

        header('Content-Type: application/json; charset="UTF-8"');
        echo CJSON::encode(array('output'=>$respuesta));
    }

    public function actionAjaxVerificarUsuario(){

        $des_usuario =$_POST['des_usuario'];
    
    
        $respuesta = SisUsuario::model()->verificarUsuario($des_usuario);

        header('Content-Type: application/json; charset="UTF-8"');
        echo CJSON::encode(array('output'=>$respuesta));
    }


	public function actionIndex(){
		
		$this->redirect("login.php");
	}

    private function getUsuarioService(){
        $usuarioService = new usuarioServiceImpl();
        return $usuarioService;
    }

	public function actionAuthenticationUser() {
        $loginUser = Yii::app()->request->getParam('username');
        $passwordUser = Yii::app()->request->getParam('password');
        $result = $this->getUsuarioService()->autenticarUsuario($loginUser, $passwordUser);
        
        if ($result['success']) {
            $session = new CHttpSession;
            $session->open();
            $session->add('usuarioSesion', $result);
            $this->redirect('index.php');
        } else {

            $this->redirect('login.php?message=' . $result['message'] . '&l=' . $loginUser);
        }
    }

    public function actionLogOut() {
        $session = new CHttpSession;
        $session->open();
        $session->remove('usuarioSesion');
        $this->redirect('login.php');
    }
}