<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Reporte de Ventas';
// Titulo del modulo
$this->moduleTitle="Reportes";
// Subtitulo del modulo
$this->moduleSubTitle="Ventas";
// Breadcrumbs
$this->breadcrumbs=array(
  'Ventas',
);?>

<section class="content">
     
          <!--end contadores-->
          <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Seleccione Proveedor</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                   <div class="form-group">
      <label class="" for="fac_RazSoc_Prov">Proveedor: </label>
   
      <select id="fac_RazSoc_Prov" class="selectpicker form-control" data-live-search="true" title="Seleccione Un Proveedor" style="display:none;">
        <option value="">Seleccione Proveedor</option>
      </select>

    </div>
    <div class="form-group" style="display:none;">
          <label for="">Producto</label><br>
         <select id="fac_desc_Prod" data-doc="orden" class=" form-control" >
        <option value="">Seleccione Producto</option>
      </select>
                    
      
        </div>
          <div class="row" >
              <!-- Donut chart -->
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <i class="fa fa-bar-chart-o"></i>
                  <h3 class="box-title"></h3>                  
                </div>
                <div class="box-body">
               <div id="container" style=""></div>

                </div><!-- /.box-body-->
              </div><!-- /.box -->
            </div>
          </div>

                </div><!-- /.box-body -->

              
              </div><!-- /.box -->
         <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class='box-header with-border'>
                  <h3 class='box-title'><i class="fa fa-user"></i> Ordenes de Compra</h3>
                </div>
                <div class="box-body">
                  <table id="listaOrdenesC" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>                        
                        <th style="vertical-align: middle;" >Serie</th>
                        <th style="vertical-align: middle;" >Nro.</th>
                        <th style="vertical-align: middle;" >Proveedor</th>
                        <!-- <th style="vertical-align: middle;" >Empleado</th> -->
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
          <!--end contadores-->
       
             
</section><!-- /.content -->


<div class="modal fade" id="myModalOrdenCDetallada" tabindex="-1" role="dialog" aria-labelledby="myModalOrdenCDetalladaLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Cabecera -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#myModalFacturaDetallada').modal('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalOrdenCDetalladaLabel">Detalle de la Orden de Compra : <b><span id="serie-OrdenC"></span></b><img class="loading-small-precarga" style="display: none;" src="<?php echo Yii::app()->theme->baseUrl;?>/dist/img/loading.gif" /></h4>
              </div>
              
              <div class="modal-body" style="background-color:#fff;">
        <table id="OrdenCDetallada" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
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
 listarProveedoress();
  obtenerGraficOrdenesAnio()
 $(document).ready(function($) {

    $( "#fac_RazSoc_Prov" )
  .change(function () {
    var  idProveedor=$("#fac_RazSoc_Prov").val();  
if(idProveedor!=""){ 
  OrdenCore.Ordenes_X_Proveedor(idProveedor);
 obtenerGraficOrdenesAnio(idProveedor);
}
   

  })
  .change();
  
 });
 
</script>
 

