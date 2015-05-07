<?php
class SisPersonaServiceImpl implements SispersonaService{

	public function listaPersonasGenerico($params){

		$condition = " ide_estado=1 ";

		if($params['ideCondicion']!=0){
			$condition .= " AND ide_condicion=".$params['ideCondicion']." ";
		}
		
		if($params['idePersona']!=0){
			$condition .= " AND ide_persona=".$params['idePersona']." ";
		}
		
		$personas = SisPersona::model()->findAll(array(
            "condition" => $condition,
            "order" => ' ide_persona DESC',
        ));

		$data = array();
		$i=0;

		foreach ($personas as $e) {
			$data[$i] = $e->attributes;
			$i++;
		}

        return $data;
	}

	public function actualizaDataPersona($idePersona,$persona){

		$persona=SisPersona::model()->findByPk($idePersona);

		print_r($persona);
	}

	public function guardarDataPersona($data){

		list($dia, $mes, $year)=explode("/", $data["fecNacimiento"]);
		$fechaMysql=$year."-".$mes."-".$dia;

		$atrib = array(
			"ide_persona"=>0, 
			"des_nombres"=>strtoupper($data["desNombres"]), 
			"des_apepat"=>strtoupper($data["apePaterno"]), 
			"des_apemat"=>strtoupper($data["apeMaterno"]), 
			"des_razonsocial"=>"", 
			"nro_documento"=>$data["desDocumento"], 
			"ide_tipodocumento"=>10, 
			"des_telefono"=>$data["desTelefono"], 
			"des_correo"=>$data["desCorreo"], 
			"ide_tipopersona"=>12, 
			"ide_condicion"=>18, 
			"ide_sexo"=>$data["ideSexo"], 
			"ide_estcivil"=>$data["ideEstadoCivil"],
			"fec_nacimiento"=>$fechaMysql,
			"ide_estado"=>1,
		);
		
		$persona = new SisPersona();
		$persona->attributes = $atrib;
		$persona->save();

	}

	public function actualizarEstadoPersona($idePersona, $ideEstado){
		
		Sispersona::model()->updateByPk($idePersona,array("ide_estado"=>$ideEstado));
	}
}