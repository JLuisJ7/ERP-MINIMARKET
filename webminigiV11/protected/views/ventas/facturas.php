<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Modulo de Ventas';
// Titulo del modulo
$this->moduleTitle="Modulo de Ventas";
// Subtitulo del modulo
$this->moduleSubTitle="Facturas";
// Breadcrumbs
$this->breadcrumbs=array(
	'Facturas',
);?>

<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class='box-header with-border'>
                  <h3 class='box-title'><i class="fa fa-credit-card"></i> Listado de Facturas</h3>
                </div>
                <div class="box-body">
                  <table id="listaFacturas" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>                        
                        <th style="vertical-align: middle;" >Serie</th>
                        <th style="vertical-align: middle;" >Nro.</th>
                        <th style="vertical-align: middle;" >Cliente</th>
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

        <div class="modal fade" id="myModalFacturaDetallada" tabindex="-1" role="dialog" aria-labelledby="myModalFacturaDetalladaLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Cabecera -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#myModalFacturaDetallada').modal('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalFacturaDetalladaLabel">Detalle de la Factura : <b><span id="serie-factura"></span></b><img class="loading-small-precarga" style="display: none;" src="<?php echo Yii::app()->theme->baseUrl;?>/dist/img/loading.gif" /></h4>
              </div>
              
              <div class="modal-body" style="background-color:#fff;">
                
        <table  class="table table-striped table-bordered" cellspacing="0" width="100%" id="FacturaDetallada" style="">
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
        <div class="modal fade" id="myModalNuevoFactura" tabindex="-1" role="dialog" aria-labelledby="myModalNuevoFacturaLabel" aria-hidden="true">
          <div class="modal-dialog  modal-lg">
            <div class="modal-content">
              <!-- Cabecera -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#myModalNuevoFactura').modal('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalNuevoFacturaLabel">Factura <b>Nro.</b>  <span id="nroSerie" data-param="" ></span>-<span id="nroFactura" data-nro=""></span><img class="loading-small-precarga" style="display: none;" src="<?php echo Yii::app()->theme->baseUrl;?>/dist/img/loading.gif" /></h4>
              </div>
              
              <div class="modal-body" style="background-color:#fff;">
                
				              <div id="Factura">
         
          <!-- <div class="col-xs-4">

            
        <div class="form-group col-xs-4">
            <label for="nroSerie">Serie</label>
            <input type="text" class="form-control" id="nroSerie" value="001" disabled>
        </div>
        
        <div class="form-group col-xs-4">
            <label for="nroFactura">nro Fact</label>
            <input type="text" class="form-control" id="nroFactura" disabled>
          </div>
              
         
         
        
          </div> -->
          <div class="col-xs-12">           
          
           <div class="form-group">
            <label class="" for="fac_RazSoc_Cli">Cliente: </label>
         
            <select id="fac_RazSoc_Cli" class="selectpicker form-control" data-live-search="true" title="Seleccione Un Cliente" style="display:none;">
              <option value="">Seleccione Cliente</option>
            </select>

          </div>  
          <!-- <div class="form-group">
            <label for="idCliente">Cliente</label>
            <input type="text" class="form-control buscarCliente" data-id="" id="fac_RazSoc_Cli" >
            <select multiple class="form-control" id="findCliente" style="position:absolute;z-index:1000;display:none;">
          </select>

          </div> -->
          <div class="form-group" style="display:none;">
            <label for="">Empleado</label>
            <input type="text" class="" id="idEmpleado" value="1">
          </div>     
         
        
          </div>


          <div class="col-xs-4">            
       
      </div>

<form class="form-inline col-xs-12">
  <div class="form-group">
            <label class="" for="fac_desc_Prod">Producto: </label>
         
            <select id="fac_desc_Prod" data-doc="factura" class="selectpicker form-control" data-live-search="true" title="Seleccione Un Producto" style="display:none;">
              <option value="">Seleccione Producto</option>
            </select>

  </div>  

                  
          
          <div class="form-group">
            <label for="">Precio</label><br>
            <input type="text" class="form-control" id="fac_Precio" disabled>         
          </div>
          <div class="form-group">
            <label for="">Cantidad</label><br>
            <input type="number" data-stock="" class="form-control" id="fac_CantProd" value="" min="1" max="">          
          </div>
          <div class="form-group">
            <label for="">Importe</label><br>
            <input type="text" class="form-control" id="fac_valorVenta" disabled>         
          </div>
          <div class="form-group">
            <label for="" style="color:transparent;">a</label><br>
            <button id="addRow" type="button" class="btn btn-default"><i class="fa fa-cart-plus "></i> Agregar</button>         
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
      
        <div class="row">
          <div class="form-inline col-xs-3">
          </div>
     <div class="form-inline col-xs-9">
        <div class="form-group">
          <label for="subTotal">SubTotal</label><br>
          <input type="text" class="form-control" id="subTotal"  disabled>
      </div>
      <div class="form-group">
          <label for="igv">IGV</label><br>
          <input type="text" class="form-control" id="igv" data-param="" placeholder="" disabled>
      </div>
      <div class="form-group">
          <label for="Total">Total</label><br>
          <input type="text" class="form-control" id="Total" placeholder="" disabled>
      </div>
      <div class="form-group">
      <label for="" style="color:transparent;">registrar</label> <br>       
          <button id="add_Factura" class="btn btn-primary "><i class="fa fa-floppy-o"></i> Registrar Factura</button> 
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
        FactCore.initListadoFacturas();
    };



</script>
<script>
  
  obtenerParametro(3,"T","nroSerie");
  obtenerParametro(1,"I","igv");
  
  listarComboEntidad("ventas","Cliente","fac_RazSoc_Cli");
  listarComboEntidad("almacen","Producto","fac_desc_Prod");
  $(document).ready(function(){
    setTimeout(function(){
      obtenerNroComprobante("ventas","nroFactura","nroSerie");
    },300);

  });
  
</script>