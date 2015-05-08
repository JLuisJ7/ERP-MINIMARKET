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
        	
        	<div class="col-xs-4">        		
				  <div class="form-group">
				    <label for="">Cliente</label>
				    <input type="text" class="form-control" id="Cliente" placeholder="">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Fecha</label>
				    <input type="date" class="form-control" id="fecha" placeholder="">
				  </div>
				 
				  <button type="submit" class="btn btn-default">Submit</button>
				
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
			  
			</div>
        
        	<button id="addRow">Add new row</button>
          
          <table class="table table-striped table-hover" id="DetalleFactura" style="">
            <thead>
              <tr>
                <!--th style="vertical-align: middle;">#</th-->
                <th style="vertical-align: middle;" >Codigo</th>
                <th style="vertical-align: middle;" >Descripcion</th>
                <th style="vertical-align: middle;" >Cantidad</th>
                <th style="vertical-align: middle;" >Precio</th>
                <th style="vertical-align: middle;" >Valor de Venta</th>                
              </tr>
            </thead>
            <tfoot>
	            <tr>
	                <th colspan="4" style="text-align:right">Total:</th>
	               
	                <th></th>
	            </tr>

        	</tfoot>
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
          <input type="text" id="subTotal">
<input type="text" id="igv" >
<input type="text" id="Total" >



        </div>
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->