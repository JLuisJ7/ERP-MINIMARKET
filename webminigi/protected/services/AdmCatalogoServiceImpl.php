<?php
class AdmCatalogoServiceImpl implements AdmCatalogoService{

	public function obtenerCatalogo($ideGrupoCatalogo){
		
		$condition = " ide_grupo=".$ideGrupoCatalogo." ";
		
		$catalogo = AdmCatalogo::model()->findAll(array(
            "condition" => $condition,
            "order" => ' ide_elemento DESC'
        ));
		
		$i=0;

		foreach ($catalogo as $e) {
			$data[$i] = $e->attributes;
			$i++;
		}

        return $data;
	}
}