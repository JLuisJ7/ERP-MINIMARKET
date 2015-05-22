<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Modulo de Ventas';
// Titulo del modulo
$this->moduleTitle="Modulo de Ventas";
// Subtitulo del modulo
$this->moduleSubTitle="Generar Factura";
// Breadcrumbs
$this->breadcrumbs=array(
	'Generar Factura',
);?>
<!-- Main content -->


<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class='box-header with-border'>
          <h3 class='box-title'><i class="fa fa-user"></i> Generar Factura</h3>
        </div>
        <div class="box-body">
        <div id="Factura">
        	<div class="form-group col-xs-4">
            
            <div class="col-lg-7">
            	<label>Factura</label>
              <div class="input-group">              	
                <div class="input-group-addon" style="border: 1px solid;">
                  <span id="nroSerie" data-param="" ></span>-<span id="nroFactura" data-nro=""></span>
                </div>                
              </div>
            </div>
            </div>
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
				    <label for="idCliente">Cliente</label>
				    <input type="text" class="form-control buscarCliente" data-id="" id="fac_RazSoc_Cli" >
				    <select multiple class="form-control" id="findCliente" style="position:absolute;z-index:1000;display:none;">
					</select>

				  </div>
				  <div class="form-group" style="display:none;">
				    <label for="">Empleado</label>
				    <input type="text" class="form-control" id="idEmpleado" value="1">
				  </div>		 
				 
				
        	</div>


        	<div class="col-xs-4">        		
			 
			</div>

<form class="form-inline col-xs-12">
	 <div class="form-group" style="position:relative;">
			    <label for="">Producto</label><br>
			   
			    <div class="input-group">
                        
                       <input type="text" class="form-control buscarProductoVenta"  data-id="" id="fac_desc_Prod" placeholder="" style="min-width: 200px;" autocomplete="off">
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
				    <input type="number" data-stock="" class="form-control" id="fac_CantProd" min="0" max="">			    
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
      
        <div class="row">
  		<div class="col-md-3 col-md-offset-9">
  			<div class="form-group">
		    	<label for="subTotal">SubTotal</label>
		    	<input type="text" class="form-control" id="subTotal"  disabled>
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
			    <button id="add_Factura" class="btn btn-primary btn-lg"><i class="fa fa-floppy-o"></i> Registrar Factura</button> 
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
	
	obtenerParametro(3,"T","nroSerie");
	obtenerParametro(1,"I","igv");

	$(document).ready(function(){
		setTimeout(function(){
			obtenerNroComprobante("ventas","nroFactura","nroSerie");
		},300);

	});
	
</script>