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
        	<div class="col-xs-4">
        		
				<div class="form-group">
				    <label for="nroSerie">Serie</label>
				    <input type="text" class="form-control" id="nroSerie" value="001" disabled>
				  </div>
				
					<div class="form-group">
				    <label for="nroOrden">nro Orden</label>
				    <input type="text" class="form-control" id="nroOrden" disabled>
				  </div>
			     		
				  <div class="form-group">
				    <label for="idCliente">Proveedor</label>
				    <input type="text" class="form-control" id="idProveedor" value="1">
				  </div>
				  <div class="form-group">
				    <label for="">Empleado</label>
				    <input type="text" class="form-control" id="idEmpleado" value="1">
				  </div>		 
				 
				
        	</div>
        	<div class="col-xs-4">        		
			  <div class="form-group">
			    <label for="">Producto</label>
			    <input type="text" class="form-control" id="buscarProducto" placeholder="">
			    <select multiple class="form-control" id="findProducto">
				</select>
			  </div>
			</div>

			<div class="col-xs-4">        		
			  <div class="form-group">
			    <label for="">Producto</label>
			    <input type="text" class="form-control" id="fac_idProducto" >	
			    <input type="text" class="form-control" id="fac_desc_Prod" >			    
			  </div>
			  <div class="form-group">
			    <label for="">Precio</label>
			    <input type="text" class="form-control" id="fac_Precio" >			    
			  </div>
			  <div class="form-group">
			    <label for="">Cantidad</label>
			    <input type="number" class="form-control" id="fac_CantProd" >			    
			  </div>
			  <div class="form-group">
			    <label for="">Total</label>
			    <input type="text" class="form-control" id="fac_valorVenta" >			    
			  </div>
			  <button id="addRow">Agregar Producto</button>
			</div>
        
        	<button id="add_OrdenCompra">Registrar Orden de Compra</button>

          
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
        <button id="add_DetalleFact">Agregar Detalle</button>
        <div class="row">
  		<div class="col-md-3 col-md-offset-9">
  			<div class="form-group">
		    	<label for="subTotal">SubTotal</label>
		    	<input type="text" class="form-control" id="subTotal" placeholder="">
			</div>
			<div class="form-group">
			    <label for="igv">IGV</label>
			    <input type="text" class="form-control" id="igv" placeholder="">
			</div>
			<div class="form-group">
			    <label for="Total">Total</label>
			    <input type="text" class="form-control" id="Total" placeholder="">
			</div> 
  		</div>
		</div>
                 



</div>
        </div>
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->