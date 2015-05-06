<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Modulo de Seguridad';
// Titulo del modulo
$this->moduleTitle="Modulo de Seguridad";
// Subtitulo del modulo
$this->moduleSubTitle="Personas";
// Breadcrumbs
$this->breadcrumbs=array(
	'Personas',
);?>

<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class='box-header with-border'>
                  <h3 class='box-title'><i class="fa fa-user"></i> Listado de Personas</h3>
                </div>
                <div class="box-body">
                  <?php
                  $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'tablareporte',
                    'htmlOptions'=>array('class'=>'table-responsive'),
                    'itemsCssClass' => 'table table-empleados table-bordered table-hover',
                    'dataProvider'=>$empleados,
                    'summaryText'=>'Mostrando {start}-{end} de {page} Resultado(s)',
                    'emptyText'=>'No se encontraron registros para esta consulta...',
                    'columns'=>array(
                      array(
                           'name'=>'Nombres y Apellidos',
                           'value'=>'$data->des_nombres.\', \'.$data->des_apepat.\' \'.$data->des_apemat',
                       ),
                      array(
                           'name'=>'Fecha de Nacimiento',
                           'value'=>'date("d/m/Y", strtotime($data->fec_nacimiento))',
                       ),
                      array(
                           'name'=>'Nro. Documento',
                           'value'=>'$data->nro_documento',
                       ),
                      array(
                           'name'=>'Nro. Telefono',
                           'value'=>'$data->des_telefono',
                       ),
                      array(
                           'name'=>'Correo Electronico',
                           'value'=>'$data->des_correo',
                       ),
                      array(
                        'class'=>'CButtonColumn',
                        'template'=>'{visualizar}&nbsp;&nbsp;&nbsp;{editar}&nbsp;&nbsp;&nbsp;{eliminar}{activar}',
                        'buttons'=>array(
                            'visualizar' => array(
                                'label'=>'Ver más información',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/ver_16x16.png',
                                'options'=>array('data-toggle'=>'modal', 'data-target'=>'#myModalUsuario'),
                                //'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->ide_persona))',
                                'url'=>'$data->ide_persona',
                                //'click'=>"function(){levantaModal('$data->ide_persona');}",
                            ),
                            'editar' => array(
                                'label'=>'Editar Empleado',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/edit_16x16.png',
                                'options'=>array('class'=>'editarEmpleado', 'data-toggle'=>'modal', 'data-target'=>'#myModalEditarEmpleado'),
                                'url'=>'$data->ide_persona',
                                //'visible'=>'$data->ide_persona > 0',
                                //'click'=>'function(){var a= $data->ide_persona;}',
                                //'CHtml::normalizeUrl(array("midelete","id"=>$data->primarykey))',
                                //index.php?r=personal/ajaxObtenerEmpleado
                            ),
                            'eliminar' => array(
                                'label'=>'Eliminar Empleado',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/delete_16x16.png',
                                'options'=>array('class'=>'sis-eliminar'),
                                //'url'=>'$data->ide_persona',
                                'visible'=>'$data->ide_estado == 1',
                                //'click'=>'function(){alert("Going down!");}',
                            ),
                            'activar' => array(
                                'label'=>'Activar Empleado',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/ok_16x16.png',
                                'options'=>array('class'=>'sis-activar'),
                                //'url'=>'$data->ide_persona',
                                'visible'=>'$data->ide_estado == 0',
                                //'click'=>'function(){alert("Going down!");}',
                            ),
                        ),
                        'htmlOptions'=>array('style'=>'white-space:nowrap;text-align:center;'),
                      ),
                    ),
                    'pager'=>array(
                        'header'         => '',
                        'firstPageLabel' => '&lt;&lt;',
                        'prevPageLabel'  => 'Anterior',
                        'nextPageLabel'  => 'Siguiente',
                        'lastPageLabel'  => '&gt;&gt;',
                        // css class         
                        'firstPageCssClass'=>'pager_first',//default "first"
                        'lastPageCssClass'=>'pager_last',//default "last"
                        'previousPageCssClass'=>'pager_previous',//default "previours"
                        'nextPageCssClass'=>'pager_next',//default "next"
                        'internalPageCssClass'=>'pager_li',//default "page"
                        'selectedPageCssClass'=>'pager_selected_li',//default "selected"
                        'hiddenPageCssClass'=>'pager_hidden_li',//default "hidden" 
                        'htmlOptions'=>array(
                          'class'=>'pagination',
                          'style'=>'',
                          'id'=>'mypager_id'
                        ),
                    ),
                   ));
                   ?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        

        <!-- Modal -->
        <div class="modal fade" id="myModalEditarEmpleado" tabindex="-1" role="dialog" aria-labelledby="myModalEditarEmpleadoLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Cabecera -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#myModalEditarEmpleado').modal('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalEditarEmpleadoLabel">Modificar Empleado<img class="loading-small-precarga" style="display: none;" src="<?php echo Yii::app()->theme->baseUrl;?>/dist/img/loading.gif" /></h4>
              </div>
              <!-- /Cabecera -->
              <div class="modal-body">
                <form id="empleadoForm" method="post"  class="form-horizontal"   onclick="coreFn.validar();" target="empleadoPG" >
                  
                  <div class="form-group">
                    <label class="col-lg-4 control-label">Nombres:</label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" id="desNombres"   name="desNombres" placeholder="Nombres"  >
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-4 control-label">Documento:</label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" id="desDocumento"  name="desDocumento" placeholder="Documento"/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-4 control-label">Fecha de Nacimiento:</label>
                    <div class="col-lg-7">
                      <!--input type="text" class="form-control" id="desNombres"  name="desNombres" placeholder="Fecha de Nacimiento"/-->
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input name="fecNacimiento" id="fecNacimiento" type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                      </div><!-- /.input group -->
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-4 control-label">Teléfono:</label>
                    <div class="col-lg-7">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-phone"></i>
                        </div>
                        <input type="text" name="desTelefono" id="desTelefono" class="form-control" data-inputmask='"mask": "(99) 302-5902"' data-mask/>
                      </div><!-- /.input group -->
                      <!--input type="text" class="form-control" id="desApPaterno"  name="desApPaterno" placeholder="Tel&eacute;fono"/-->
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-4 control-label">Correo electrónico:</label>
                    <div class="col-lg-7">
                      <div class="input-group">
                        <span class="input-group-addon">@</span>
                        <input type="text" name="desCorreo" id="desCorreo" class="form-control" placeholder="Correo electronico">
                      </div>
                      <!--input type="text" class="form-control" id="desEmail" name="desEmail" placeholder="Correo electr&oacute;nico"/-->
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-4 control-label">Sexo:</label>
                    <div class="col-lg-7">
                      <div  class="controls">
                        <div class="btn-group" data-toggle="buttons" id="options"  >
                          <label class="btn btn-primary btn-success active">
                            <input type="radio" name="stSexo"  id="idsexomasculino" value="21" > Masculino
                          </label>
                          <label class="btn btn-primary btn-success">
                            <input type="radio" name="stSexo"  id="idsexofemenino" value="22" > Femenino
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-4 control-label">Estado civil:</label>
                    <div class="col-lg-7">
                      <select class="form-control" name="selEstadoCivil" id="selEstadoCivil"></select>
                    </div>
                  </div>

                  <input type="hidden" id="idSegusuario" name="idSegusuario" >
                  <div role="alert" hidden="false" id="mensaje-succes-usuario-div">
                    <span id="mensaje-succes-usuario"></span>
                  </div>

                  <div class="form-group">
                    <div class="col-md-5 col-md-offset-3">
                      <button type="submit" class="btn btn-primary">Registrar</button>
                      <button   id="cerrarmodal" class="btn btn-primary"    data-dismiss="modal" rel="tooltip" title="Cerrar"
                      >Cerrar</button>
                    </div>
                  </div>
                </form><!-- /# usuarioForm -->

                <iframe name="empleadoPG" style="display: none;"></iframe>

              </div><!-- /.modal-body -->

              <div class="alert alert-dismissable alert-danger" id="message_save_usuario" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" >x</button>
                <strong></strong>
              </div>

            </div><!-- /. modal-content -->
          </div><!-- /. modal-dialog-->

          <iframe name="saveGp" style="display: none;"></iframe>
        </div><!-- /#myModalEditarEmpleado -->


        <div class="modal fade" id="dialogUsuarioModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                  <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Eliminar Usuario</h4>
              </div>
              <div class="modal-body">
                <p>Estas seguro de eliminar el usuario?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary btnEliminar" id="btneliminar" value="" lang=""
                onclick="javascript:coreFn.confirmEliminarUsuario(this);">Si</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->