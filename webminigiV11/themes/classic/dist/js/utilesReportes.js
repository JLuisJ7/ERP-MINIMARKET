  function obtenerNroFacturas(){
  
         $.ajax({
        url: 'index.php?r=reportes/AjaxObtenerNroFacturasporDia',
        type: 'POST',
            
    })
    .done(function(response) {   
     data=response.output;     
        //console.log(data.nroComp);

        $("#nroFacturas").text(data.Facturas);
        
    })
    .fail(function() {
        //console.log("error");
    })
    .always(function() {
        //console.log("complete");
    });
 };

  function obtenerTotal(idProducto){
    $('#grafico').remove(); // this is my <canvas> element 
    $('#graficoLine').remove(); // this is my <canvas> element
  $('#ContainerGrafic').append('<canvas id="grafico"><canvas>');
 
  $('#ContainerGraficLine').append('<canvas id="graficoLine"><canvas>');

         $.ajax({
        url: 'index.php?r=reportes/AjaxTotalVentas',
        type: 'POST',
        data: {
            idProducto:idProducto
        }
            
    })
    .done(function(valores) {   
        console.log(valores);
        
                            
                            var M = eval(valores);
                           
                                
                           var  Datos = {
                                    labels : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                                    datasets : [

                                        {
                                            label: "Ventas",
                                            fillColor : 'rgba(0, 192, 239, 1)', //COLOR DE LAS BARRAS
                                            strokeColor : '#3c8dbc', //COLOR DEL BORDE DE LAS BARRAS
                                            highlightFill : '#3BA9C3', //COLOR "HOVER" DE LAS BARRAS
                                            highlightStroke : 'rgba(66,196,157,0.7)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
                                            data : [
                                                M.V[1],M.V[2],M.V[3],M.V[4],M.V[5],M.V[6],M.V[7],M.V[8],M.V[9],M.V[10],M.V[11],M.V[12]
                                            ]
                                        },
                                        {
                                            label: "Compras",
                                            fillColor : 'rgba(91,228,146,0.6)', //COLOR DE LAS BARRAS
                                            strokeColor : 'rgba(57,194,112,0.7)', //COLOR DEL BORDE DE LAS BARRAS
                                            highlightFill : 'rgba(73,206,180,0.6)', //COLOR "HOVER" DE LAS BARRAS
                                            highlightStroke : 'rgba(66,196,157,0.7)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
                                            data : [
                                                    M.C[1],M.C[2],M.C[3],M.C[4],M.C[5],M.C[6],M.C[7],M.C[8],M.C[9],M.C[10],M.C[11],M.C[12]
                                            ]
                                        }
                                    ],
                                }
                                
                            var contexto = document.getElementById('grafico').getContext('2d');
                            var Barra = new Chart(contexto).Bar(Datos, { 
                                responsive : true
                                 });  

                            var data = {
     labels : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    datasets: [
        {
            label: "Salidas",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
             data : [
                                                M.V[1],M.V[2],M.V[3],M.V[4],M.V[5],M.V[6],M.V[7],M.V[8],M.V[9],M.V[10],M.V[11],M.V[12]
                                            ]
        },
        {
            label: "Entradas",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data : [
                                                    M.C[1],M.C[2],M.C[3],M.C[4],M.C[5],M.C[6],M.C[7],M.C[8],M.C[9],M.C[10],M.C[11],M.C[12]
                                            ]
        }
    ]
};
var ctx = document.getElementById('graficoLine').getContext('2d');
var myLineChart = new Chart(ctx).Line(data, { 
                                responsive : true
                                 });

$('#container').highcharts({
        title: {
            text: 'Flujo de Inventario por Producto',
            x: -20 //center
        },
        /*subtitle: {
            text: 'Source: WorldClimate.com',
            x: -20
        },*/
        xAxis: {
            categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
        },
        yAxis: {
            title: {
                text: ''
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Productos'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Salidas',
            data: [M.V[1],M.V[2],M.V[3],M.V[4],M.V[5],M.V[6],M.V[7],M.V[8],M.V[9],M.V[10],M.V[11],M.V[12]]
        }, {
            name: 'Entradas',
            data: [  M.C[1],M.C[2],M.C[3],M.C[4],M.C[5],M.C[6],M.C[7],M.C[8],M.C[9],M.C[10],M.C[11],M.C[12]]
        }]
    });
       
    })
    .fail(function() {
        //console.log("error");
    })
    .always(function() {
        //console.log("complete");
    });
 };

 function obtenerGraficFacturasAnio(){
 

         $.ajax({
        url: 'index.php?r=reportes/AjaxTotalFacturasAnio',
        type: 'POST',
        
            
    })
    .done(function(valores) {   
        console.log(valores);
        
                            
                            var M = eval(valores);
                          
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container',
            type: 'column',
            margin: 75,
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }
        },
        title: {
            text: 'Total ventas por meses'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
        },
        tooltip: {
            valueSuffix: ' '
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        series: [{
            name: 'Monto Vendido',
            data: [M.V[1],M.V[2],M.V[3],M.V[4],M.V[5],M.V[6],M.V[7],M.V[8],M.V[9],M.V[10],M.V[11],M.V[12]]
        }]
    });

    function showValues() {
        $('#R0-value').html(chart.options.chart.options3d.alpha);
        $('#R1-value').html(chart.options.chart.options3d.beta);
    }

    // Activate the sliders
    $('#R0').on('change', function () {
        chart.options.chart.options3d.alpha = this.value;
        showValues();
        chart.redraw(false);
    });
    $('#R1').on('change', function () {
        chart.options.chart.options3d.beta = this.value;
        showValues();
        chart.redraw(false);
    });

    showValues();


    })
    .fail(function() {
        //console.log("error");
    })
    .always(function() {
        //console.log("complete");
    });
 };

 function obtenerGraficOrdenes(){
 

         $.ajax({
        url: 'index.php?r=reportes/AjaxTotalOrdenes',
        type: 'POST',
        
            
    })
    .done(function(valores) {   
        console.log(valores);
        
                            
                            var M = eval(valores);
                          
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container',
            type: 'column',
            margin: 75,
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }
        },
        title: {
            text: 'Total Compras por meses'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
        },
        tooltip: {
            valueSuffix: ' '
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        series: [{
            name: 'Monto Comprado',
            data: [M.C[1],M.C[2],M.C[3],M.C[4],M.C[5],M.C[6],M.C[7],M.C[8],M.C[9],M.C[10],M.C[11],M.C[12]]
        }]
    });

    function showValues() {
        $('#R0-value').html(chart.options.chart.options3d.alpha);
        $('#R1-value').html(chart.options.chart.options3d.beta);
    }

    // Activate the sliders
    $('#R0').on('change', function () {
        chart.options.chart.options3d.alpha = this.value;
        showValues();
        chart.redraw(false);
    });
    $('#R1').on('change', function () {
        chart.options.chart.options3d.beta = this.value;
        showValues();
        chart.redraw(false);
    });

    showValues();


    })
    .fail(function() {
        //console.log("error");
    })
    .always(function() {
        //console.log("complete");
    });
 };


/*
   function obtenerNroEntradaProd(){
  
         $.ajax({
        url: 'index.php?r=reportes/AjaxObtenerNroEntradaProductos',
        type: 'POST',
            
    })
    .done(function(response) {   
     data=response.output;     
        //console.log(data.nroComp);

        $("#nroEntradaProd").text(data.Entrada);
        
    })
    .fail(function() {
        //console.log("error");
    })
    .always(function() {
        //console.log("complete");
    });
 };
*/
  function obtenerNroEntradaProd(inicio,fin){
  
         $.ajax({
        url: 'index.php?r=reportes/AjaxObtenerNroEntradaProductos',
        type: 'POST',
         data: {
            inicio: inicio,
            fin:fin
        },    
    })
    .done(function(response) {   
     data=response.output;     
        //console.log(data.nroComp);
if(data.Entrada==null){
            $("#nroEntradaProd").text(0);
        }else{
           $("#nroEntradaProd").text(data.Entrada);
        }
        
    })
    .fail(function() {
        //console.log("error");
    })
    .always(function() {
        //console.log("complete");
    });
 };
    function obtenerNroSalidaProd(inicio,fin){
  
         $.ajax({
        url: 'index.php?r=reportes/AjaxObtenerNroSalidaProductos',
        type: 'POST',
        data: {
            inicio: inicio,
            fin:fin
        },
            
    })
    .done(function(response) {   
     data=response.output;     
        //console.log(data.nroComp);
        if(data.Salida==null){
            $("#nroSalidaProd").text(0);
        }else{
            $("#nroSalidaProd").text(data.Salida);
        }
        
        
    })
    .fail(function() {
        //console.log("error");
    })
    .always(function() {
        //console.log("complete");
    });
 };




   function obtenerNroClientes(){
  
         $.ajax({
        url: 'index.php?r=reportes/AjaxObtenerNroClientes',
        type: 'POST',
            
    })
    .done(function(response) {   
     data=response.output;     
        console.log(data);

        $("#nroClientesReg").text(data.Clientes);
        
    })
    .fail(function() {
        //console.log("error");
    })
    .always(function() {
        //console.log("complete");
    });
 };

 function FacturasEntreFechas(inicio,fin){
    $.ajax({
        url: 'index.php?r=reportes/AjaxObtenerFacturasEntreFechas',
        type: 'POST',
       
        data: {
            inicio: inicio,
            fin:fin
        },
    })
    .done(function() {
        console.log("success");
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    
 }




 function obtenerGraficOrdenesAnio(idProveedor){
 

         $.ajax({
        url: 'index.php?r=reportes/AjaxTotalOrdenesAnio',
        type: 'POST',
        data:{
            idProveedor:idProveedor
        }
            
    })
    .done(function(valores) {   
        console.log(valores);
        
                            
                            var M = eval(valores);
                          
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container',
            type: 'column',
            margin: 75,
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }
        },
        title: {
            text: 'Total Compras al mes por Proveedor'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
        },
        tooltip: {
            valueSuffix: ' '
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        series: [{
            name: 'Monto Comprado',
            data: [M.C[1],M.C[2],M.C[3],M.C[4],M.C[5],M.C[6],M.C[7],M.C[8],M.C[9],M.C[10],M.C[11],M.C[12]]
        }]
    });

    function showValues() {
        $('#R0-value').html(chart.options.chart.options3d.alpha);
        $('#R1-value').html(chart.options.chart.options3d.beta);
    }

    // Activate the sliders
    $('#R0').on('change', function () {
        chart.options.chart.options3d.alpha = this.value;
        showValues();
        chart.redraw(false);
    });
    $('#R1').on('change', function () {
        chart.options.chart.options3d.beta = this.value;
        showValues();
        chart.redraw(false);
    });

    showValues();


    })
    .fail(function() {
        //console.log("error");
    })
    .always(function() {
        //console.log("complete");
    });
 };
