<?php

class SiteController extends Controller
{
	
	public function filterEnforcelogin($filterChain) {
        $session = new CHttpSession;
        $session->open();
        $userSesion = $session->get('usuarioSesion');
        if (empty($userSesion)) {
            header(Constantes::LOCATION_REDIRECT_LOGIN);
        }
        $filterChain->run();
    }

    public function filters() {
        return array('enforcelogin -login login');
    }

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}