<?php
class SisPersonaServiceImpl implements SispersonaService{

	public function listaPersonasPorCondicion($ideCondicion=0){

		$condition = " ide_estado=1 ";

		if($ideCondicion!=0){
			$condition .= " AND ide_condicion=".$ideCondicion." ";
		}
		
		$personas = SisPersona::model()->findAll(array(
            "condition" => $condition,
            "order" => ' ide_persona DESC'
        ));

		$data = array();
		$i=0;

		foreach ($personas as $e) {
			$data[$i] = $e->attributes;
			$i++;
		}

        return $data;
	}

	public function guardarDataPersona($data){
		//print_r($data);
		$persona = new SisPersona();
		//$persona->attributes = 
		$persona->save();

	}

	public function actualizarEstadoPersona($idePersona, $ideEstado){
		
		Sispersona::model()->updateByPk($idePersona,array("ide_estado"=>$ideEstado));
	}
}