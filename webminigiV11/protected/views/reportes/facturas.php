<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Reporte de Ventas';
// Titulo del modulo
$this->moduleTitle="Reportes";
// Subtitulo del modulo
$this->moduleSubTitle="Ventas";
// Breadcrumbs
$this->breadcrumbs=array(
	'Ventas',
);?>

<section class="content">
          
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
          <!--end contadores-->
          <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Facturas por Fechas</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <div class="form-group">
                    <label>Rango de Fechas:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="reservation"/>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

                </div><!-- /.box-body -->

              
              </div><!-- /.box -->
         
</section><!-- /.content -->

<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class='box-header with-border'>
                  <h3 class='box-title'><i class="fa fa-credit-card"></i> Listado de Facturas</h3>
                </div>
                <div class="box-body">
                  <table id="listaFacturas" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>                        
                        <th style="vertical-align: middle;" >Serie</th>
                        <th style="vertical-align: middle;" >Nro.</th>
                        <th style="vertical-align: middle;" >Cliente</th>
                        <!-- <th style="vertical-align: middle;" >Empleado</th> -->
                        <th style="vertical-align: middle;" >Fecha</th>
                        <th style="vertical-align: middle;" >Subtotal</th>
                        <th style="vertical-align: middle;" >IGV</th>
                        <th style="vertical-align: middle;" >Total</th>
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
    <div class="modal fade" id="myModalFacturaDetallada" tabindex="-1" role="dialog" aria-labelledby="myModalFacturaDetalladaLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Cabecera -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#myModalFacturaDetallada').modal('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalFacturaDetalladaLabel">Detalle de la Factura : <b><span id="serie-factura"></span></b><img class="loading-small-precarga" style="display: none;" src="<?php echo Yii::app()->theme->baseUrl;?>/dist/img/loading.gif" /></h4>
              </div>
              
              <div class="modal-body" style="background-color:#fff;">
                
        <table  class="table table-striped table-bordered" cellspacing="0" width="100%" id="FacturaDetallada" style="">
                <thead>
                  <tr>
                    <!--th style="vertical-align: middle;">#</th-->
                    <!-- <th style="vertical-align: middle;" >Codigo</th> -->
                    <th style="vertical-align: middle;" >Descripcion</th>
                    <th style="vertical-align: middle;" >Cantidad</th>
                    <th style="vertical-align: middle;" >Precio</th>
                    <th style="vertical-align: middle;" >Importe</th>                                  
                  </tr>
                </thead>
             </table>
             
              

              </div><!-- /.modal-body -->             

            </div><!-- /. modal-content -->
          </div><!-- /. modal-dialog-->          
        </div><!-- /#myModalEditarCliente --> 



<script>
obtenerNroFacturas();
obtenerNroClientes();
 window.onload=function(){
        //FactCore.initReporteFacturas();
      
    };
obtenerGraficFacturasAnio()


</script>
 <script type="text/javascript">
      $(function () {
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                  ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                  },
                  startDate: moment().subtract('days', 29),
                  endDate: moment()
                },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        //$(".my-colorpicker1").colorpicker();
        //color picker with addon
        //$(".my-colorpicker2").colorpicker();

        //Timepicker
        /*$(".timepicker").timepicker({
          showInputs: false
        });*/
      });


$(document).ready(function() {
 

  $('button.applyBtn').click(function() {
    
  FactCore.FacturaEntreFechas($('input[name="daterangepicker_start"]').val(),$('input[name="daterangepicker_end"]').val());
  });

 

});
    </script>


