var Util = {
    createGrid: function(id, options) {        
        var toolButons = options.toolButons || '';
        var extraOptions = options.extraOptions || {};
        
        var configGrid = {
            "destroy": true,
            "language": {
                "loadingRecords": '<img src="images/profile-loading.gif">',
                "zeroRecords": "No se Encontraron Resultados",
                paginate: {
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "search": "",
                searchPlaceholder: 'Buscar..',
                "info": '<div style="margin:0px 0px 0px 0px;">Mostrando p&aacute;gina _PAGE_ de _PAGES_</div>',
                "infoEmpty": "No se encontraron resultados",
                "lengthMenu": '<div> ' + toolButons +
                '<select id="selPagination" style="display:inline-block;margin-top:0px;margin-left:5px;padding:6px;border:1px #E1E1E1 solid;">' +
                '<option value="6">6</option>' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="40">40</option>' +
                '<option value="50">50</option>' +
                '<option value="-1">All</option>' +
                '</select> </div>'
            },
            "ajax": {
                "url": options.url,
                "dataSrc": ""
            },
            "fnDrawCallback": options.fnDrawCallback || function(oSettings) {

            },
            "aoColumns": options.columns
        };

        $.extend(configGrid, extraOptions);

        var datatable = $(id).dataTable(configGrid);

        $(id + ' tbody').on('click', 'tr', function() {

            $('.selectedRowTable').each(function() {
                $(this).removeClass('selectedRowTable');
            });

            $(this).find('td').addClass('selectedRowTable');

        });
        
        return datatable;
    }
};
/*
    INICIO InventCore
*/
var InventCore = {

    loadInventario: function(){
        var me = this;
        
        Util.createGrid('#listaInventario',{
            toolButons:'',
            url:'index.php?r=almacen/ajaxListadoInventario',
            //"order": [[ 0, 'desc' ]],
            columns:[
               
                {"mData": "idMovimiento", "sClass": "alignCenter"},
                {"mData": "documento", "sClass": "alignCenter"},
                {"mData": "serie", "sClass": "alignCenter"},
                {"mData": "nro_documento", "sClass": "alignCenter"},
                {"mData": "fecha", "sClass": "alignCenter"},
                {"mData": "Tipo", "sClass": "alignCenter"},                
                {"mData": "producto", "sClass": "alignCenter"},

                //{"mData": "cantidad", "sClass": "alignCenter"},
                {
                    "mData": null,
                    "bSortable": false,
                    "bFilterable": false,
                     "mRender": function (data, type, row) {
                  if(data.Tipo=='Salida'){
                        return '<i class="fa fa-arrow-down text-danger"></i> <strong class="text-danger ">' + data.cantidad + '</strong>';
                  }else if(data.Tipo=='Entrada'){
                    return '<i class="fa fa-arrow-up text-primary"></i> <strong class="text-primary "> ' + data.cantidad + '</strong>';
                  }
                  
                }
                },

                {"mData": "valor_unitario", "sClass": "alignCenter"},
                {"mData": "total", "sClass": "alignCenter"}
            ]

        });
    },
    initListadoInventario: function() {       
        
        this.loadInventario();

    }

}




var OrdenCore = {

    loadOrdenesC: function(){
        var me = this;
        
        Util.createGrid('#listaOrdenesC',{
            toolButons:'<a style="display:inline-block;margin:-1px 0px 0px 0px;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalNuevoOrdendeCompra">Nuevo Orden de Compra</a>',
            url:'index.php?r=compras/ajaxListadoOrdenesC',
            "order": [[ 0, 'asc' ]],

            columns:[
               
                {"mData": "nroSerie", "sClass": "alignCenter"},
                {"mData": "nroOrden", "sClass": "alignCenter"},
                {"mData": "Proveedor", "sClass": "alignCenter"},
                //{"mData": "Empleado", "sClass": "alignCenter"},                
                {"mData": "Fecha", "sClass": "alignCenter"},
                {"mData": "subTotal", "sClass": "alignCenter"},
                {"mData": "IGV", "sClass": "alignCenter"},
                {"mData": "Total", "sClass": "alignCenter"},
               
                {
                    "mData": null,
                    "bSortable": false,
                    "bFilterable": false,
                     "mRender": function (data, type, row) {
                  /*return row.nroSerie +', '+ row.nroFact;*/
                  return '<a href="#" style="margin-left:5px;margin-right:0px" data-nroSerie="' + row.nroSerie + '" data-nroOrden="' + row.nroOrden + '" class="btn btn-default btn-sm verDetalle"><i class="fa fa-eye"></i> Ver Detalle</a> ';
                }
                }
            ],
            fnDrawCallback: function() {
                
                $('.verDetalle').click(function() {
                    me.obtenerDetalle($(this).attr('data-nroSerie'),$(this).attr('data-nroOrden'));
                    
                });

            }

        });
    },    
    obtenerDetalle : function(nroSerie,nroOrden){
        $("#serie-OrdenC").text(nroSerie+'-'+nroOrden);
        $.ajax({
            url: 'index.php?r=compras/AjaxObtenerDetalle',
            type: 'POST',            
            data: {
                nroSerie: nroSerie,
                nroOrden:nroOrden
            },
        })
        .done(function(response) {
            
                
            console.log(response);
             var table = $('#OrdenCDetallada').DataTable( {
                "paging":   false,
        "ordering": false,
        "info":     false,
        "bFilter": false,
        "data": response,

                "columns": [
                   
                    { "data": "desc_Prod" },
                    { "data": "cantidad" },
                    { "data": "precio" },
                    { "data": "importe" }
                ]               
            } );
            
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
           $('#myModalOrdenCDetallada').modal('show');
        });
        
    },
    initListadoOrdenesC: function() {       
         $('#myModalOrdenCDetallada').on('hidden.bs.modal', function() {
         var table = $('#OrdenCDetallada').DataTable();
 
            
            table.destroy();
                     
        });
        this.loadOrdenesC();

    }

}
var FactCore = {

    loadFacturas: function(){
        var me = this;
        
        Util.createGrid('#listaFacturas',{
            toolButons:'<a style="display:inline-block;margin:-1px 0px 0px 0px;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalNuevoFactura">Nuevo Factura</a>',
            url:'index.php?r=ventas/ajaxListadoFacturas',
            "order": [[ 0, 'asc' ]],

            columns:[
               
                {"mData": "nroSerie", "sClass": "alignCenter"},
                {"mData": "nroFact", "sClass": "alignCenter"},
                {"mData": "Cliente", "sClass": "alignCenter"},
                //{"mData": "Empleado", "sClass": "alignCenter"},                
                {"mData": "Fecha", "sClass": "alignCenter"},
                {"mData": "SubTotal", "sClass": "alignCenter"},
                {"mData": "IGV", "sClass": "alignCenter"},
                {"mData": "Total", "sClass": "alignCenter"},
               
                {
                    "mData": null,
                    "bSortable": false,
                    "bFilterable": false,
                     "mRender": function (data, type, row) {
                  /*return row.nroSerie +', '+ row.nroFact;*/
                  return '<a href="#" style="margin-left:5px;margin-right:0px" data-nroSerie="' + row.nroSerie + '" data-nroFact="' + row.nroFact + '" class="btn btn-default btn-sm verDetalle"><i class="fa fa-eye"></i> Ver Detalle</a> ';
                }
                }
            ],
            fnDrawCallback: function() {
                
                $('.verDetalle').click(function() {
                    me.obtenerDetalle($(this).attr('data-nroSerie'),$(this).attr('data-nroFact'));
                });

            }

        });
    },    
    obtenerDetalle : function(nroSerie,nroFact){
        $("#serie-factura").text(nroSerie+'-'+nroFact);

        $.ajax({
            url: 'index.php?r=ventas/AjaxObtenerDetalle',
            type: 'POST',            
            data: {
                nroSerie: nroSerie,
                nroFact:nroFact
            },
        })
        .done(function(response) {
            
                
            console.log(response);
             var table = $('#FacturaDetallada').DataTable( {
                "paging":   false,
        "ordering": false,
        "info":     false,
        "bFilter": false,
        "data": response,

                "columns": [
                   
                    { "data": "desc_Prod" },
                    { "data": "cantidad" },
                    { "data": "precio" },
                    { "data": "importe" }
                ]               
            } );
            
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
           $('#myModalFacturaDetallada').modal('show');
        });
        
    },
    initListadoFacturas: function() {       
         $('#myModalFacturaDetallada').on('hidden.bs.modal', function() {
         var table = $('#FacturaDetallada').DataTable();
 
            
            table.destroy();
                     
        });
        this.loadFacturas();

    }

}
var BoletCore = {

    loadBoletas: function(){
        var me = this;
        
        Util.createGrid('#listaBoletas',{
            toolButons:'<a style="display:inline-block;margin:-1px 0px 0px 0px;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalNuevoBoleta">Nuevo Boleta</a>',
            url:'index.php?r=ventas/ajaxListadoBoletas',
            "order": [[ 0, 'asc' ]],

            columns:[
               
                {"mData": "nroSerie", "sClass": "alignCenter"},
                {"mData": "nroBol", "sClass": "alignCenter"},
                {"mData": "Cliente", "sClass": "alignCenter"},
                //{"mData": "Empleado", "sClass": "alignCenter"},                
                {"mData": "Fecha", "sClass": "alignCenter"},                
                {"mData": "Total", "sClass": "alignCenter"},
               
                {
                    "mData": null,
                    "bSortable": false,
                    "bFilterable": false,
                     "mRender": function (data, type, row) {
                  /*return row.nroSerie +', '+ row.nroFact;*/
                  return '<a href="#" style="margin-left:5px;margin-right:0px" data-nroSerie="' + row.nroSerie + '" data-nroBol="' + row.nroBol + '" class="btn btn-default btn-sm verDetalle"><i class="fa fa-eye"></i> Ver Detalle</a> ';
                }
                }
            ],
            fnDrawCallback: function() {
                
                $('.verDetalle').click(function() {
                    me.obtenerDetalle($(this).attr('data-nroSerie'),$(this).attr('data-nroBol'));
                });

            }

        });
    },    
    obtenerDetalle : function(nroSerie,nroBol){
        $("#serie-Boleta").text(nroSerie+'-'+nroBol);

        $.ajax({
            url: 'index.php?r=ventas/AjaxObtenerDetalleBoleta',
            type: 'POST',            
            data: {
                nroSerie: nroSerie,
                nroBol:nroBol
            },
        })
        .done(function(response) {
            
                
            console.log(response);
             var table = $('#FacturaDetallada').DataTable( {
                "paging":   false,
        "ordering": false,
        "info":     false,
        "bFilter": false,
        "data": response,

                "columns": [
                   
                    { "data": "desc_Prod" },
                    { "data": "cantidad" },
                    { "data": "precio" },
                    { "data": "importe" }
                ]               
            } );
            
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
           $('#myModalFacturaDetallada').modal('show');
        });
        
    },
    initListadoBoletas: function() {       
         $('#myModalFacturaDetallada').on('hidden.bs.modal', function() {
         var table = $('#FacturaDetallada').DataTable();
 
            
            table.destroy();
                     
        });
        this.loadBoletas();

    }

}
/*
    INICIO ProvCore
*/
var ProvCore = {
    closeWin: function(id) {

        $('#' + id).modal('hide');

    },

    validarEditarProveedor: function(){
        //console.log("VAMOS A VALIDAR");
        var me = this;
        $(".inputNumero").keypress(function(e) {
            if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });
        $('#updateProveedorForm')
        .bootstrapValidator(
                {
                    message : 'El valor ingresado no es valido',
                    feedbackIcons : {
                        valid : 'glyphicon glyphicon-ok',
                        invalid : 'glyphicon glyphicon-remove',
                        validating : 'glyphicon glyphicon-refresh'
                    },
                    fields : {
                        RazSoc_Prov : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar la Razon Social o el Nombre del Proveedor'
                                }
                            }
                        },
                        tipoPersona_Prov : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe Seleccionar el Tipo de Persona'
                                }
                            }
                        },
                        ruc_Prov : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el Nro de RUC'
                                }
                            }
                        },
                        direccion_Prov : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar la Dirección'
                                }
                            }
                        },
                        telefono_Prov : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el telefono'
                                }
                            }
                        },
                        email_Prov : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el email del Proveedor'
                                }
                            }
                        }
                    },
                    submitHandler : function(form) {
                    var idProveedor=$("#edit_idProveedor").val();
                    var RazSoc_Prov=$("#edit_RazSoc_Prov").val();
                    var tipoPersona_Prov=$("#edit_tipoPersona_Prov").val();
                    var ruc_Prov=$("#edit_ruc_Prov").val();
                    var direccion_Prov=$("#edit_direccion_Prov").val();
                    var telefono_Prov=$("#edit_telefono_Prov").val();
                    var email_Prov=$("#edit_email_Prov").val();
                  
                        if($("#edit_estado_Prov").is(':checked')) {
                            estado_Prov=1;
                        } else {
                            estado_Prov=0;
                        }                     
                                       
                       $.ajax({
                            type: "POST",
                            url: 'index.php?r=compras/AjaxEditarProveedor',
                            data: {
                                idProveedor  :idProveedor,
                                RazSoc_Prov:RazSoc_Prov,
                                tipoPersona_Prov:tipoPersona_Prov,
                                ruc_Prov:ruc_Prov,
                                direccion_Prov:direccion_Prov,
                                telefono_Prov:telefono_Prov,
                                email_Prov:email_Prov,
                                estado_Prov:estado_Prov
                            },
                            success: function(response) {
                                if (response.success) {
                                     me.loadListadoProveedores();
                                    me.closeWin('myModalEditarProveedor');                                   
                                } else {
                                    //$('#message_save_acta').find('strong').html(response.message);
                                    //$('#message_save_acta').show('fade');

                                }
                            }
                        });



                    }
                });

    },
    obtenerProveedor: function(idProveedor){
        $.ajax({
            url: 'index.php?r=compras/AjaxObtenerProveedor',
            type: 'POST',            
            data: {idProveedor: idProveedor},
        })
        .done(function(response) {
            data=response.output;
                $("#edit_idProveedor").val(data.idProveedor);
                $("#edit_RazSoc_Prov").val(data.RazSoc_Prov);                
                $("#edit_tipoPersona_Prov option[value='"+data.tipoPersona_Prov+"']").attr('selected','selected');
                $("#edit_ruc_Prov").val(data.ruc_Prov);
                $("#edit_direccion_Prov").val(data.direccion_Prov);
                $("#edit_telefono_Prov").val(data.telefono_Prov);
                $("#edit_email_Prov").val(data.email_Prov);
                if(data.estado_Prov==1){
                    $("#edit_estado_Prov").prop('checked', true);
                    $('#edit_textEstado').text('Activo en el Sistema');
                }else{
                    $("#edit_estado_Prov").prop('checked', false);
                    $('#edit_textEstado').text('inactivo en el Sistema');
                }

            
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
           $('#myModalEditarProveedor').modal('show');
        });
        
    },
     confirmSuspenderProveedor: function(idProveedor){
        var me = this;
        bootbox.dialog({
            message: "Confirme la acción de Suspender Proveedor.",
            title: "¿Seguro de Suspender al Proveedor?",
            buttons: {
                main: {
                    label: "Si",
                    className: "btn-success",
                    callback: function() {
                        console.log('Suspendiendo Proveedor');

                        $.ajax({
                            type: "POST",
                            url: 'index.php?r=compras/AjaxActualizarEstadoProveedor',
                            data: {idProveedor: idProveedor,estado_Prov:0},
                            success: function(response) {
                                console.log(response);
                                if (response.success) {
                                    me.loadListadoProveedores();
                                    bootbox.hideAll();
                                }
                            }
                        });

                        return false;
                    }
                },
                danger: {
                    label: "No",
                    className: "btn-danger",
                    callback: function() {
                        // bootbox.hideAll();
                    }
                }
            }
        });
    },
     validar: function(){
        //console.log("VAMOS A VALIDAR");
        var me = this;
        $(".inputNumero").keypress(function(e) {
            if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });

        $('#mensaje-succes-usuario-div').removeAttr('style');
        $('#ProveedorForm')
        .bootstrapValidator(
                {
                    message : 'El valor ingresado no es valido',
                    feedbackIcons : {
                        valid : 'glyphicon glyphicon-ok',
                        invalid : 'glyphicon glyphicon-remove',
                        validating : 'glyphicon glyphicon-refresh'
                    },
                    fields : {
                        RazSoc_Prov : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar la Razon Social o el Nombre del Proveedor'
                                }
                            }
                        },
                        tipoPersona_Prov : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe Seleccionar el Tipo de Persona'
                                }
                            }
                        },
                        ruc_Prov : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el Nro de RUC'
                                }
                            }
                        },
                        direccion_Prov : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar la Dirección'
                                }
                            }
                        },
                        telefono_Prov : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el telefono'
                                }
                            }
                        },
                        email_Prov : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el email del Proveedor'
                                }
                            }
                        }
                    },
                    submitHandler : function(form) {

                    var RazSoc_Prov=$("#RazSoc_Prov").val();
                    var tipoPersona_Prov=$("#tipoPersona_Prov").val();
                    var ruc_Prov=$("#ruc_Prov").val();
                    var direccion_Prov=$("#direccion_Prov").val();
                    var telefono_Prov=$("#telefono_Prov").val();
                    var email_Prov=$("#email_Prov").val();
                  
                       
                       $.ajax({
                            type: "POST",
                            url: 'index.php?r=compras/AjaxAgregarProveedor',
                            data: {
                                RazSoc_Prov:RazSoc_Prov,
                                tipoPersona_Prov:tipoPersona_Prov,
                                ruc_Prov:ruc_Prov,
                                direccion_Prov:direccion_Prov,
                                telefono_Prov:telefono_Prov,
                                email_Prov:email_Prov
                            },
                            success: function(response) {
                                if (response.success) {
                                     me.loadListadoProveedores();
                                    me.closeWin('myModalNuevoProveedor');                                   
                                } else {
                                    //$('#message_save_acta').find('strong').html(response.message);
                                    //$('#message_save_acta').show('fade');

                                }
                            }
                        });



                    }
                });

    },
    loadListadoProveedores: function(){
        var me = this;
        
        Util.createGrid('#listaProveedores',{
            toolButons:'<a style="display:inline-block;margin:-1px 0px 0px 0px;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalNuevoProveedor">Nuevo Proveedor</a>',
            url:'index.php?r=Compras/ajaxListadoProveedores',
            columns:[
                {"mData": "RazSoc_Prov", "sClass": "alignCenter"},
                //{"mData": "tipoPersona_Prov", "sClass": "alignCenter"},
                {"mData": "ruc_Prov", "sClass": "alignCenter"},
                /*{
                    "mData": "fec_reg_Prov", 
                    "mRender": function(o){
                        var f = new Date(o);
                        var dia = (f.getDate()<10 ? "0"+f.getDate() : f.getDate());
                        var mes = ((f.getMonth()+1)<10 ? "0"+f.getMonth() : f.getMonth());

                        return dia+"/"+mes+"/"+f.getFullYear();
                    }
                },*/
                {"mData": "direccion_Prov", "sClass": "alignCenter"},
                {"mData": "telefono_Prov", "sClass": "alignCenter"},
                {"mData": "email_Prov", "sClass": "alignCenter"},
                {
                    "mData": 'idProveedor',
                    "bSortable": false,
                    "bFilterable": false,
                    //"width": "auto",
                    "mRender": function(o) {
                        return '<a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-warning btn-sm editarProveedor"><i class="fa fa-pencil"></i></a> <a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-danger btn-sm suspenderProveedor"><i class="fa fa-trash-o"></i></a>';
                    }
                }
            ],
            fnDrawCallback: function() {
                $('.suspenderProveedor').click(function() {
                    me.confirmSuspenderProveedor($(this).attr('lang'));
                });
                $('.editarProveedor').click(function() {
                    me.obtenerProveedor($(this).attr('lang'));
                    
                });

            }
        });
    },
    initListadoProveedores: function() {       
          $('#myModalNuevoProveedor').on('hidden.bs.modal', function() {
         
             $('#ProveedorForm').bootstrapValidator('resetForm', true);            
        });
         $('#myModalEditarProveedor').on('hidden.bs.modal', function() {
         
             $('#updateProveedorForm').bootstrapValidator('resetForm', true);            
        });

        this.loadListadoProveedores();

    }

}

var UserCore = {

    loadUsuarios: function(){
        var me = this;
        
        Util.createGrid('#listaUsuarios',{
            /*toolButons:'<a style="display:inline-block;margin:-1px 0px 0px 0px;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalNuevoUsuario">Agregar Usuario</a>', */           
            url:'index.php?r=seguridad/ajaxListadoUsuarios',
            //"order": [[ 0, 'desc' ]],
            columns:[
               
                {"mData": "Empleado", "sClass": "alignCenter"},
                {"mData": "Usuario", "sClass": "alignCenter"},
                {"mData": "Rol", "sClass": "alignCenter"},
                {
                    "mData": null,
                    "bSortable": false,
                    "bFilterable": false,
                     "mRender": function (data, type, row) {
                  if(data.estado==1){
return '<a href="#" style="margin-left:5px;margin-right:0px" lang="' + data.ide_usuario + '" class="btn btn-default btn-sm ActualizarRol"><i class="fa fa-user"></i></a><a href="#" style="margin-left:5px;margin-right:0px" lang="' + data.ide_usuario + '" class="btn btn-warning btn-sm editarUsuario"><i class="fa fa-key"></i></a> <a href="#" style="margin-left:5px;margin-right:0px" lang="' + data.ide_usuario + '" class="btn btn-danger btn-sm suspenderUsuario"><i class="fa fa-unlock"></i></a>';
                  }else if(data.estado==0){
                    return '<a href="#" style="margin-left:5px;margin-right:0px" lang="' + data.ide_usuario + '" class="btn btn-default btn-sm ActualizarRol"><i class="fa fa-user"></i></a><a href="#" style="margin-left:5px;margin-right:0px" lang="' + data.ide_usuario + '" class="btn btn-warning btn-sm editarUsuario"><i class="fa fa-key"></i></a> <a href="#" style="margin-left:5px;margin-right:0px" lang="' + data.ide_usuario + '" class="btn btn-success btn-sm habilitarUsuario"><i class="fa fa-lock"></i></a>';
                  }
                  
                }
                }
                /*{
                    "mData": 'ide_usuario',
                    "bSortable": false,
                    "bFilterable": false,
                    //"width": "auto",
                    "mRender": function(o) {
                        return '<a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-warning btn-sm editarUsuario"><i class="fa fa-key"></i></a> <a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-danger btn-sm suspenderUsuario"><i class="fa fa-trash-o"></i></a>';
                    }
                }
                */
            ],
            fnDrawCallback: function() {
                $('.suspenderUsuario').click(function() {
                    me.confirmSuspenderUsuario($(this).attr('lang'));
                });
                $('.habilitarUsuario').click(function() {
                    me.confirmHabilitarUsuario($(this).attr('lang'));
                });
                $('.editarUsuario').click(function() {
                    me.obtenerUsuario($(this).attr('lang'));
                    
                });
                $('.ActualizarRol').click(function() {
                    me.obtenerUsuarioRol($(this).attr('lang'));
                    
                });

            }

        });
    },     
    obtenerUsuario: function(idUsuario){
        $.ajax({
            url: 'index.php?r=seguridad/AjaxObtenerUsuario',
            type: 'POST',            
            data: {ide_usuario: idUsuario},
        })
        .done(function(response) {
            data=response.output;
                $("#edit_Usuario").text(data.Usuario);
                $("#edit_Usuario").attr('data-pass',data.Usuario);
                $("#edit_Usuario").attr('data-id',data.ide_usuario);
                $("#edit_Empleado").text(data.Empleado);
                $("#edit_Rol").text(data.Rol);
                          
                if(data.estado==1){                   
                    $('#edit_estado_User').text('Activo en el Sistema');
                    $('#edit_estado_User').addClass('text-primary');
                    $('#edit_estado_User').removeClass('text-danger');

                }else{                    
                    $('#edit_estado_User').text('Inactivo en el Sistema');
                    $('#edit_estado_User').addClass('text-danger');
                    $('#edit_estado_User').removeClass('text-primary');
                }

            
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
           $('#myModalEditarUsuario').modal('show');
        });
        
    },     
    obtenerUsuarioRol: function(idUsuario){
        $.ajax({
            url: 'index.php?r=seguridad/AjaxObtenerUsuarioRol',
            type: 'POST',            
            data: {ide_usuario: idUsuario},
        })
        .done(function(response) {
            data=response.output;
                $("#rol_Usuario").text(data.Usuario);
                $("#rol_Usuario").attr('data-pass',data.Usuario);
                $("#rol_Usuario").attr('data-id',data.ide_usuario);
                $("#rol_Empleado").text(data.Empleado);
                $("#rol_Rol").val(data.Rol);
                          
                if(data.estado==1){                   
                    $('#rol_estado_User').text('Activo en el Sistema');
                    $('#rol_estado_User').addClass('text-primary');
                    $('#rol_estado_User').removeClass('text-danger');

                }else{                    
                    $('#rol_estado_User').text('Inactivo en el Sistema');
                    $('#rol_estado_User').addClass('text-danger');
                    $('#rol_estado_User').removeClass('text-primary');
                }

            
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
           $('#myModalEditarRolUsuario').modal('show');
        });
        
    },    
    restableserPassword: function(){
        var newpass=$("#edit_Usuario").attr('data-pass');
        var ide_usuario=$("#edit_Usuario").attr('data-id');
        $.ajax({
            url: 'index.php?r=seguridad/AjaxRestablecerPassword',
            type: 'POST',            
            data: {
                ide_usuario: ide_usuario,
                des_password:newpass
            },
        })
        .done(function(response) {
        console.log("success");
            
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
           $('#myModalEditarUsuario').modal('hide');

        });
        
    },
    ActualizarRol: function(){
        var me = this;
        var ide_rol=$("#rol_Rol").val();
        if (ide_rol!="") {

            var ide_usuario=$("#rol_Usuario").attr('data-id');
        $.ajax({
            url: 'index.php?r=seguridad/AjaxActualizarRolUsuario',
            type: 'POST',            
            data: {
                ide_usuario: ide_usuario,
                ide_rol:ide_rol
            },
        })
        .done(function(response) {
        console.log("success");
        me.loadUsuarios();
            
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
           $('#myModalEditarRolUsuario').modal('hide');


        });
        };
        

        
    },     
     validar: function(){
        //console.log("VAMOS A VALIDAR");
        var me = this;      
     
        $('#agregarUsuarioForm')
        .bootstrapValidator(
                {
                    message : 'El valor ingresado no es valido',
                    feedbackIcons : {
                        valid : 'glyphicon glyphicon-ok',
                        invalid : 'glyphicon glyphicon-remove',
                        validating : 'glyphicon glyphicon-refresh'
                    },
                    fields : {
                        
                        add_Usuario: {
                            validators: {
                                notEmpty: {
                                    message: 'Ingrese un nombre de usuario'
                                }
                             }
                        },
                        add_Empleado: {
                            validators: {
                                notEmpty: {
                                    message: 'Seleccione un Empleado'
                                }
                             }
                        },
                        add_Rol: {
                            validators: {
                                notEmpty: {
                                    message: 'Seleccione un rol'
                                }
                             }
                        },
                        add_Password: {
                            validators: {
                                notEmpty: {
                                    message: 'Ingrese una contraseña'
                                }/*,
                                identical: {
                                    field: 'add_confirmPassword',
                                    message: 'The password and its confirm are not the same'
                                }*/
                             }
                        },
                        add_confirmPassword: {
                            validators: {
                                notEmpty: {
                                    message: 'Ingrese nuevamente la contraseña'
                                },
                                identical: {
                                    field: 'add_Password',
                                    message: 'Las contraseñas no coinciden'
                                },
                            
                            }
                        }
                    },
                    submitHandler : function(form) {
                        var des_usuario=$("#add_Usuario").val();
                        var des_password=$("#add_Password").val();
                        var ide_rol=$("#add_Rol").val();
                        var ide_persona=$("#add_Empleado").val();                  
                  
                       
                       $.ajax({
                            type: "POST",
                            url: 'index.php?r=seguridad/AjaxRegistrarUsuario',
                            data: {
                                    des_usuario:des_usuario,
                                    des_password:des_password,
                                    ide_rol:ide_rol,
                                    ide_persona:ide_persona
                                },
                            success: function(response) {
                                if (response.success) {
                                     me.loadUsuarios();
                                    $('#myModalNuevoUsuario').modal('hide');                                   
                                } else {
                                    //$('#message_save_acta').find('strong').html(response.message);
                                    //$('#message_save_acta').show('fade');

                                }
                            }
                        });



                    }
                });

    },
    confirmHabilitarUsuario: function(ide_usuario){
        var me = this;
        bootbox.dialog({
            message: "Confirme la acción de Habilitar al  Usuario.",
            title: "¿Seguro de Habilitar al Usuario?",
            buttons: {
                main: {
                    label: "Si",
                    className: "btn-success",
                    callback: function() {
                        console.log('Suspendiendo Usuario');

                        $.ajax({
                            type: "POST",
                            url: 'index.php?r=seguridad/AjaxActualizarEstadoUsuario',
                            data: {ide_usuario: ide_usuario,estado:1},
                            success: function(response) {
                              
                                     me.loadUsuarios();
                                    bootbox.hideAll();
                              
                            }
                        });

                        return false;
                    }
                },
                danger: {
                    label: "No",
                    className: "btn-danger",
                    callback: function() {
                        // bootbox.hideAll();
                    }
                }
            }
        });
    },
    confirmSuspenderUsuario: function(ide_usuario){
        var me = this;
        bootbox.dialog({
            message: "Confirme la acción de Suspender Usuario.",
            title: "¿Seguro de Suspender al Usuario?",
            buttons: {
                main: {
                    label: "Si",
                    className: "btn-success",
                    callback: function() {
                        console.log('Suspendiendo Usuario');

                        $.ajax({
                            type: "POST",
                            url: 'index.php?r=seguridad/AjaxActualizarEstadoUsuario',
                            data: {ide_usuario: ide_usuario,estado:0},
                            success: function(response) {
                               
                                    me.loadUsuarios();
                                    bootbox.hideAll();
                                
                            }
                        });

                        return false;
                    }
                },
                danger: {
                    label: "No",
                    className: "btn-danger",
                    callback: function() {
                        // bootbox.hideAll();
                    }
                }
            }
        });
    },      
    initListadoUsuarios: function() {       
        
        this.loadUsuarios();

    }

}

/*
    END - PROVEEDOR CORE
*/

  function validarNumeros(e) { // 1
        tecla = (document.all) ? e.keyCode : e.which; // 2
        if (tecla==8) return true; // backspace
        if (tecla==109) return true; // menos
    if (tecla==110) return true; // punto
        if (tecla==189) return true; // guion
        if (e.ctrlKey && tecla==86) { return true}; //Ctrl v
        if (tecla==39) { return true}; //Ctrl v
        if (tecla==37) { return true}; //Ctrl v
        if (e.ctrlKey && tecla==67) { return true}; //Ctrl c
        if (e.ctrlKey && tecla==88) { return true}; //Ctrl x
        if (tecla>=96 && tecla<=105) { return true;} //numpad

        patron = /[0-9]/; // patron

        te = String.fromCharCode(tecla); 
        return patron.test(te); // prueba
    }

/*
    INICIO Fn COre
*/
var FnCore = {
    closeWin: function(id) {

        $('#' + id).modal('hide');

    },

    validarEditarCliente: function(){
        //console.log("VAMOS A VALIDAR");
        var me = this;
        $(".inputNumero").keypress(function(e) {
            if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });
        $('#updateClienteForm')
        .bootstrapValidator(
                {
                    message : 'El valor ingresado no es valido',
                    feedbackIcons : {
                        valid : 'glyphicon glyphicon-ok',
                        invalid : 'glyphicon glyphicon-remove',
                        validating : 'glyphicon glyphicon-refresh'
                    },
                    fields : {
                        RazSoc_Cli : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar la Razon Social o el Nombre del Cliente'
                                }
                            }
                        },
                        tipoPersona_Cli : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe Seleccionar el Tipo de Persona'
                                }
                            }
                        },
                        ruc_Cli : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el Nro de RUC'
                                }
                            }
                        },
                        direccion_Cli : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar la Dirección'
                                }
                            }
                        },
                        telefono_Cli : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el telefono'
                                }
                            }
                        },
                        email_Cli : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el email del Cliente'
                                }
                            }
                        }
                    },
                    submitHandler : function(form) {
                    var idCliente=$("#edit_idCliente").val();
                    var RazSoc_Cli=$("#edit_RazSoc_Cli").val();
                    var tipoPersona_Cli=$("#edit_tipoPersona_Cli").val();
                    var ruc_Cli=$("#edit_ruc_Cli").val();
                    var direccion_Cli=$("#edit_direccion_Cli").val();
                    var telefono_Cli=$("#edit_telefono_Cli").val();
                    var email_Cli=$("#edit_email_Cli").val();
                  
                        if($("#edit_estado_Cli").is(':checked')) {
                            estado_Cli=1;
                        } else {
                            estado_Cli=0;
                        }                     
                                       
                       $.ajax({
                            type: "POST",
                            url: 'index.php?r=ventas/AjaxEditarCliente',
                            data: {
                                idCliente  :idCliente,
                                RazSoc_Cli:RazSoc_Cli,
                                tipoPersona_Cli:tipoPersona_Cli,
                                ruc_Cli:ruc_Cli,
                                direccion_Cli:direccion_Cli,
                                telefono_Cli:telefono_Cli,
                                email_Cli:email_Cli,
                                estado_Cli:estado_Cli
                            },
                            success: function(response) {
                                if (response.success) {
                                     me.loadListadoClientes();
                                    me.closeWin('myModalEditarCliente');                                   
                                } else {
                                    //$('#message_save_acta').find('strong').html(response.message);
                                    //$('#message_save_acta').show('fade');

                                }
                            }
                        });



                    }
                });

    },
    obtenerCliente: function(idCliente){
        $.ajax({
            url: 'index.php?r=ventas/AjaxObtenerCliente',
            type: 'POST',            
            data: {idCliente: idCliente},
        })
        .done(function(response) {
            data=response.output;
                $("#edit_idCliente").val(data.idCliente);
                $("#edit_RazSoc_Cli").val(data.RazSoc_Cli);                
                $("#edit_tipoPersona_Cli option[value='"+data.tipoPersona_Cli+"']").attr('selected','selected');
                $("#edit_ruc_Cli").val(data.ruc_Cli);
                $("#edit_direccion_Cli").val(data.direccion_Cli);
                $("#edit_telefono_Cli").val(data.telefono_Cli);
                $("#edit_email_Cli").val(data.email_Cli);
                if(data.estado_Cli==1){
                    $("#edit_estado_Cli").prop('checked', true);
                    $('#edit_textEstado').text('Activo en el Sistema');
                }else{
                    $("#edit_estado_Cli").prop('checked', false);
                    $('#edit_textEstado').text('inactivo en el Sistema');
                }

            
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
           $('#myModalEditarCliente').modal('show');
        });
        
    },
     confirmSuspenderCliente: function(idCliente){
        var me = this;
        bootbox.dialog({
            message: "Confirme la acción de Suspender Cliente.",
            title: "¿Seguro de Suspender al Cliente?",
            buttons: {
                main: {
                    label: "Si",
                    className: "btn-success",
                    callback: function() {
                        console.log('Suspendiendo Cliente');

                        $.ajax({
                            type: "POST",
                            url: 'index.php?r=ventas/AjaxActualizarEstadoCliente',
                            data: {idCliente: idCliente,estado_Cli:0},
                            success: function(response) {
                                console.log(response);
                                if (response.success) {
                                    me.loadListadoClientes();
                                    bootbox.hideAll();
                                }
                            }
                        });

                        return false;
                    }
                },
                danger: {
                    label: "No",
                    className: "btn-danger",
                    callback: function() {
                        // bootbox.hideAll();
                    }
                }
            }
        });
    },
     validar: function(){
        //console.log("VAMOS A VALIDAR");
        var me = this;
        $(".inputNumero").keypress(function(e) {
            if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });

        $('#mensaje-succes-usuario-div').removeAttr('style');
        $('#ClienteForm')
        .bootstrapValidator(
                {
                    message : 'El valor ingresado no es valido',
                    feedbackIcons : {
                        valid : 'glyphicon glyphicon-ok',
                        invalid : 'glyphicon glyphicon-remove',
                        validating : 'glyphicon glyphicon-refresh'
                    },
                    fields : {
                        RazSoc_Cli : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar la Razon Social o el Nombre del Cliente'
                                }
                            }
                        },
                        tipoPersona_Cli : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe Seleccionar el Tipo de Persona'
                                }
                            }
                        },
                        ruc_Cli : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el Nro de RUC'
                                }
                            }
                        },
                        direccion_Cli : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar la Dirección'
                                }
                            }
                        },
                        telefono_Cli : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el telefono'
                                }
                            }
                        },
                        email_Cli : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el email del Cliente'
                                }
                            }
                        }
                    },
                    submitHandler : function(form) {

                    var RazSoc_Cli=$("#RazSoc_Cli").val();
                    var tipoPersona_Cli=$("#tipoPersona_Cli").val();
                    var ruc_Cli=$("#ruc_Cli").val();
                    var direccion_Cli=$("#direccion_Cli").val();
                    var telefono_Cli=$("#telefono_Cli").val();
                    var email_Cli=$("#email_Cli").val();
                  
                       
                       $.ajax({
                            type: "POST",
                            url: 'index.php?r=ventas/AjaxAgregarCliente',
                            data: {
                                RazSoc_Cli:RazSoc_Cli,
                                tipoPersona_Cli:tipoPersona_Cli,
                                ruc_Cli:ruc_Cli,
                                direccion_Cli:direccion_Cli,
                                telefono_Cli:telefono_Cli,
                                email_Cli:email_Cli
                            },
                            success: function(response) {
                                if (response.success) {
                                     me.loadListadoClientes();
                                    me.closeWin('myModalNuevoCliente');                                   
                                } else {
                                    //$('#message_save_acta').find('strong').html(response.message);
                                    //$('#message_save_acta').show('fade');

                                }
                            }
                        });



                    }
                });

    },
    loadListadoClientes: function(){
        var me = this;
        
        Util.createGrid('#listaClientes',{
            toolButons:'<a style="display:inline-block;margin:-1px 0px 0px 0px;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalNuevoCliente">Nuevo Cliente</a>',
            url:'index.php?r=Ventas/ajaxListadoClientes',
            columns:[
                {"mData": "RazSoc_Cli", "sClass": "alignCenter"},
                //{"mData": "tipoPersona_Cli", "sClass": "alignCenter"},
                {"mData": "ruc_Cli", "sClass": "alignCenter"},
                /*{
                    "mData": "fec_reg_Cli", 
                    "mRender": function(o){
                        var f = new Date(o);
                        var dia = (f.getDate()<10 ? "0"+f.getDate() : f.getDate());
                        var mes = ((f.getMonth()+1)<10 ? "0"+f.getMonth() : f.getMonth());

                        return dia+"/"+mes+"/"+f.getFullYear();
                    }
                },*/
                {"mData": "direccion_Cli", "sClass": "alignCenter"},
                {"mData": "telefono_Cli", "sClass": "alignCenter"},
                {"mData": "email_Cli", "sClass": "alignCenter"},
                {
                    "mData": 'idCliente',
                    "bSortable": false,
                    "bFilterable": false,
                    // "width": "150px",
                    "mRender": function(o) {
                        return '<a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-warning btn-sm editarCliente"><i class="fa fa-pencil"></i></a> <a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-danger btn-sm suspenderCliente"><i class="fa fa-trash-o"></i></a>';
                    }
                }
            ],
            fnDrawCallback: function() {
                $('.suspenderCliente').click(function() {
                    me.confirmSuspenderCliente($(this).attr('lang'));
                });
                $('.editarCliente').click(function() {
                    me.obtenerCliente($(this).attr('lang'));
                    
                });

            }
        });
    },    
     validar: function(){
        //console.log("VAMOS A VALIDAR");
        var me = this;            
        $('#agregarUsuarioForm')
        .bootstrapValidator(
                {
                    message : 'El valor ingresado no es valido',
                    feedbackIcons : {
                        valid : 'glyphicon glyphicon-ok',
                        invalid : 'glyphicon glyphicon-remove',
                        validating : 'glyphicon glyphicon-refresh'
                    },
                    fields : {
                        RazSoc_Prov : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar la Razon Social o el Nombre del Proveedor'
                                }
                            }
                        },
                        RazSoc_Prov : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar la Razon Social o el Nombre del Proveedor'
                                }
                            }
                        },
                        RazSoc_Prov : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar la Razon Social o el Nombre del Proveedor'
                                }
                            }
                        },

                    },
                    submitHandler : function(form) {

                    var RazSoc_Prov=$("#RazSoc_Prov").val();
                    var tipoPersona_Prov=$("#tipoPersona_Prov").val();
                    var ruc_Prov=$("#ruc_Prov").val();
                    var direccion_Prov=$("#direccion_Prov").val();
                    var telefono_Prov=$("#telefono_Prov").val();
                    var email_Prov=$("#email_Prov").val();
                  
                       
                       $.ajax({
                            type: "POST",
                            url: 'index.php?r=compras/AjaxAgregarProveedor',
                            data: {
                                RazSoc_Prov:RazSoc_Prov,
                                tipoPersona_Prov:tipoPersona_Prov,
                                ruc_Prov:ruc_Prov,
                                direccion_Prov:direccion_Prov,
                                telefono_Prov:telefono_Prov,
                                email_Prov:email_Prov
                            },
                            success: function(response) {
                                if (response.success) {
                                     me.loadListadoProveedores();
                                    me.closeWin('myModalNuevoProveedor');                                   
                                } else {
                                    //$('#message_save_acta').find('strong').html(response.message);
                                    //$('#message_save_acta').show('fade');

                                }
                            }
                        });



                    }
                });

    },
    initListadoClientes: function() {       
          $('#myModalNuevoCliente').on('hidden.bs.modal', function() {
         
             $('#ClienteForm').bootstrapValidator('resetForm', true);            
        });
         $('#myModalEditarCliente').on('hidden.bs.modal', function() {
         
             $('#updateClienteForm').bootstrapValidator('resetForm', true);            
        });

        this.loadListadoClientes();

    }

}
/*
    END - FnCore
*/
var EmpCore = {
closeWin: function(id) {

        $('#' + id).modal('hide');

    },
    loadEmpleados: function(){
        var me = this;
        
        Util.createGrid('#listaEmpleados',{
             toolButons:'<a style="display:inline-block;margin:-1px 0px 0px 0px;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalNuevoEmpleado">Nuevo Empleado</a>',
            url:'index.php?r=personal/ajaxListadoEmpleados',
            //"order": [[ 0, 'desc' ]],
            columns:[
               
                {"mData": "Empleado", "sClass": "alignCenter"},
                {"mData": "DNI", "sClass": "alignCenter"},
                {"mData": "Telefono", "sClass": "alignCenter"}, 
                {"mData": "Correo", "sClass": "alignCenter"},
                {
                    "mData": 'idEmpleado',
                    "bSortable": false,
                    "bFilterable": false,
                    // "width": "150px",
                    "mRender": function(o) {
                        return '<a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-warning btn-sm editarEmpleado"><i class="fa fa-pencil"></i></a> <a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-danger btn-sm suspenderEmpleado"><i class="fa fa-trash-o"></i></a>';
                    }
                }
            ],
            fnDrawCallback: function() {
                $('.suspenderEmpleado').click(function() {
                    me.confirmSuspenderEmpleado($(this).attr('lang'));
                });
                $('.editarEmpleado').click(function() {
                    me.obtenerEmpleado($(this).attr('lang'));
                    
                });

            }

        });
    },    
     confirmSuspenderEmpleado: function(idEmpleado){
        var me = this;
        bootbox.dialog({
            message: "Confirme la acción de Suspender Empleado.",
            title: "¿Seguro de Suspender al Empleado?",
            buttons: {
                main: {
                    label: "Si",
                    className: "btn-success",
                    callback: function() {
                        console.log('Suspendiendo Empleado');

                        $.ajax({
                            type: "POST",
                            url: 'index.php?r=personal/AjaxActualizarEstadoEmpleado',
                            data: {ide_persona: idEmpleado,ide_estado:0},
                            success: function(response) {
                                console.log(response);
                                if (response.success) {
                                    me.loadEmpleados();
                                    bootbox.hideAll();
                                }
                            }
                        });

                        return false;
                    }
                },
                danger: {
                    label: "No",
                    className: "btn-danger",
                    callback: function() {
                        bootbox.hideAll();
                    }
                }
            }
        });
    },
    obtenerEmpleado: function(idEmpleado){
        $.ajax({
            url: 'index.php?r=personal/AjaxObtenerEmpleado',
            type: 'POST',            
            data: {idEmpleado: idEmpleado},
        })
        .done(function(response) {
            data=response.output;
            $('#desNombres').val(data.des_nombres);
            $('#ide_persona').val(data.ide_persona);
            $('#apePaterno').val(data.des_apepat);
            $('#apeMaterno').val(data.des_apemat);
            $('#desDocumento').val(data.nro_documento);
            $('#fecNacimiento').val(data.fec_nacimiento);
            $('#desTelefono').val(data.des_telefono);
            $('#desCorreo').val(data.des_correo);
            $('#Sueldo').val(data.Sueldo);
            //$('#idsexo').val(data.sexo);
            $('#selEstadoCivil').val(data.ide_estcivil);
           
            if(data.ide_estado==1){
                    $("#estado_emp").prop('checked', true);
                    $('#edit_textEstado').text('Activo en el Sistema');
                }else{
                    $("#estado_emp").prop('checked', false);
                    $('#edit_textEstado').text('inactivo en el Sistema');
                }
       

        
                if(data.sexo=='M'){
                    $("input:radio[name='idsexo'][value='M']").attr('checked', true);
                   $('.EstCivM').addClass('active');
                   $('.EstCivF').removeClass('active');
                }else{
                     $("input:radio[name='idsexo'][value='F']").attr('checked', true);
                     $('.EstCivF').addClass('active');
                       $('.EstCivM').removeClass('active');

             }
          

            
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
           $('#myModalEditarEmpleado').modal('show');
        });
        
    },
    validarNuevoEmpleado: function(){
        var me = this;
     $('#newEmpleadoForm')
        .bootstrapValidator(
                {
                    message : 'El valor ingresado no es valido',
                    feedbackIcons : {
                        valid : 'glyphicon glyphicon-ok',
                        invalid : 'glyphicon glyphicon-remove',
                        validating : 'glyphicon glyphicon-refresh'
                    },
                    fields : {
                        add_desNombres : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar  el Nombre '
                                }
                            }
                        },
                        add_apeMaterno : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar  el Apellido Materno '
                                }
                            }
                        },
                        add_apePaterno : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar  el Apellido Paterno'
                                }
                            }
                        },
                        add_desDocumento : {
                            validators : {
                                digits: {
                                    message: 'The phone number can contain digits only'
                                },
                                notEmpty : {
                                    message : 'Debe ingresar el Nro de DNI'
                                }
                            }
                        },
                        add_fecNacimiento : {
                            validators : {
                                date : {
                                    message : 'Debe ingresar la Fecha de Nacimiento'
                                }
                            }
                        },
                        add_desTelefono : {
                            validators: {
                                digits: {
                                    message: 'The phone number can contain digits only'
                                },
                                notEmpty: {
                                    message: 'Debe ingresar el numero telefono'
                                }
                            }
                        },
                        add_desCorreo : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el email '
                                }
                            }
                        },
                        add_Sueldo : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el Sueldo'
                                }
                            }
                        },
                        add_selEstadoCivil : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe seleccionar el estado civil'
                                }
                            }
                        }
                    },
                    submitHandler : function(form) {
                    
                    
                    var des_nombres=$('#add_desNombres').val();
                    var des_apepat=$('#add_apePaterno').val();
                    var des_apemat=$('#add_apeMaterno').val();
                    var nro_documento=$('#add_desDocumento').val();
                    var fec_nacimiento=$('#add_fecNacimiento').val();
                    var des_telefono=$('#add_desTelefono').val();
                    var des_correo=$('#add_desCorreo').val();
                    var Sueldo=$('#add_Sueldo').val();
                    var ide_estcivil=$('#add_selEstadoCivil').val();
                    var sexo=$('input:radio[name=add_idsexo]:checked').val();

                    
                  
                        if($("#add_estado_emp").is(':checked')) {
                            ide_estado=1;
                        } else {
                            ide_estado=0;
                        }                     
                                       
                       $.ajax({
                            type: "POST",
                            url: 'index.php?r=personal/AjaxAgregarEmpleado',
                            data: {                               
                               des_nombres:des_nombres,
                               des_apepat:des_apepat,
                               des_apemat:des_apemat,
                               nro_documento:nro_documento,
                               fec_nacimiento:fec_nacimiento,
                               des_telefono:des_telefono,
                               des_correo:des_correo,
                               Sueldo:Sueldo,
                               ide_estcivil:ide_estcivil,
                               sexo:sexo,
                               ide_estado: ide_estado
                            },
                            success: function(response) {
                                if (response.success) {
                                     me.loadEmpleados();
                                    me.closeWin('myModalNuevoEmpleado');                                   
                                } else {
                                    //$('#message_save_acta').find('strong').html(response.message);
                                    //$('#message_save_acta').show('fade');

                                }
                            }
                        });



                    }
                });

    },
    validar: function(){
        var me = this;
     $('#update_EmpleadoForm')
        .bootstrapValidator(
                {
                    message : 'El valor ingresado no es valido',
                    feedbackIcons : {
                        valid : 'glyphicon glyphicon-ok',
                        invalid : 'glyphicon glyphicon-remove',
                        validating : 'glyphicon glyphicon-refresh'
                    },
                    fields : {
                        desNombres : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar  el Nombre '
                                }
                            }
                        },
                        apeMaterno : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar  el Apellido Materno '
                                }
                            }
                        },
                        apePaterno : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar  el Apellido Paterno'
                                }
                            }
                        },
                        desDocumento : {
                            validators : {
                                digits: {
                                    message: 'The phone number can contain digits only'
                                },
                                notEmpty : {
                                    message : 'Debe ingresar el Nro de DNI'
                                }
                            }
                        },
                        fecNacimiento : {
                            validators : {
                                date : {
                                    message : 'Debe ingresar la Fecha de Nacimiento'
                                }
                            }
                        },
                        desTelefono : {
                            validators: {
                                digits: {
                                    message: 'The phone number can contain digits only'
                                },
                                notEmpty: {
                                    message: 'Debe ingresar el numero telefono'
                                }
                            }
                        },
                        desCorreo : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el email '
                                }
                            }
                        },
                        Sueldo : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el Sueldo'
                                }
                            }
                        },
                        selEstadoCivil : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe seleccionar el estado civil'
                                }
                            }
                        }
                    },
                    submitHandler : function(form) {
                    
                    var ide_persona=$('#ide_persona').val();
                    var des_nombres=$('#desNombres').val();
                    var des_apepat=$('#apePaterno').val();
                    var des_apemat=$('#apeMaterno').val();
                    var nro_documento=$('#desDocumento').val();
                    var fec_nacimiento=$('#fecNacimiento').val();
                    var des_telefono=$('#desTelefono').val();
                    var des_correo=$('#desCorreo').val();
                    var Sueldo=$('#Sueldo').val();
                    var ide_estcivil=$('#selEstadoCivil').val();
                    var sexo=$('input:radio[name=idsexo]:checked').val();

                    
                  
                        if($("#estado_emp").is(':checked')) {
                            ide_estado=1;
                        } else {
                            ide_estado=0;
                        }                     
                                       
                       $.ajax({
                            type: "POST",
                            url: 'index.php?r=personal/AjaxEditarEmpleado',
                            data: {
                               ide_persona:ide_persona,
                               des_nombres:des_nombres,
                               des_apepat:des_apepat,
                               des_apemat:des_apemat,
                               nro_documento:nro_documento,
                               fec_nacimiento:fec_nacimiento,
                               des_telefono:des_telefono,
                               des_correo:des_correo,
                               Sueldo:Sueldo,
                               ide_estcivil:ide_estcivil,
                               sexo:sexo,
                                ide_estado: ide_estado
                            },
                            success: function(response) {
                                if (response.success) {
                                     me.loadEmpleados();
                                    me.closeWin('myModalEditarEmpleado');                                   
                                } else {
                                    //$('#message_save_acta').find('strong').html(response.message);
                                    //$('#message_save_acta').show('fade');

                                }
                            }
                        });



                    }
                });

    },
    initListadoEmpleados: function() {       
        
        this.loadEmpleados();
        $('#myModalEditarEmpleado').on('hidden.bs.modal', function() {
         
             $('#update_EmpleadoForm').bootstrapValidator('resetForm', true);
                     
        });
        $('#myModalNuevoEmpleado').on('hidden.bs.modal', function() {
         
             $('#newEmpleadoForm').bootstrapValidator('resetForm', true);
                     
        });
    }

}
/*
    INICIO Fn ProdCore
*/
var ProdCore = {

    closeWin: function(id) {

        $('#' + id).modal('hide');

    },
    obtenerProducto: function(idProducto){
        $.ajax({
            url: 'index.php?r=almacen/AjaxObtenerProducto',
            type: 'POST',            
            data: {idProducto: idProducto},
        })
        .done(function(response) {
            data=response.output;
                $("#edit_idProducto").val(data.idProducto);
                $("#edit_desc_Prod").val(data.desc_Prod);
                $("#edit_presentacion").val(data.presentacion);
                $("#edit_stock").val(data.stock);
                $("#edit_Precio").val(data.Precio);
                $("#edit_tipoProd option[value='"+data.tipoProd+"']").attr('selected','selected');
                $("#edit_ListaMarcas option[value='"+data.idMarca+"']").attr('selected','selected');
                $("#edit_ListaCategorias option[value='"+data.idCategoria+"']").attr('selected','selected');
                $("#edit_ListaProveedores").val(data.idProveedor);
                if(data.estadoProd==1){
                    $("#edit_estadoProd").prop('checked', true);
                    $('#edit_textEstado').text('en Catálogo');
                }else{
                    $("#edit_estadoProd").prop('checked', false);
                    $('#edit_textEstado').text('Suspendido');
                }

            
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
           $('#myModalEditarProducto').modal('show');
        });
        
    },
    confirmSuspenderProducto: function(idProducto){
        var me = this;
        bootbox.dialog({
            message: "Confirme la acción de Suspender producto.",
            title: "¿Seguro de Suspender el Producto?",
            buttons: {
                main: {
                    label: "Si",
                    className: "btn-success",
                    callback: function() {
                        console.log('Suspendiendo Producto');

                        $.ajax({
                            type: "POST",
                            url: 'index.php?r=almacen/AjaxActualizarEstadoProducto',
                            data: {idProducto: idProducto,estadoProd:0},
                            success: function(response) {
                                console.log(response);
                                if (response.success) {
                                    me.loadListadoProductos();
                                    bootbox.hideAll();
                                }
                            }
                        });

                        return false;
                    }
                },
                danger: {
                    label: "No",
                    className: "btn-danger",
                    callback: function() {
                        // bootbox.hideAll();
                    }
                }
            }
        });
    },
    validarEditarProducto: function(){
        //console.log("VAMOS A VALIDAR");
        var me = this;
        $(".inputNumero").keypress(function(e) {
            if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });
        $('#updateProductoForm')
        .bootstrapValidator(
                {
                    message : 'El valor ingresado no es valido',
                    feedbackIcons : {
                        valid : 'glyphicon glyphicon-ok',
                        invalid : 'glyphicon glyphicon-remove',
                        validating : 'glyphicon glyphicon-refresh'
                    },
                    fields : {
                        edit_desc_Prod : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar una Descripcion'
                                }
                            }
                        },
                        edit_presentacion : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar la constrase&ntilde;a'
                                }
                            }
                        },
                        edit_tipoProd : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe Seleccionar un Tipo'
                                }
                            }
                        },
                        edit_ListaProveedores : {
                            validators : {
                                notEmpty : {
                                    message : 'Deve seleccionar una Marca'
                                }
                            }
                        },edit_ListaMarcas : {
                            validators : {
                                notEmpty : {
                                    message : 'Deve seleccionar una Marca'
                                }
                            }
                        },
                        edit_ListaCategorias : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe seleccionar una categoria'
                                }
                            }
                        },
                        edit_Stock : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el stock'
                                }
                            }
                        },
                        edit_Precio : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el Precio'
                                }
                            }
                        }
                    },
                    submitHandler : function(form) {

                        var idProducto =$("#edit_idProducto").val();
                        var desc_Prod =$("#edit_desc_Prod").val();
                        var presentacion =$("#edit_presentacion").val();
                        var tipoProd =$("#edit_tipoProd").val();
                        var stock =$("#edit_stock").val();
                        var Precio =$("#edit_Precio").val();
                        var idProveedor =$("#edit_ListaProveedores").val();
                        var idMarca =$("#edit_ListaMarcas").val();
                        var idCategoria =$("#edit_ListaCategorias").val();
                        if($("#edit_estadoProd").is(':checked')) {
                            estadoProd=1;
                        } else {
                            estadoProd=0;
                        }                     
                                       
                       $.ajax({
                            type: "POST",
                            url: 'index.php?r=almacen/AjaxEditarProducto',
                            data: {
                                idProducto  :idProducto,
                                desc_Prod   :desc_Prod,
                                presentacion:presentacion,
                                tipoProd    :tipoProd,
                                stock:stock,
                                idProveedor:idProveedor,
                                idMarca:idMarca,
                                idCategoria:idCategoria,
                                estadoProd:estadoProd,
                                Precio:Precio
                            },
                            success: function(response) {
                                if (response.success) {
                                     me.loadListadoProductos();
                                    me.closeWin('myModalEditarProducto');                                   
                                } else {
                                    //$('#message_save_acta').find('strong').html(response.message);
                                    //$('#message_save_acta').show('fade');

                                }
                            }
                        });



                    }
                });

    },

    validar: function(){
        //console.log("VAMOS A VALIDAR");
        var me = this;
        $(".inputNumero").keypress(function(e) {
            if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });

        $('#mensaje-succes-usuario-div').removeAttr('style');
        $('#ProductoForm')
        .bootstrapValidator(
                {
                    message : 'El valor ingresado no es valido',
                    feedbackIcons : {
                        valid : 'glyphicon glyphicon-ok',
                        invalid : 'glyphicon glyphicon-remove',
                        validating : 'glyphicon glyphicon-refresh'
                    },
                    fields : {
                        desc_Prod : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar una Descripcion'
                                }
                            }
                        },
                        presentacion : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar la constrase&ntilde;a'
                                }
                            }
                        },
                        tipoProd : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe Seleccionar un Tipo'
                                }
                            }
                        },
                        ListaProveedores : {
                            validators : {
                                notEmpty : {
                                    message : 'Deve seleccionar un Proveedor'
                                }
                            }
                        },
                        ListaMarcas : {
                            validators : {
                                notEmpty : {
                                    message : 'Deve seleccionar una Marca'
                                }
                            }
                        },
                        ListaCategorias : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe seleccionar una categoria'
                                }
                            }
                        },
                        Stock : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el stock'
                                }
                            }
                        },
                        add_Precio : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el Precio'
                                }
                            }
                        }
                    },
                    submitHandler : function(form) {

                       
                        var desc_Prod =$("#desc_Prod").val();
                        var presentacion =$("#presentacion").val();
                        var tipoProd =$("#tipoProd").val();
                        var stock =$("#add_stock").val();
                        var precio =$("#add_Precio").val();
                        var idProveedor =$("#ListaProveedores").val();
                        var idMarca =$("#ListaMarcas").val();
                        var idCategoria =$("#ListaCategorias").val();
                                             
                       
                       $.ajax({
                            type: "POST",
                            url: 'index.php?r=almacen/AjaxAgregarProducto',
                            data: {
                                desc_Prod:desc_Prod,
                                presentacion:presentacion,
                                tipoProd:tipoProd,
                                stock:stock,
                                idProveedor:idProveedor,
                                idMarca:idMarca,
                                idCategoria:idCategoria,
                                precio:precio
                            },
                            success: function(response) {
                                if (response.success) {
                                     me.loadListadoProductos();
                                    me.closeWin('myModalNuevoProducto');                                   
                                } else {
                                    //$('#message_save_acta').find('strong').html(response.message);
                                    //$('#message_save_acta').show('fade');

                                }
                            }
                        });



                    }
                });

    },

    loadListadoProductos: function(){
        var me = this;
        
        Util.createGrid('#listaProductos',{
            toolButons:'<a style="display:inline-block;margin:-1px 0px 0px 0px;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalNuevoProducto">Nuevo Producto</a>',
            url:'index.php?r=almacen/ajaxListadoProductos',
            columns:[
                {"mData": "desc_Prod", "sClass": "alignCenter"},
                {"mData": "presentacion", "sClass": "alignCenter"},
                {"mData": "tipoProd", "sClass": "alignCenter"},             
                {"mData": "stock", "sClass": "alignCenter"},
                {"mData": "nomMarca", "sClass": "alignCenter"},
                {"mData": "nomCategoria", "sClass": "alignCenter"},
                {"mData": "precio", "sClass": "alignCenter"},
               
                {
                    "mData": 'idProducto',
                    "bSortable": false,
                    "bFilterable": false,
                    //"width": "150px",
                    "mRender": function(o) {
                        return '<a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-warning btn-sm editarProducto"><i class="fa fa-pencil"></i></a> <a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-danger btn-sm suspenderProducto"><i class="fa fa-trash-o"></i></a>';
                    }
                }
            ],
            fnDrawCallback: function() {
                $('.suspenderProducto').click(function() {
                    me.confirmSuspenderProducto($(this).attr('lang'));
                });
                $('.editarProducto').click(function() {
                    me.obtenerProducto($(this).attr('lang'));
                    
                });

            }
        });
    },   
    loadMarca: function(){

        $.ajax({
            type: "POST",
            url: 'index.php?r=almacen/AjaxListarMarcas',
            //sync:false,           
            success: function(data) {
                var html = "";

                $(".ListaMarcas").find("option").remove();
                 
                $.each(data, function(index, value) {

                    html += '<option value="'+value.idMarca+'">'+value.nomMarca+'</option>';
                });
                $(".ListaMarcas").append("<option value=''>Seleccione Marca</option>");
                $(".ListaMarcas").append(html);

            },
            dataType: 'json'

        });
    
    },  
    loadProveedor: function(){

        $.ajax({
            type: "POST",
            url: 'index.php?r=compras/AjaxListarProveedores',
            //sync:false,           
            success: function(data) {
                var html = "";

                $(".listaProveedores").find("option").remove();
                 
                $.each(data, function(index, value) {

                    html += '<option value="'+value.idProveedor+'">'+value.RazSoc_Prov+'</option>';
                });
                $(".listaProveedores").append("<option value=''>Seleccione Proveedor</option>");
                $(".listaProveedores").append(html);

            },
            dataType: 'json'

        });
    
    },    
    loadCategoria: function(){

        $.ajax({
            type: "POST",
            url: 'index.php?r=almacen/AjaxListarCategorias',
            //sync:false,           
            success: function(data) {
                var html = "";

                $(".ListaCategorias").find("option").remove();

                $.each(data, function(index, value) {

                    html += '<option value="'+value.idCategoria+'">'+value.nomCategoria+'</option>';
                });
                $(".ListaCategorias").append("<option value=''>Seleccione Categoria</option>");
                $(".ListaCategorias").append(html);

            },
            dataType: 'json'
        });
    
    },
    initListadoProductos: function() {
        var me = this;
         /*$('#myModalNuevoProducto').on('show.bs.modal', function(e) {
         
                       
        });*/
         $('#myModalNuevoProducto').on('hidden.bs.modal', function() {
         
             $('#ProductoForm').bootstrapValidator('resetForm', true);            
        });
         $('#myModalEditarProducto').on('hidden.bs.modal', function() {
         
             $('#updateProductoForm').bootstrapValidator('resetForm', true);            
        });
        
         me.loadCategoria();
           me.loadMarca();
           me.loadProveedor();
        this.loadListadoProductos();

    }

}
/*
    END - FnCore
*/

/*
$(document).ready(function() {
$('#defaultForm').bootstrapValidator({
message: 'This value is not valid',
fields: {
username: {
message: 'The username is not valid',
validators: {
notEmpty: {
message: 'The username is required and can\'t be empty'
},
stringLength: {
min: 6,
max: 30,
message: 'The username must be more than 6 and less than 30 characters long'
},
regexp: {
regexp: /[0-9-()+]{3,20}/,
message: 'The username can only consist of alphabetical, number, dot and underscore'
}

}
},
email: {
validators: {
notEmpty: {
message: 'The email address is required and can\'t be empty'
},
emailAddress: {
message: 'The input is not a valid email address'
}
}
},
password: {
validators: {
notEmpty: {
message: 'The password is required and can\'t be empty'
},
identical: {
field: 'confirmPassword',
message: 'The password and its confirm are not the same'
},
different: {
field: 'username',
message: 'The password can\'t be the same as username'
}
}
},
confirmPassword: {
validators: {
notEmpty: {
message: 'The confirm password is required and can\'t be empty'
},
identical: {
field: 'password',
message: 'The password and its confirm are not the same'
},
different: {
field: 'username',
message: 'The password can\'t be the same as username'
}
}
}

}
});
});
*/