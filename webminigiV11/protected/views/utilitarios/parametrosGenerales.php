<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Utilitarios';
// Titulo del modulo
$this->moduleTitle="Utilitarios";
// Subtitulo del modulo
$this->moduleSubTitle="Parametros Genererales";
// Breadcrumbs
$this->breadcrumbs=array(
	'Parametros Generales',
);?>
<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class='box-header with-border'>
                  <h3 class='box-title'><i class="fa fa-list-alt"></i> Paramtros Generales</h3>
                </div>
                <div class="box-body">
                  
					<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Parametros Generales</a></li>
    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
    	<div class="row">
		  <div class="col-lg-6">		  	
		  				  	
			<div class="col-lg-6">
        <h3>IGV <small id="msgIGV" style="display:none;"> Actualizado</small></h3>
			    <div class="input-group">	
          <span class="input-group-btn">
                    <button class="btn btn-default desbloquearParametro" type="button" data-input="IGV"><i class="fa fa-unlock"></i></button>
                  </span>	      
			      <input type="text" class="form-control" id="IGV" placeholder="" disabled>
			      <span class="input-group-btn">
			        <button class="btn btn-default ActualizarParametro" type="button" data-input="IGV">Actualizar</button>
			      </span>
			    </div><!-- /input-group -->
          
			</div>
		  </div><!-- /.col-lg-6 -->
<div class="col-lg-6">
        <div class="col-lg-7">
        <h3>Serie Factura <small id="msgSerieFactura" style="display:none;">Actualizado</small></h3>
        <div class="input-group">
          <span class="input-group-btn">
                    <button class="btn btn-default desbloquearParametro" type="button" data-input="SerieFactura"><i class="fa fa-unlock"></i></button>
                  </span>
          <input type="text" class="form-control" id="SerieFactura" placeholder="" disabled>
          <span class="input-group-btn">
            <button class="btn btn-default ActualizarParametro" type="button" data-input="SerieFactura" >Actualizar</button>
          </span>

        </div><!-- /input-group -->
       
      </div><!-- /.col-lg-6 -->
    </div><!-- /.col-lg-6 -->
		  <div class="col-lg-6">
        <div class="col-lg-7">
                <h3>Tipo de Cambio <small id="msgTipoCambio" style="display:none;">Actualizado</small></h3>
                <div class="input-group">
                  <span class="input-group-btn">
                    <button class="btn btn-default desbloquearParametro" type="button" data-input="TipoCambio"><i class="fa fa-unlock"></i></button>
                  </span>
                  <input type="text" class="form-control" id="TipoCambio" placeholder="" disabled>
                  <span class="input-group-btn">
                    <button class="btn btn-default ActualizarParametro" type="button" data-input="TipoCambio">Actualizar</button>
                  </span>
                </div><!-- /input-group -->
                
              </div><!-- /.col-lg-6 --></div>
      

      <div class="col-lg-6">
        <div class="col-lg-7">
                <h3>Serie Orden de Compra <small id="msgSerieOrden" style="display:none;">Actualizado</small></h3>
                <div class="input-group">
                  <span class="input-group-btn">
                    <button class="btn btn-default desbloquearParametro" type="button" data-input="SerieOrden"><i class="fa fa-unlock"></i></button>
                  </span>
                  <input type="text" class="form-control" id="SerieOrden" placeholder="" disabled>
                  <span class="input-group-btn">
                    <button class="btn btn-default ActualizarParametro"  type="button" data-input="SerieOrden">Actualizar</button>
                  </span>
                </div><!-- /input-group -->
                
              </div><!-- /.col-lg-6 --></div>
		 
		</div><!-- /.row -->           
        
    </div>

  </div>

</div>
		
                </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
   <!-- Modal -->
<script>
obtenerParamGeneral(1,"IGV");
obtenerParamGeneral(2,"TipoCambio");
obtenerParamGeneral(3,"SerieFactura");
obtenerParamGeneral(4,"SerieOrden");

$(document).ready(function($) {
 $(".desbloquearParametro").click(function(event) {
   var input=$(this).attr('data-input');
   $("#"+input+"").prop('disabled', false);

 }); 


});

</script>
