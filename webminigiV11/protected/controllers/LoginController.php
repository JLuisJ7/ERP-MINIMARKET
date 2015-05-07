<?php
class LoginController extends Controller{

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