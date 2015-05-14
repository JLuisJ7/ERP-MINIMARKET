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
        	<div class="col-xs-4">
        		
				<div class="form-group">
				    <label for="nroSerie">Serie</label>
				    <input type="text" class="form-control" id="nroSerie" value="001" disabled>
				  </div>
				
					<div class="form-group">
				    <label for="nroFactura">nro Fact</label>
				    <input type="text" class="form-control" id="nroFactura" disabled>
				  </div>
			     		
				  <div class="form-group">
				    <label for="idCliente">Cliente</label>
				    <input type="text" class="form-control" id="idCliente" value="1">
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
			    <input type="text" class="form-control" id="fac_idProducto" disabled>	
			    <input type="text" class="form-control" id="fac_desc_Prod" disabled>			    
			  </div>
			  <div class="form-group">
			    <label for="">Precio</label>
			    <input type="text" class="form-control" id="fac_Precio" disabled>			    
			  </div>
			  <div class="form-group">
			    <label for="">Cantidad</label>
			    <input type="number" class="form-control" id="fac_CantProd" >			    
			  </div>
			  <div class="form-group">
			    <label for="">Importe</label>
			    <input type="text" class="form-control" id="fac_valorVenta" disabled>			    
			  </div>
			  <button id="addRow">Agregar Producto</button>
			</div>
        
        	<button id="add_Factura">Registrar Factura</button>

          
          <table  class="table table-striped table-bordered" cellspacing="0" width="100%" id="DetalleFactura" style="">
            <thead>
              <tr>
                <!--th style="vertical-align: middle;">#</th-->
                <th style="vertical-align: middle;" >Codigo</th>
                <th style="vertical-align: middle;" >Descripcion</th>
                <th style="vertical-align: middle;" >Cantidad</th>
                <th style="vertical-align: middle;" >Precio</th>
                <th style="vertical-align: middle;" >Importe</th>                
              </tr>
            </thead>
           
        	<tbody>
            <tr style="display:none;">
            	<td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
               
            </tr>
           
        </tbody>

          </table>
        <button id="add_DetalleFact">Agregar Detalle</button>
        <div class="row">
  		<div class="col-md-3 col-md-offset-9">
  			<div class="form-group">
		    	<label for="subTotal">SubTotal</label>
		    	<input type="text" class="form-control" id="subTotal"  disabled>
			</div>
			<div class="form-group">
			    <label for="igv">IGV</label>
			    <input type="text" class="form-control" id="igv" placeholder="" disabled>
			</div>
			<div class="form-group">
			    <label for="Total">Total</label>
			    <input type="text" class="form-control" id="Total" placeholder="" disabled>
			</div> 
  		</div>
		</div>
                 



</div>
        </div>
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->