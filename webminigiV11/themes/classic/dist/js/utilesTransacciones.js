
  function obtenerNroFactura(){
         $.ajax({
        url: 'index.php?r=ventas/AjaxObtenerNroFactura',
        type: 'POST',        
    })
    .done(function(response) {   
     data=response.output;     
        //console.log(data.nroFact);

        $("#nroFactura").val(data.nroFact);
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    };

$(document).ready(function(){

obtenerNroFactura();
   
    
                                
        var consulta;
                                                                          
         //hacemos focus al campo de búsqueda
        $("#buscarProducto").focus();
                                                                                                    
        //comprobamos si se pulsa una tecla
        $("#buscarProducto").keyup(function(e){
                                     
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#buscarProducto").val();
                                                                           
              //hace la búsqueda
                                                                                  
              $.ajax({
                    type: "POST",
                    url: "index.php?r=almacen/AjaxBuscarProducto",
                    data: {
                        query:consulta
                    },
                    beforeSend: function(){
                          //imagen de carga
                          //$("#resultado").html("<p align='center'><img src='ajax-loader.gif' /></p>");
                    },
                    error: function(){
                          console.log('error');     
                    },
                    success: function(data){  
                    var html = "";

                $("#findProducto").find("option").remove();
                 
                $.each(data, function(index, value) {

                    html += '<option value="'+value.idProducto+'">'+value.desc_Prod+'</option>';
                });
                
                $("#findProducto").append(html);  

                          
                                                             
                    }
              });
                                                                                  
                                                                           
        });

$("#findProducto").click(function() {
    var idProducto=$(this).val();

    $.ajax({
        url: 'index.php?r=almacen/AjaxObtenerProducto',
        type: 'POST',        
        data: {idProducto:parseInt(idProducto)},
    })
    .done(function(response) {
         data=response.output;
         $("#fac_idProducto").val(data.idProducto);
         $("#fac_desc_Prod").val(data.desc_Prod);
         $("#fac_Precio").val(data.Precio);
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        //console.log("complete");
    });
    

});

$( '#fac_CantProd' ).click(function(){
    var cant=$( this ).val();
    var precio=$( "#fac_Precio" ).val();
    var total=(cant)*(precio);
 $( '#fac_valorVenta' ).val(total);
});

$( '#fac_CantProd' ).change(function(){
    var cant=$( this ).val();
    var precio=$( "#fac_Precio" ).val();
    var total=(cant)*(precio);
 $( '#fac_valorVenta' ).val(total);
});

$( '#fac_CantProd' ).keypress(function(){
    var cant=$( this ).val();
    var precio=$( "#fac_Precio" ).val();
    var total=(cant)*(precio);
 $( '#fac_valorVenta' ).val(parseFloat(total).toFixed(2));
});


                                                                   
});


$(document).ready(function() {
    $('#DetalleFactura').dataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false,
        "bFilter": false,
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                } );
               $("#subTotal").val(total);
               $("#igv").val(total*0.18);
               var igv= $("#igv").val();
               var subtotal=$("#subTotal").val();
               $("#Total").val(parseFloat(subtotal)+parseFloat(igv)); 
 
            // Total over this page
            pageTotal = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 4 ).footer() ).html(
                'S/.'+ total +''
            );
        }
    } );
} );

$(document).ready(function() {
   
    
 
        $('#addRow').on( 'click', function () {
        var id=$("#fac_idProducto").val();
        var desc=$("#fac_desc_Prod").val();
         var cant=$("#fac_CantProd").val();
        var pre= $("#fac_Precio").val();
        var val= $("#fac_valorVenta").val();


        $('#DetalleFactura').DataTable().row.add( [
           id,desc,cant,pre,val
        ] ).draw();
 
       
    } );

 /*$('#add_DetalleFact').click( function() {

 var table = $('#DetalleFactura').tableToJSON();
var nroSerie=$("#nroSerie").val();
  var nroFactura=$("#nroFactura").val();


$.ajax({
    url: 'index.php?r=ventas/AjaxAgregarDetalleFactura',
    type: 'Post',  
    data: {
            json:JSON.stringify(table),
            nroSerie:nroSerie,
            nroFact:nroFactura
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

});*/

 $('#add_Factura').click( function() {
  var nroSerie=$("#nroSerie").val();
  var nroFactura=$("#nroFactura").val();
  var idCliente=$("#idCliente").val();
  var idEmpleado=$("#idEmpleado").val();
  var subTotal=$("#subTotal").val();
  var IGV=$("#igv").val();
  var Total=$("#Total").val();

 
$.ajax({
    url: 'index.php?r=ventas/AjaxAgregarFactura',
    type: 'Post',  
    data: {
        nroSerie:nroSerie,
        nroFactura:nroFactura,
        idCliente:idCliente,
        idEmpleado:idEmpleado,
        subTotal:subTotal,
        IGV:IGV,
        Total:Total
    },
})
.done(function() {
    console.log("success");
})
.fail(function() {
    console.log("error");
})
.always(function() {
   var table = $('#DetalleFactura').tableToJSON();
var nroSerie=$("#nroSerie").val();
  var nroFactura=$("#nroFactura").val();


$.ajax({
    url: 'index.php?r=ventas/AjaxAgregarDetalleFactura',
    type: 'Post',  
    data: {
            json:JSON.stringify(table),
            nroSerie:nroSerie,
            nroFact:nroFactura
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
});

});  

 /*$('#add_DetalleFact').on( 'click', function () {
         var table = $('#DetalleFactura').DataTable();
        var info=table.page.info();
        //alert(info.end);



    } );*/

   
    var table = $('#DetalleFactura').DataTable();

   
$('#DetalleFactura tbody').on( 'click', 'td', function () {
    alert( 'Clicked on cell in visible column: '+table.cell( this ).index().columnVisible );
} );
    var table = $('#DetalleFactura').DataTable();


 
} );