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
                  <table class="table table-striped table-bordered" id="listaOrdenesC" style="">
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

        <div class="modal fade" id="myModalNuevoOrdendeCompra" tabindex="-1" role="dialog" aria-labelledby="myModalNuevoOrdendeCompraLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <!-- Cabecera -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#myModalNuevoOrdendeCompra').modal('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalNuevoOrdendeCompraLabel">Orden de Compra <b>Nro.</b>   <span id="nroSerie" data-param=""></span>-<span id="nroOrden" data-nro=""></span><img class="loading-small-precarga" style="display: none;" src="<?php echo Yii::app()->theme->baseUrl;?>/dist/img/loading.gif" /></h4>
              </div>
              
              <div class="modal-body" style="background-color:#fff;">
            
             
              <div id="Factura">
          <div class="form-group col-xs-12">
            
            <div class="col-lg-7">
              
              <div class="input-group">

                <div class="" style="border: 1px solid;width: 100px;text-align: center;font-size: 1.5em;">
                  
                </div>                
              </div>
            </div>
            </div>
          <div class="col-xs-12">
            
        <!-- <div class="form-group">
            <label for="nroSerie">Serie</label>
            <input type="text" class="form-control" id="nroSerie" value="001" disabled>
          </div>
        
          <div class="form-group">
            <label for="nroOrden">nro Orden</label>
            <input type="text" class="form-control" id="nroOrden" disabled>
             </div> -->
            <!-- <div class="form-group">
            <label for="fac_RazSoc_Prov">Proveedor</label>
            <input type="text" class="form-control buscarProveedor" data-id="" id="fac_RazSoc_Prov" >
            <select multiple class="form-control" id="findProveedor" style="position:absolute;z-index:1000;display:none;">
          </select>

          </div> -->
         
    <div class="form-group">
      <label class="" for="fac_RazSoc_Prov">Proveedor: </label>
   
      <select id="fac_RazSoc_Prov" class="selectpicker form-control" data-live-search="true" title="Seleccione Un Proveedor" style="display:none;">
        <option value="">Seleccione Proveedor</option>
      </select>

    </div>
 
          <div class="form-group" style="display:none;">
            <label for="">Empleado</label>
            <input type="text" class="form-control" id="idEmpleado" value="1">
          </div>     
         
       
          </div>
          
<form class="form-inline col-xs-12">
    <div class="form-group" >
          <label for="">Producto</label><br>
         <select id="fac_desc_Prod" class=" form-control" >
        <option value="">Seleccione Producto</option>
      </select>
                    
      
        </div>
                  
          
          <div class="form-group">
            <label for="">Precio</label><br>
            <input type="text" class="form-control" id="fac_Precio" disabled>         
          </div>
          <div class="form-group">
            <label for="">Cantidad</label><br>
            <input type="number" class="form-control" id="fac_CantProd" >         
          </div>
          <div class="form-group">
            <label for="">Importe</label><br>
            <input type="text" class="form-control" id="fac_valorVenta" disabled>         
          </div>
          <div class="form-group">
            <label for="" style="color:transparent;">Agregar</label><br>
            <button id="addRow" type="button" class="btn btn-default"><i class="fa fa-cart-plus" ></i> Agregar</button>         
          </div>
          
        
</form>
        
          <table  class="table table-striped table-bordered" cellspacing="0" width="100%" id="DetalleFactura" style="">
            <thead>
              <tr>
                <!--th style="vertical-align: middle;">#</th-->
                <th style="vertical-align: middle;" >Codigo</th>
                <th style="vertical-align: middle;" >Descripcion</th>
                <th style="vertical-align: middle;" >Cantidad</th>
                <th style="vertical-align: middle;" >Precio</th>
                <th style="vertical-align: middle;" >Importe</th>  
                <th style="vertical-align: middle;" ></th>                 
              </tr>
            </thead>          
          

          </table>
        <!-- <button id="add_DetalleFact">Agregar Detalle</button> -->
      <div class="row">
     <div class="form-inline col-xs-12">
        <div class="form-group col-xs-3">
          <label for="subTotal">SubTotal</label><br>
          <input type="text" class="form-control  col-xs-3" id="subTotal" placeholder="" disabled>
      </div>
      <div class="form-group col-xs-3">
          <label for="igv">IGV</label><br>
          <input type="text" class="form-control  col-xs-3" id="igv" data-param="" placeholder="" disabled>
      </div>
      <div class="form-group col-xs-3">
          <label for="Total">Total</label><br>
          <input type="text" class="form-control  col-xs-3" id="Total" placeholder="" disabled>
      </div> 
      <div class="form-group col-xs-3">   
      <label for="Total" style="color:transparent;"></label><br>     
          <button id="add_OrdenCompra" class="btn btn-primary  col-xs-12"><i class="fa fa-floppy-o"></i> Registrar Orden</button> 
      </div>
      </div>
      </div>
    
                 



</div>

              </div><!-- /.modal-body -->             

            </div><!-- /. modal-content -->
          </div><!-- /. modal-dialog-->          
        </div><!-- /#myModalEditarCliente --> 

    <script>
    window.onload=function(){
        OrdenCore.initListadoOrdenesC();
    };



</script>
<script>
  
  obtenerParametro(4,"T","nroSerie");
  obtenerParametro(1,"I","igv");
  listarProveedoress();

  $(document).ready(function(){
    setTimeout(function(){
      obtenerNroComprobante("compras","nroOrden","nroSerie");
    },300);
    

  });
</script>

