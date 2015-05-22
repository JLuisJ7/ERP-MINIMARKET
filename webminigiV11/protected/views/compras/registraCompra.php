<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Modulo de Compras';
// Titulo del modulo
$this->moduleTitle="Modulo de Compras";
// Subtitulo del modulo
$this->moduleSubTitle="Registrar Compra";
// Breadcrumbs
$this->breadcrumbs=array(
	'Registrar Compra',
);?>
<!-- Main content -->


<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class='box-header with-border'>
          <h3 class='box-title'><i class="fa fa-user"></i> Registrar Compra</h3>
        </div>
        <div class="box-body">
        <div id="Factura">
        	<div class="form-group col-xs-4">
            
            <div class="col-lg-7">
            	<label>Orde de Compra</label>
              <div class="input-group">              	
                <div class="input-group-addon" style="border: 1px solid;">
                  <span id="nroSerie" data-param=""></span>-<span id="nroOrden" data-nro=""></span>
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
			     	<div class="form-group">
				    <label for="fac_RazSoc_Prov">Proveedor</label>
				    <input type="text" class="form-control buscarProveedor" data-id="" id="fac_RazSoc_Prov" >
				    <select multiple class="form-control" id="findProveedor" style="position:absolute;z-index:1000;display:none;">
					</select>

				  </div>
				  <div class="form-group" style="display:none;">
				    <label for="">Empleado</label>
				    <input type="text" class="form-control" id="idEmpleado" value="1">
				  </div>		 
				 
				
        	</div>
<form class="form-inline col-xs-12">
	 <div class="form-group" style="position:relative;">
			    <label for="">Producto</label><br>
			   
			    <div class="input-group">
                        
                       <input type="text" class="form-control buscarProductoCompra"  data-id="" id="fac_desc_Prod" placeholder="" style="min-width: 200px;" autocomplete="off">
                       <!-- <span class="input-group-btn">
        <button class="btn btn-default" type="button"><i class="fa fa-search-plus"></i></button>
      </span> -->
                      </div>
			 <select multiple class="form-control" id="findProducto" style="position:absolute;z-index:1000;display:none;min-width: 200px;">
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
				    <label for=""></label><br>
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
        <!-- <button id="add_DetalleFact">Agregar Detalle</button> -->
        <div class="row">
  		<div class="col-md-4 col-md-offset-8">
  			<div class="form-group">
		    	<label for="subTotal">SubTotal</label>
		    	<input type="text" class="form-control" id="subTotal" placeholder="" disabled>
			</div>
			<div class="form-group">
			    <label for="igv">IGV</label>
			    <input type="text" class="form-control" id="igv" data-param="" placeholder="" disabled>
			</div>
			<div class="form-group">
			    <label for="Total">Total</label>
			    <input type="text" class="form-control" id="Total" placeholder="" disabled>
			</div> 
			<div class="form-group">			  
			    <button id="add_OrdenCompra" class="btn btn-primary btn-lg"><i class="fa fa-floppy-o"></i> Registrar Orden de Compra</button> 
			</div>
  		</div>
		</div>
                 



</div>
        </div>
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->

<script>
	
	obtenerParametro(4,"T","nroSerie");
	obtenerParametro(1,"I","igv");

	$(document).ready(function(){
		setTimeout(function(){
			obtenerNroComprobante("compras","nroOrden","nroSerie");
		},300);

	});
</script>