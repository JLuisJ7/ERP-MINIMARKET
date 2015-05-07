<?php
interface SisPersonaService {
	
	//public function listaPersonasPorCondicion($ideCondicion);
	public function listaPersonasGenerico($params);
	public function guardarDataPersona($data);
	public function actualizarEstadoPersona($idePersona, $ideEstado);
	public function actualizaDataPersona($idePersona,$persona);
	
}
?>