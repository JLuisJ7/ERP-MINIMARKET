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

<script>
    window.onload=function(){
        UserCore.initListadoUsuarios();
    };
</script>        