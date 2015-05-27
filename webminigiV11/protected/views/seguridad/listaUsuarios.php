<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Modulo de Seguridad';
// Titulo del modulo
$this->moduleTitle="Modulo de Seguridad";
// Subtitulo del modulo
$this->moduleSubTitle="Usuarios";
// Breadcrumbs
$this->breadcrumbs=array(
	'Usuarios',
);?>

<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class='box-header with-border'>
                  <h3 class='box-title'><i class="fa fa-user"></i> Listado de Usuarios</h3>
                </div>
                <div class="box-body">
                  <table class="table table-striped table-bordered" id="listaUsuarios">
                    <thead>
                      <tr>
                        <!--th style="vertical-align: middle;">#</th-->
                        <th style="vertical-align: middle;" >Empleado</th>
                        <th style="vertical-align: middle;" >Usuario</th>
                        <th style="vertical-align: middle;" >Rol</th>
                        
                        <th style="vertical-align: middle;">&nbsp;</th>
                      </tr>
                    </thead>                 
                  </table>


                </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      <div class="modal fade" id="myModalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalEditarUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
              <!-- Cabecera -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" onclick="$('#ModalEditarUsuario').modal('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalEditarUsuarioLabel">Restablecer Contraseña<img class="loading-small-precarga" style="display: none;" src="<?php echo Yii::app()->theme->baseUrl;?>/dist/img/loading.gif" /></h4>
            </div>
              <!-- /Cabecera -->
            <div class="alert alert-dismissable " id="message_update_Usuario" style="display: none;">
            </div>
            <div class="modal-body">
            <div id="updateUsuarioForm" class="form-horizontal"    target="UsuarioPG" >                  
            <div class="form-group">
<label class="col-md-4 control-label" for="edit_Usuario">Usuario</label>
<div class="col-lg-7">

    <label class=" control-label" id="edit_Usuario" data-id="" data-pass="">Usuario</label>
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="edit_Empleado">Empleado</label>
<div class="col-lg-7">
<label class="control-label" id="edit_Empleado">Empleado</label>
       
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="edit_Rol">Rol</label>
<div class="col-lg-7">
<label class="control-label" id="edit_Rol"></label>      
</div>
</div>
<div class="form-group">
<label class="col-lg-4 control-label" for="edit_estado_User">Estado:</label>
<div class="col-lg-7">
<label class="control-label" id="edit_estado_User"></label>
</div>
</div>


   <div class="form-group">
    <label class="col-md-4 control-label" ></label>
                    <div class="col-md-7 ">
                      <button type="button"  class="btn btn-primary" style="width:100%;  margin-bottom: 10px;" id="btnRestablecer">Restablecer Contraseña</button>
                      <button   id="cerrarmodal" class="btn btn-danger"    data-dismiss="modal" rel="tooltip" title="Cerrar" style="width:100%;"
                      >Cerrar</button>
                    </div>
                  </div>
  </div><!-- /# usuarioForm -->
             
             

              </div><!-- /.modal-body -->             

            </div><!-- /. modal-content -->
          </div><!-- /. modal-dialog-->          
        </div><!-- /#myModalEditarCliente --> 

 <div class="modal fade" id="myModalNuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalNuevoUsuarioLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Cabecera -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#myModalNuevoUsuario').modal('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalNuevoUsuarioLabel">Agregar Usuario<img class="loading-small-precarga" style="display: none;" src="<?php echo Yii::app()->theme->baseUrl;?>/dist/img/loading.gif" /></h4>
              </div>
              <!-- /Cabecera -->
              <div class="alert alert-dismissable " id="message_add_Usuario" style="display: none;">
        </div>
              <div class="modal-body">
               
      <form id="agregarUsuarioForm" method="post"  class="form-horizontal"   onclick="UserCore.validar();" target="ClientePG" >                  
<div class="form-group">
<label class="col-md-4 control-label" for="add_Usuario">Usuario</label>
<div class="col-lg-7">
<input id="add_Usuario" name="add_Usuario" type="text" placeholder="" class="form-control input-md" value="">        
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="add_Empleado">Empleado</label>
<div class="col-lg-7">

  <select name="add_Empleado" id="add_Empleado" class="form-control input-md">
    <option value="">Seleccione Empleado</option>
  </select>
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="add_Rol">Rol</label>
<div class="col-lg-7">
  <select name="add_Rol" id="add_Rol" class="form-control input-md">
    <option value="">Seleccione Rol</option>
  </select>

</div>
</div>
 <div class="form-group">
<label class="col-md-4 control-label" for="add_Password">Nueva Contraseña</label>
<div class="col-lg-7">
<input id="add_Password" name="add_Password" type="password" placeholder="" class="form-control input-md" value="">        
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="add_confirmPassword">Repita la Contraseña</label>
<div class="col-lg-7">
<input id="add_confirmPassword" name="add_confirmPassword" type="password" placeholder="" class="form-control input-md" value="">        
</div>
</div>
   

   <div class="form-group">
    <label class="col-md-4 control-label" ></label>
                    <div class="col-md-7 ">
                      <button type="submit" class="btn btn-primary" style="width:100%;  margin-bottom: 10px;">Registrar</button>
                      <button   id="cerrarmodal" class="btn btn-danger"    data-dismiss="modal" rel="tooltip" title="Cerrar" style="width:100%;"
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
        UserCore.initListadoUsuarios();
    };
listarComboEntidad("personal","Empleado","add_Empleado");
listarComboEntidad("seguridad","admrol","add_Rol");
  $("#btnRestablecer").click(function() {
   UserCore.restableserPassword();
  });
</script>        