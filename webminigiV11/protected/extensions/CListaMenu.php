<?php
class CListaMenu extends CApplicationComponent{
	
	public $ideGrupoCatalogo;

	public function init(){}

	// HE HECHO CAMBIOS DESDE AQUI // SOLO EL IDROL ================================
	public function listadoPrincipal($idRol){

		$lista = array(array('label'=>'NAVEGACIÓN PRINCIPAL', 'itemOptions'=>array('class'=>'header treeview')));
		//array_push($lista, array('label'=>'Inicio', 'url'=>array('#'), 'itemOptions'=>array('class'=>'active')));
		//echo "El id usuario alcanzado es: ".$idUsuario;

		// HE HECHO CAMBIOS DESDE AQUI ======================================
		$dataOpciones = AdmOpcion::model()->listarOpcionesPorCatalogo(2, $idRol);
		// HASTA AQUI =========================================================

        foreach ($dataOpciones as $opcion) {
        	$subOpciones = array();
        	$numSubItems = 0;
        	$vinetaLista="";

        	if($opcion->ind_padre=="0"){
        		$padre = $opcion->ide_opcion;

        		foreach ($dataOpciones as $subOpcion) {
        			

        			
        			if($subOpcion->ind_padre==$padre){
if($subOpcion->subPadre=='0'){

	        			array_push(
	        				$subOpciones,
	        				array(
	        					'label'=>' <i class="fa fa-circle-o"></i> '.$subOpcion->des_nombre,
	        					'url'=>array($subOpcion->des_ruta)


	        				)
	        			);
	        		}else{
	        			$subPadre = $subOpcion->ide_opcion;
	        			$subOpcionesPadre = array();
        				
        				
        					foreach ($dataOpciones as $subPadres) {
        				if($subPadres->subPadre==$subPadre){		
        							array_push(
	        				$subOpcionesPadre,
	        				array(
	        					'label'=>' <i class="fa fa-circle-o"></i> '.$subPadres->des_nombre,
	        					'url'=>array($subPadres->des_ruta)


	        				)
	        			);
}
							}

        			
        
						
						array_push(
	        				$subOpciones,
	        				array(
	        					'label'=>' <i class="fa fa-circle-o"></i> '.$subOpcion->des_nombre.'<i class="fa fa-angle-left pull-right"></i>',
	        					'url'=>'',
	        					'submenuOptions'=>array('class'=>'treeview-menu'),'items'=>$subOpcionesPadre


	        				)
	        			);


	        		}
	        			$numSubItems++;

	        		}
        		}

        		$vinetaLista = $numSubItems>0 ? '<i class="fa fa-angle-left pull-right"></i>' : '';

	        	$opciones = array(
					'label'=>'<i class="fa fa-'.$opcion->des_icon.'"></i> <span>'.$opcion->des_nombre.'</span> '.$vinetaLista, 
					'url'=>array($opcion->des_ruta),
					'itemOptions'=>array('class'=>'treeview'),
					'items'=>$subOpciones
				);

				array_push($lista, $opciones);
        	}

		}

        return $lista;
	}
}

