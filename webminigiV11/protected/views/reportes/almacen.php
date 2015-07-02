<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Reporte de Ventas';
// Titulo del modulo
$this->moduleTitle="Reportes";
// Subtitulo del modulo
$this->moduleSubTitle="Productos";
// Breadcrumbs
$this->breadcrumbs=array(
	'Productos',
);?>

<section class="content">
         
          <!--end contadores-->
          <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Entradas y Salidas por Producto</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->

  <div class="form-group">
            <label class="" for="ReportxProd">Producto: </label>
         
            <select id="ReportxProd" data-doc="Producto" class="selectpicker form-control" data-live-search="true" title="Seleccione Un Producto" style="display:none;">
              <option value="">Seleccione Producto</option>
            </select>

  </div>  
              

      

          
                </div><!-- /.box-body -->

              
              </div><!-- /.box -->
         


          <div class="row" style="display:none;">
              <!-- Donut chart -->
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <i class="fa fa-bar-chart-o"></i>
                  <h3 class="box-title">Line Chart</h3>                  
                </div>
                <div class="box-body">
               <div id="ContainerGrafic"><canvas id="grafico" style="width:0;"></canvas></div>
                </div><!-- /.box-body-->
              </div><!-- /.box -->
            </div>
          </div>

          <div class="row" style="display:none;">
              <!-- Donut chart -->
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <i class="fa fa-bar-chart-o"></i>
                  <h3 class="box-title">Line Chart</h3>                  
                </div>
                <div class="box-body">
               <div id="ContainerGraficLine"><canvas id="graficoLine" style="width:0;"></canvas></div>
                </div><!-- /.box-body-->
              </div><!-- /.box -->
            </div>
          </div>
          <div class="row" >
              <!-- Donut chart -->
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <i class="fa fa-bar-chart-o"></i>
                  <h3 class="box-title"></h3>                  
                </div>
                <div class="box-body">
               <div id="container" style=""></div>

                </div><!-- /.box-body-->
              </div><!-- /.box -->
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class='box-header with-border'>
                  <h3 class='box-title'><i class="fa fa-list-alt"></i> Inventario</h3>
                </div>
                <div class="box-body">
                  <table id="listaInventario" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <!--th style="vertical-align: middle;">#</th-->
                        <th style="vertical-align: middle;" >ID</th>
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



<script>
obtenerNroEntradaProd();
//obtenerNroSalidaProd();

 window.onload=function(){
        //FactCore.initReporteFacturas();
      
    };



</script>
 <script type="text/javascript">
      $(function () {
    
        $('#reservation').daterangepicker();
   

      });


$(document).ready(function() {
 

  $('button.applyBtn').click(function() {
    
  InventCore.InventarioEntreFechas($('input[name="daterangepicker_start"]').val(),$('input[name="daterangepicker_end"]').val());
  obtenerNroSalidaProd($('input[name="daterangepicker_start"]').val(),$('input[name="daterangepicker_end"]').val());
  obtenerNroEntradaProd($('input[name="daterangepicker_start"]').val(),$('input[name="daterangepicker_end"]').val());
   var Salida=$("#nroSalidaProd").text();
var Entrada= $("#nroEntradaProd").text();

  
  });



//-----------------

  $( "#ReportxProd" )
  .change(function () {
    var  idProducto=$("#ReportxProd").val();  
if(idProducto!=""){
  InventCore.InventarioEntreFechas(idProducto);
  obtenerTotal(idProducto);
}
   

  })
  .change();

});
    </script>

<script type="text/javascript">


    listarComboEntidad("almacen","Producto","ReportxProd");

    $(function () {
    
});
     
</script>

