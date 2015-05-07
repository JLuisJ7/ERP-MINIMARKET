<?php
class SeguridadController extends Controller{

	public function actionListadoPersonas(){
		
		$empleados = Sispersona::model()->listaPersonasPorCondicion(18);

		$this->render("listadoPersonas", array(
			'empleados'=>$empleados,
		));
	}
}