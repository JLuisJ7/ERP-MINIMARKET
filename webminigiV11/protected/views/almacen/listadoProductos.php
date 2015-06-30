<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Modulo de Almacen';
// Titulo del modulo
$this->moduleTitle="Modulo de Almacen";
// Subtitulo del modulo
$this->moduleSubTitle="Productos";
// Breadcrumbs
$this->breadcrumbs=array(
	'Productos',
);?>
<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class='box-header with-border'>
                  <h3 class='box-title'><i class="fa fa-user"></i> Listado de Productos</h3>
                </div>
                <div class="box-body">
                  <table id="listaProductos" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <!--th style="vertical-align: middle;">#</th-->
                        <th style="vertical-align: middle;" >Descripción</th>
                        <th style="vertical-align: middle;" >Presentación</th>
                        <th style="vertical-align: middle;" >Tipo</th>
                        <th style="vertical-align: middle;" >Stock</th>
                        <th style="vertical-align: middle;" >Marca</th>
                        <th style="vertical-align: middle;" >Categoria</th>
                        <th style="vertical-align: middle;" >Precio</th>
                        <th style="vertical-align: middle;" >&nbsp;</th>
                      </tr>
                    </thead>                 
                  </table>


                </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
   <!-- Modal -->


        <div class="modal fade" id="myModalNuevoProducto" tabindex="-1" role="dialog" aria-labelledby="myModalNuevoProductoLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Cabecera -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#ModalNuevoProducto').modal('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalNuevoProductoLabel">Nuevo Producto<img class="loading-small-precarga" style="display: none;" src="<?php echo Yii::app()->theme->baseUrl;?>/dist/img/loading.gif" /></h4>
              </div>
              <!-- /Cabecera -->
            	<div class="alert alert-dismissable " id="message_save_Producto" style="display: none;">
				</div>
              <div class="modal-body">
                <form id="ProductoForm" method="post"  class="form-horizontal" onclick="ProdCore.validar();" target="ProductoPG" >
                  
					<div class="form-group">
					  <label class="col-lg-4 control-label" for="desc_Prod">Descripción:</label>
					  <div class="col-lg-7">
					    <input type="text" class="form-control" id="desc_Prod"   name="desc_Prod" placeholder="Descripción del Producto"  >
					  </div>
					</div>

                  	<div class="form-group">
				      <label class="col-lg-4 control-label" for="presentacion">Presentación:</label>
				      <div class="col-lg-7">
				        <input type="text" class="form-control" id="presentacion"   name="presentacion" placeholder="Presentacion del Producto"  >
				      </div>
				    </div>

	                 <div class="form-group">
				      	<label class="col-lg-4 control-label" for="tipoProd">Tipo de Producto:</label>
				       	<div class="col-lg-7">
					        <select class="form-control" name="tipoProd" id="tipoProd">
					          <option value="">Seleccione un tipo de Producto</option>
					          <option value="0">Perecible</option>
					          <option value="1" >No Perecible</option>
					        </select>
				      	</div>
				    </div>
				    <div class="form-group" style="display:none;" id="FechVenc">
                    <label class="col-lg-4 control-label">Fecha de Vencimiento:</label>
                    <div class="col-lg-7">
                      <!--input type="text" class="form-control" id="desNombres"  name="desNombres" placeholder="Fecha de Nacimiento"/-->
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input name="add_fecVenc" id="add_fecVenc" type="date" class="form-control" />
                      </div><!-- /.input group -->
                    </div>
                  </div>
                  <script>
                  	$(document).ready(function($) {
                  		$("#tipoProd").change(function(event) {
                  			if($(this).val()==0){
                  				$("#FechVenc").show();
                  			}else{
                  				$("#FechVenc").hide();
                  			}
                  		});
                  	});
                  </script>
					<div class="form-group has-succes">
				      	<label class="col-lg-4 control-label" for="ListaProveedores">Proveedor:</label>
				      	<div class="col-lg-7">
				       	 	<select class="form-control listaProveedores" name="ListaProveedores" id="ListaProveedores"></select>
				      	</div>
				      	<!-- <div class="col-lg-1">
				        	<button type="button" class="btn btn-primary new_Proveedor" id="nuevoProveedor" data-target="#ModalnuevoProveedor"><i class="fa fa-plus"></i></button>
				      	</div> -->
				    </div>
                  	<div class="form-group has-succes">
				      	<label class="col-lg-4 control-label" for="ListaMarcas">Marca:</label>
				      	<div class="col-lg-5">
				       	 	<select class="form-control ListaMarcas" name="ListaMarcas" id="ListaMarcas"></select>
				      	</div>
				      	<div class="col-lg-1">
				        	<button type="button" class="btn btn-primary new_Marca" id="nuevaMarca" data-target="#ModalnuevaMarca"><i class="fa fa-plus"></i></button>
				      	</div>
				    </div>

                 	 <div class="form-group">
				      	<label class="col-lg-4 control-label" For="ListaCategorias">Categoría:</label>
				     	 <div class="col-lg-5">
				        	<select class="form-control ListaCategorias" name="ListaCategorias" id="ListaCategorias"></select>
				      	</div>
				      	<div class="col-lg-1">
				        	<button type="button" class="btn btn-primary new_Category" id="nueva_Categoria" data-target="#ModalnuevaCategoria"><i class="fa fa-plus"></i></button>
				     	 </div>
				    </div>
				    <div class="form-group">
				        <label class="col-lg-4 control-label">Stock:</label>
				        <div class="col-lg-7">
				        	<input type="number" min="0" class="form-control inputNumero" id="add_stock"   name="add_stock" >
				        </div>
				     </div>
				     <div class="form-group">
				        <label class="col-lg-4 control-label" for="add_Precio">Precio:</label>
				        <div class="col-lg-7">
				        	<div class="input-group">
                        <span class="input-group-addon">S/.</span>
                       <input type="text" min="0" class="form-control" id="add_Precio"   name="add_Precio" >
                      </div>
				        	
				        </div>
				     </div>

                  <div class="form-group">
                    <div class="col-md-5 col-md-offset-3">
                      <button type="submit" class="btn btn-primary">Registrar</button>
                      <button   id="cerrarmodal" class="btn btn-danger"    data-dismiss="modal" rel="tooltip" title="Cerrar"
                      >Cerrar</button>
                    </div>
                  </div>
                </form><!-- /# usuarioForm -->
             

              </div><!-- /.modal-body -->             

            </div><!-- /. modal-content -->
          </div><!-- /. modal-dialog-->          
        </div><!-- /#myModalNuevoProducto --> 

        <div class="modal fade" id="myModalEditarProducto" tabindex="-1" role="dialog" aria-labelledby="myModalEditarProductoLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Cabecera -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#ModalEditarProducto').modal('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalEditarProductoLabel">Editar Producto<img class="loading-small-precarga" style="display: none;" src="<?php echo Yii::app()->theme->baseUrl;?>/dist/img/loading.gif" /></h4>
              </div>
              <!-- /Cabecera -->
            	<div class="alert alert-dismissable " id="message_update_Producto" style="display: none;">
				</div>
              <div class="modal-body">
                <form id="updateProductoForm" method="post"  class="form-horizontal" onclick="ProdCore.validarEditarProducto();" target="ProductoPG" >
                  
					
					    <input type="hidden" class="form-control" id="edit_idProducto"   name="edit_idProducto" >
					<div class="form-group">
					  <label class="col-lg-4 control-label" for="edit_desc_Prod">Descripción:</label>
					  <div class="col-lg-7">
					    <input type="text" class="form-control" id="edit_desc_Prod"   name="edit_desc_Prod" placeholder="Descripción del Producto"  >
					  </div>
					</div>

                  	<div class="form-group">
				      <label class="col-lg-4 control-label" for="edit_presentacion">Presentación:</label>
				      <div class="col-lg-7">
				        <input type="text" class="form-control" id="edit_presentacion"   name="edit_presentacion" placeholder="Presentacion del Producto"  >
				      </div>
				    </div>

	                 <div class="form-group">
				      	<label class="col-lg-4 control-label" for="edit_tipoProd">Tipo de Producto:</label>
				       	<div class="col-lg-7">
					        <select class="form-control" name="edit_tipoProd" id="edit_tipoProd">
					          <option value="">Seleccione un tipo de Producto</option>
					          <option value="0">Perecible</option>
					          <option value="1" >No Perecible</option>
					        </select>
				      	</div>
				    </div>
				     <div class="form-group" style="display:none;" id="edit_FechVenc">
                    <label class="col-lg-4 control-label">Fecha de Vencimiento:</label>
                    <div class="col-lg-7">
                      <!--input type="text" class="form-control" id="desNombres"  name="desNombres" placeholder="Fecha de Nacimiento"/-->
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input name="edit_fecVenc" id="add_fecVenc" type="date" class="form-control" />
                      </div><!-- /.input group -->
                    </div>
                  </div>
                  <script>
                  	$(document).ready(function($) {
                  		$("#edit_tipoProd").change(function(event) {
                  			if($(this).val()==0){
                  				$("#edit_FechVenc").show();
                  			}else{
                  				$("#edit_FechVenc").hide();
                  			}
                  		});
                  	});
                  </script>
					<div class="form-group has-succes">
				      	<label class="col-lg-4 control-label" for="edit_ListaProveedores">Proveedor:</label>
				      	<div class="col-lg-7">
				       	 	<select class="form-control listaProveedores" name="edit_ListaProveedores" id="edit_ListaProveedores"></select>
				      	</div>
				      	<!-- <div class="col-lg-1">
				        	<button type="button" class="btn btn-primary new_Proveedor" id="nuevoProveedor" data-target="#ModalnuevoProveedor"><i class="fa fa-plus"></i></button>
				      	</div> -->
				    </div>
                  	<div class="form-group has-succes">
				      	<label class="col-lg-4 control-label" for="edit_ListaMarcas">Marca:</label>
				      	<div class="col-lg-5">
				       	 	<select class="form-control ListaMarcas" name="edit_ListaMarcas" id="edit_ListaMarcas"></select>
				      	</div>
				      	<div class="col-lg-1">
				        	<button type="button" class="btn btn-primary new_Marca" id="nuevaMarca" data-target="#ModalnuevaMarca"><i class="fa fa-plus"></i></button>
				      	</div>
				    </div>


                 	 <div class="form-group">
				      	<label class="col-lg-4 control-label" For="edit_ListaCategorias">Categoría:</label>
				     	 <div class="col-lg-5">
				        	<select class="form-control ListaCategorias" name="edit_ListaCategorias" id="edit_ListaCategorias"></select>
				      	</div>
				      	<div class="col-lg-1">
				        	<button type="button" class="btn btn-primary new_Category" id="nueva_Categoria" data-target="#ModalnuevaCategoria"><i class="fa fa-plus"></i></button>
				     	 </div>
				    </div>
				    <div class="form-group">
				        <label class="col-lg-4 control-label" for="edit_stock">Stock:</label>
				        <div class="col-lg-7">
				        	<input type="number" min="0" class="form-control inputNumero" id="edit_stock"   name="edit_stock" >
				        </div>
				     </div>
				     <div class="form-group">
				        <label class="col-lg-4 control-label" for="edit_Precio">Precio:</label>
				        <div class="col-lg-7">
				        	<input type="text" min="0" class="form-control" id="edit_Precio"   name="edit_Precio" >
				        </div>
				     </div>
				     <div class="form-group">
				      <label class="col-lg-4 control-label" for="edit_estadoProd">Estado:</label>
				      <div class="col-lg-7">
				      <div class="checkbox">
				      <label>
				        <input type="checkbox" name="edit_estadoProd" id="edit_estadoProd"><span id="edit_textEstado"></span>
				      </label>
				      </div>
				    </div>
				    </div>


                  <div class="form-group">
                    <div class="col-md-5 col-md-offset-3">
                      <button type="submit" class="btn btn-primary">Actualizar</button>
                      <button   id="cerrarmodal" class="btn btn-danger"    data-dismiss="modal" rel="tooltip" title="Cerrar"
                      >Cerrar</button>
                    </div>
                  </div>
                </form><!-- /# usuarioForm -->
             

              </div><!-- /.modal-body -->             

            </div><!-- /. modal-content -->
          </div><!-- /. modal-dialog-->          
        </div><!-- /#myModalEditarEmpleado -->
<script>
    window.onload=function(){
        ProdCore.initListadoProductos();
    };
</script>