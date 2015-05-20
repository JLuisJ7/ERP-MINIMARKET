<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Modulo de Compras';
// Titulo del modulo
$this->moduleTitle="Modulo de Compras";
// Subtitulo del modulo
$this->moduleSubTitle="Ordenes de Compra";
// Breadcrumbs
$this->breadcrumbs=array(
	'Ordenes de Compra',
);?>

<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class='box-header with-border'>
                  <h3 class='box-title'><i class="fa fa-user"></i> Listado de Facturas</h3>
                </div>
                <div class="box-body">
                  <table class="table table-striped table-hover" id="listaOrdenesC" style="">
                    <thead>
                      <tr>                        
                        <th style="vertical-align: middle;" >Serie</th>
                        <th style="vertical-align: middle;" >Nro.</th>
                        <th style="vertical-align: middle;" >Proveedor</th>
                        <th style="vertical-align: middle;" >Empleado</th>
                        <th style="vertical-align: middle;" >Fecha</th>
                        <th style="vertical-align: middle;" >Subtotal</th>
                        <th style="vertical-align: middle;" >IGV</th>
                        <th style="vertical-align: middle;" >Total</th>
                        <th style="vertical-align: middle;" >&nbsp;</th>
                      </tr>
                    </thead>                 
                  </table>


                </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
<div class="modal fade" id="myModalOrdenCDetallada" tabindex="-1" role="dialog" aria-labelledby="myModalOrdenCDetalladaLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Cabecera -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#myModalFacturaDetallada').modal('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalOrdenCDetalladaLabel">Orden de Compra<img class="loading-small-precarga" style="display: none;" src="<?php echo Yii::app()->theme->baseUrl;?>/dist/img/loading.gif" /></h4>
              </div>
              
              <div class="modal-body" style="background-color:#fff;">
        <table  class="table table-striped table-bordered" cellspacing="0" width="100%" id="OrdenCDetallada" style="">
                <thead>
                  <tr>
                    <!--th style="vertical-align: middle;">#</th-->
                    <!-- <th style="vertical-align: middle;" >Codigo</th> -->
                    <th style="vertical-align: middle;" >Descripcion</th>
                    <th style="vertical-align: middle;" >Cantidad</th>
                    <th style="vertical-align: middle;" >Precio</th>
                    <th style="vertical-align: middle;" >Importe</th>                                  
                  </tr>
                </thead>
             </table>
             
              

              </div><!-- /.modal-body -->             

            </div><!-- /. modal-content -->
          </div><!-- /. modal-dialog-->          
        </div><!-- /#myModalEditarCliente --> 
    <script>
    window.onload=function(){
        OrdenCore.initListadoOrdenesC();
    };



</script>