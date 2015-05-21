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
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Facturacion</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Compras</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Ventas</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Planilla</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
    	<div class="row">
		  <div class="col-lg-6">		  	
		  		<h1>IGV</h1>		  	
			<div class="col-lg-6">
			    <div class="input-group">		      
			      <input type="text" class="form-control" id="IGV" placeholder="">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="button" id="ActualizarIGV">Actualizar</button>
			      </span>
			    </div><!-- /input-group -->
			</div>
		  </div><!-- /.col-lg-6 -->

		  <div class="col-lg-6">
		  	<h1>Tipo de Cambio</h1>
		    <div class="input-group">
		      
		      <input type="text" class="form-control" id="TipoCambio" placeholder="">
		      <span class="input-group-btn">
		        <button class="btn btn-default" type="button" id="ActualizarTipoCambio">Actualizar</button>
		      </span>
		    </div><!-- /input-group -->
		  </div><!-- /.col-lg-6 -->
		 
		</div><!-- /.row -->           
        
    </div>

    <div role="tabpanel" class="tab-pane" id="profile">Compras.</div>
    <div role="tabpanel" class="tab-pane" id="messages">Ventas</div>
    <div role="tabpanel" class="tab-pane" id="settings">Planilla</div>
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

</script>
