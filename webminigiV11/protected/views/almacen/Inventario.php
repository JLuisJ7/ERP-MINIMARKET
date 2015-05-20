<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Modulo de Almacen';
// Titulo del modulo
$this->moduleTitle="Modulo de Almacen";
// Subtitulo del modulo
$this->moduleSubTitle="Inventario";
// Breadcrumbs
$this->breadcrumbs=array(
	'Inventario',
);?>
<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class='box-header with-border'>
                  <h3 class='box-title'><i class="fa fa-list-alt"></i> Inventario</h3>
                </div>
                <div class="box-body">
                  <table id="listaInventario" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <!--th style="vertical-align: middle;">#</th-->
                        <th style="vertical-align: middle;" ></th>
                        <th style="vertical-align: middle;" >Documento</th>
                        <th style="vertical-align: middle;" >Serie</th>
                        <th style="vertical-align: middle;" >Nro.</th>
                        <th style="vertical-align: middle;" >Fecha</th>
                        <th style="vertical-align: middle;" >Tipo</th>
                        <th style="vertical-align: middle;" >Producto</th>
                        <th style="vertical-align: middle;" >Cantidad</th>
                        <th style="vertical-align: middle;" >Precio</th>
                        <th style="vertical-align: middle;" >Importe</th>                      
                        
                      </tr>
                    </thead>                 
                  </table>


                </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
   <!-- Modal -->
       <script>
    window.onload=function(){
        InventCore.initListadoInventario();
    };



</script>