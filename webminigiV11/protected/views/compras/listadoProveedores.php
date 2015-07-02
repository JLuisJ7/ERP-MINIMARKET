<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Modulo de Compras';
// Titulo del modulo
$this->moduleTitle="Modulo de Compras";
// Subtitulo del modulo
$this->moduleSubTitle="Proveedores";
// Breadcrumbs
$this->breadcrumbs=array(
	'Proveedores',
);?>

<!-- Main content -->

        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class='box-header with-border'>
                  <h3 class='box-title'><i class="fa fa-user"></i> Listado de Proveedores</h3>
                </div>
                <div class="box-body">
                  
                   <table id="listaProveedores" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr >
                        <!--th style="vertical-align: middle;">#</th-->
                        <th>Razón Social</th>                        
                        <th>RUC</th>                        
                        <th>Dirección</th>
                        <th>Telefono</th>
                        <th>Correo Electronico</th>
                        <th></th>
                      </tr>
                    </thead>                 
                  </table>
                  
                  


                </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        <div class="modal fade" id="myModalNuevoProveedor" tabindex="-1" role="dialog" aria-labelledby="myModalNuevoProveedorLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Cabecera -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#ModalNuevoProveedor').modal('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalNuevoProveedorLabel">Nuevo Proveedor<img class="loading-small-precarga" style="display: none;" src="<?php echo Yii::app()->theme->baseUrl;?>/dist/img/loading.gif" /></h4>
              </div>
              <!-- /Cabecera -->
              <div class="alert alert-dismissable " id="message_save_Proveedor" style="display: none;">
        </div>
              <div class="modal-body">
               
      <form id="ProveedorForm" method="post"  class="form-horizontal"   onclick="ProvCore.validar();" target="ProveedorPG" >     <input type="hidden" class="form-control" id="edit_idProveedor"   name="edit_idProveedor" >             
<div class="form-group">
<label class="col-md-4 control-label" for="RazSoc_Prov">Nombre o Razón Social:</label>
<div class="col-lg-7">
<input id="RazSoc_Prov" name="RazSoc_Prov" type="text" placeholder="" class="form-control input-md" value="">
        
      </div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="tipoPersona_Prov">Tipo de Persona:</label>
<div class="col-md-7">
<select class="form-control" name="tipoPersona_Prov" id="tipoPersona_Prov">
          
          <option value="">Seleccione un tipo de Persona</option>
          <option value="0">Natural</option>
          <option value="1" >Juridica</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="RUC">RUC:</label>
<div class="col-md-7">
<input id="ruc_Prov" name="ruc_Prov" type="text" placeholder="RUC" class="form-control input-md inputNumero" value="" maxlength="11">
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="direccion_Prov">Dirección:</label>
<div class="col-md-7">
<div class="input-group">
  <div class="input-group-addon">
    <i class="fa fa-location-arrow"></i>
</div>
<input id="direccion_Prov" name="direccion_Prov" type="text" placeholder="direccion" class="form-control input-md" value="">
</div>

</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="telefono_Prov">Teléfono:</label>
<div class="col-md-7">
<div class="input-group">
  <div class="input-group-addon">
    <i class="fa fa-phone"></i>
  </div> 

  <input id="telefono_Prov" name="telefono_Prov" type="tel" placeholder="telefono" class="form-control inputNumero" value="" maxlength="9">

</div>

</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="email_Prov">Correo Electrónico:</label>
<div class="col-md-7">
<div class="input-group">
  <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 
<input id="email_Prov" name="email_Prov" type="email" placeholder="E-mail" class="form-control input-md" data-error="El correo ingresado es invalido" value="">
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
        </div><!-- /#myModalNuevoProveedor --> 

        <div class="modal fade" id="myModalEditarProveedor" tabindex="-1" role="dialog" aria-labelledby="myModalEditarProveedorLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Cabecera -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#ModalEditarProveedor').modal('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalEditarProveedorLabel">Editar Proveedor<img class="loading-small-precarga" style="display: none;" src="<?php echo Yii::app()->theme->baseUrl;?>/dist/img/loading.gif" /></h4>
              </div>
              <!-- /Cabecera -->
              <div class="alert alert-dismissable " id="message_update_Proveedor" style="display: none;">
        </div>
              <div class="modal-body">
               
      <form id="updateProveedorForm" method="post"  class="form-horizontal"   onclick="ProvCore.validarEditarProveedor();" target="ProveedorPG" >                  
<div class="form-group">
<label class="col-md-4 control-label" for="edit_RazSoc_Prov">Nombre o Razón Social:</label>
<div class="col-lg-7">
<input id="edit_RazSoc_Prov" name="edit_RazSoc_Prov" type="text" placeholder="" class="form-control input-md" value="">
        
      </div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="edit_tipoPersona_Prov">Tipo de Persona:</label>
<div class="col-md-7">
<select class="form-control" name="edit_tipoPersona_Prov" id="edit_tipoPersona_Prov">
          
          <option value="">Seleccione un tipo de Persona</option>
          <option value="0">Natural</option>
          <option value="1" >Juridica</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="edit_RUC">RUC:</label>
<div class="col-md-7">
<input id="edit_ruc_Prov" name="edit_ruc_Prov" type="text" placeholder="RUC" class="form-control input-md inputNumero" value="" maxlength="11" >
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="edit_direccion_Prov">Dirección:</label>
<div class="col-md-7">
<div class="input-group">
  <div class="input-group-addon">
    <i class="fa fa-location-arrow"></i>
  </div>
<input id="edit_direccion_Prov" name="edit_direccion_Prov" type="text" placeholder="direccion" class="form-control input-md" value="">
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="edit_telefono_Prov">Teléfono:</label>
<div class="col-md-7">
<div class="input-group">
  <div class="input-group-addon">
    <i class="fa fa-phone"></i>
  </div> 
  <input id="edit_telefono_Prov" name="edit_telefono_Prov" type="tel" placeholder="telefono" class="form-control inputNumero" value="" maxlength="9"  onkeydown="return validarNumeros(event)">
</div>

</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="edit_email_Prov">Correo Electrónico :</label>
<div class="col-md-7">
<div class="input-group">
  <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

<input id="edit_email_Prov" name="edit_email_Prov"  type="email" placeholder="E-mail" class="form-control input-md" data-error="El correo ingresado es invalido" value="">
</div> 


</div>
</div>
 <div class="form-group">
<label class="col-lg-4 control-label" for="edit_estado_Prov">Estado:</label>
<div class="col-lg-7">
<div class="checkbox">
<label>
<input type="checkbox" name="edit_estado_Prov" id="edit_estado_Prov"><span id="edit_textEstado"></span>
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
        </div><!-- /#myModalEditarProveedor --> 
<script>
    window.onload=function(){
        ProvCore.initListadoProveedores();
    };
</script>