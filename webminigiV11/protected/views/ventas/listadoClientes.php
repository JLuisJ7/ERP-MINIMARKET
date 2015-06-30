<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Modulo de Ventas';
// Titulo del modulo
$this->moduleTitle="Modulo de Ventas";
// Subtitulo del modulo
$this->moduleSubTitle="Clientes";
// Breadcrumbs
$this->breadcrumbs=array(
	'Clientes',
);?>

<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class='box-header with-border'>
                  <h3 class='box-title'><i class="fa fa-user"></i> Listado de Clientes</h3>
                </div>
                <div class="box-body">
                  <table id="listaClientes" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <!--th style="vertical-align: middle;">#</th-->
                        <th style="vertical-align: middle;" >Nombres o Razón Social</th>                        
                        <th style="vertical-align: middle;" >Ruc</th>
                        <th style="vertical-align: middle;" >Dirección</th>
                        <th style="vertical-align: middle;" >Telefono</th>
                        <th style="vertical-align: middle;" >Correo Electronico</th>
                        <th style="vertical-align: middle;" >&nbsp;</th>
                      </tr>
                    </thead>                 
                  </table>


                </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

        <div class="modal fade" id="myModalNuevoCliente" tabindex="-1" role="dialog" aria-labelledby="myModalNuevoClienteLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Cabecera -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#ModalNuevoCliente').modal('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalNuevoClienteLabel">Nuevo Cliente<img class="loading-small-precarga" style="display: none;" src="<?php echo Yii::app()->theme->baseUrl;?>/dist/img/loading.gif" /></h4>
              </div>
              <!-- /Cabecera -->
              <div class="alert alert-dismissable " id="message_save_Cliente" style="display: none;">
        </div>
              <div class="modal-body">
               
      <form id="ClienteForm" method="post"  class="form-horizontal"   onclick="FnCore.validar();" target="ClientePG" >     <input type="hidden" class="form-control" id="edit_idCliente"   name="edit_idCliente" >             
<div class="form-group">
<label class="col-md-4 control-label" for="RazSoc_Cli">Nombre o Razón Social:</label>
<div class="col-lg-7">
<input id="RazSoc_Cli" name="RazSoc_Cli" type="text" placeholder="" class="form-control input-md" value="">
        
      </div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="tipoPersona_Cli">Tipo de Persona:</label>
<div class="col-md-7">
<select class="form-control" name="tipoPersona_Cli" id="tipoPersona_Cli">
          
          <option value="">Seleccione un tipo de Persona</option>
          <option value="0">Natural</option>
          <option value="1" >Juridica</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="RUC">RUC:</label>
<div class="col-md-7">
<input id="ruc_Cli" name="ruc_Cli" type="text" placeholder="RUC" class="form-control input-md inputNumero" value="" maxlength="11">
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="direccion_Cli">Dirección:</label>
<div class="col-md-7">
<div class="input-group">
  <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span> 
<input id="direccion_Cli" name="direccion_Cli" type="text" placeholder="direccion" class="form-control input-md" value="">
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="telefono_Cli">Teléfono:</label>
<div class="col-md-7">
<div class="input-group">
  <div class="input-group-addon">
    <i class="fa fa-phone"></i>
  </div>
  <input type="tel" id="telefono_Cli" name="telefono_Cli"   class="form-control inputNumero" maxlength="9" data-inputmask='"mask": "(99) 302-5902"' data-mask/>
</div>
</div>

</div>

<div class="form-group">
<label class="col-md-4 control-label" for="email_Cli">Correo Electrónico:</label>
<div class="col-md-7">
<div class="input-group">
  <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 
<input id="email_Cli" name="email_Cli" type="email" placeholder="E-mail" class="form-control input-md" data-error="El correo ingresado es invalido" value="">
</div> 

</div>
</div>
  
   

   <div class="form-group">
                    <div class="col-md-5 col-md-offset-3">
                      <button type="submit" class="btn btn-primary">Registrar</button>
                      <button   id="cerrarmodal" class="btn btn-primary"    data-dismiss="modal" rel="tooltip" title="Cerrar"
                      >Cerrar</button>
                    </div>
                  </div>
  </form><!-- /# usuarioForm -->
             
             

              </div><!-- /.modal-body -->             

            </div><!-- /. modal-content -->
          </div><!-- /. modal-dialog-->          
        </div><!-- /#myModalNuevoCliente --> 

        <div class="modal fade" id="myModalEditarCliente" tabindex="-1" role="dialog" aria-labelledby="myModalEditarClienteLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Cabecera -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#ModalEditarCliente').modal('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalEditarClienteLabel">Editar Cliente<img class="loading-small-precarga" style="display: none;" src="<?php echo Yii::app()->theme->baseUrl;?>/dist/img/loading.gif" /></h4>
              </div>
              <!-- /Cabecera -->
              <div class="alert alert-dismissable " id="message_update_Cliente" style="display: none;">
        </div>
              <div class="modal-body">
               
      <form id="updateClienteForm" method="post"  class="form-horizontal"   onclick="FnCore.validarEditarCliente();" target="ClientePG" >                  
<div class="form-group">
<label class="col-md-4 control-label" for="edit_RazSoc_Cli">Nombre o Razón Social:</label>
<div class="col-lg-7">
<input id="edit_RazSoc_Cli" name="edit_RazSoc_Cli" type="text" placeholder="" class="form-control input-md" value="">
        
      </div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="edit_tipoPersona_Cli">Tipo de Persona:</label>
<div class="col-md-7">
<select class="form-control" name="edit_tipoPersona_Cli" id="edit_tipoPersona_Cli">
          
          <option value="">Seleccione un tipo de Persona</option>
          <option value="0">Natural</option>
          <option value="1" >Juridica</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="edit_RUC">RUC:</label>
<div class="col-md-7">
<input id="edit_ruc_Cli" name="edit_ruc_Cli" type="text" placeholder="RUC" class="form-control input-md inputNumero" value="" maxlength="11" >
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="edit_direccion_Cli">Dirección:</label>
<div class="col-md-7">
<div class="input-group">
  <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span> 
<input id="edit_direccion_Cli" name="edit_direccion_Cli" type="text" placeholder="direccion" class="form-control input-md" value="">
</div>

</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="edit_telefono_Cli">Teléfono:</label>
<div class="col-md-7">
<div class="input-group">
  <div class="input-group-addon">
    <i class="fa fa-phone"></i>
  </div>

  <input id="edit_telefono_Cli" name="edit_telefono_Cli" type="tel" class="form-control inputNumero" maxlength="9"  >
</div>

</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="edit_email_Cli">Correo Electrónico:</label>
<div class="col-md-7">
<div class="input-group">
  <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 
<input id="edit_email_Cli" name="edit_email_Cli"  type="email" placeholder="E-mail" class="form-control input-md" data-error="El correo ingresado es invalido" value="">
</div> 
</div>
</div>
 <div class="form-group">
<label class="col-lg-4 control-label" for="edit_estado_Cli">Estado:</label>
<div class="col-lg-7">
<div class="checkbox">
<label>
<input type="checkbox" name="edit_estado_Cli" id="edit_estado_Cli"><span id="edit_textEstado"></span>
</label>
</div>
</div>
</div>
 
   

   <div class="form-group">
                    <div class="col-md-5 col-md-offset-3">
                      <button type="submit" class="btn btn-primary">Actualizar</button>
                      <button   id="cerrarmodal" class="btn btn-primary"    data-dismiss="modal" rel="tooltip" title="Cerrar"
                      >Cerrar</button>
                    </div>
                  </div>
  </form><!-- /# usuarioForm -->
             
             

              </div><!-- /.modal-body -->             

            </div><!-- /. modal-content -->
          </div><!-- /. modal-dialog-->          
        </div><!-- /#myModalEditarCliente --> 


<script>
    window.onload=function(){
        FnCore.initListadoClientes();
    };
</script>