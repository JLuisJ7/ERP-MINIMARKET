<?php
interface SisPersonaService {
	
	public function listaPersonasPorCondicion($ideCondicion);
	public function guardarDataPersona($data);
	public function actualizarEstadoPersona($idePersona, $ideEstado);
}
?>