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
                {"mData": "cantidad", "sClass": "alignCenter"},
                {"mData": "valor_unitario", "sClass": "alignCenter"},
                {"mData": "total", "sClass": "alignCenter"}
            ],
            fnDrawCallback: function() {
                
                $('.verDetalle').click(function() {
                    me.obtenerDetalle($(this).attr('data-nroSerie'),$(this).attr('data-nroFact'));
                    
                });

            }

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
            toolButons:'<a style="display:inline-block;margin:-1px 0px 0px 0px;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalNuevoProveedor">Nuevo Proveedor</a>',
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
            toolButons:'',
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
                        edit_ListaMarcas : {
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
        this.loadListadoProductos();

    }

}
/*
    END - FnCore
*/

var coreFn = {
    prefixUrl:'index.php?r=',
    confirmEliminaEmpleado: function(ideEmpleado){
        var me = this;
        bootbox.dialog({
            message: "Confirme la acción de Eliminación de Empleado.",
            title: "¿Seguro de Eliminar el Empleado?",
            buttons: {
                main: {
                    label: "Si",
                    className: "btn-success",
                    callback: function() {
                        console.log('Eliminando Empleado');

                        $.ajax({
                            type: "POST",
                            url: me.prefixUrl+'personal/ajaxActualizarEmpleado',
                            data: {idePersona: ideEmpleado,ideEstado:0},
                            success: function(response) {
                                console.log(response);
                                if (response.success) {
                                    me.loadListadoEmpleados();
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
        $(".inputNumero").keypress(function(e) {
            if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });

        $('#mensaje-succes-usuario-div').removeAttr('style');
        $('#empleadoForm')       
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
                                    message : 'Debe ingresar el usuario'
                                }
                            }
                        },
                        apePaterno : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar la constrase&ntilde;a'
                                }
                            }
                        },
                        apeMaterno : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el Nombre'
                                }
                            }
                        },
                        desDocumento : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el apellido paterno es requerido'
                                }
                            }
                        },
                        fecNacimiento : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el apellido materno es requerido'
                                }
                            }
                        },
                        desTelefono : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el email'
                                }
                            }
                        },
                        desCorreo : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el correo electronico'
                                }
                            }
                        }
                    },
                    submitHandler : function(form) {

                       
                    }
                });

    },
    formatoFecha: function(fn){
        var f = new Date(fn);
        var dia = (f.getDate()<10 ? "0"+f.getDate() : f.getDate());
        var mes = ((f.getMonth()+1)<10 ? "0"+f.getMonth() : f.getMonth());

        return dia+"/"+mes+"/"+f.getFullYear();
    },
    loadListadoEmpleados: function(){
        var me = this;
        
        Util.createGrid('#listaEmpleados',{
            toolButons:'<a style="display:inline-block;margin:-1px 0px 0px 0px;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalNuevoEmpleado">Nuevo Empleado</a>',
            url: me.prefixUrl+'personal/ajaxListadoEmpleados',
            columns:[
                {"mData": "des_nombres", "sClass": "alignCenter"},
                {"mData": "des_apepat", "sClass": "alignCenter"},
                {"mData": "des_apemat", "sClass": "alignCenter"},
                {
                    "mData": "fec_nacimiento", 
                    "mRender": function(fn){
                        
                        return me.formatoFecha(fn);
                    }
                },
                {"mData": "nro_documento", "sClass": "alignCenter"},
                {"mData": "des_telefono", "sClass": "alignCenter"},
                {"mData": "des_correo", "sClass": "alignCenter"},
                {
                    "mData": 'ide_persona',
                    "bSortable": false,
                    "bFilterable": false,
                    "width": "160px",
                    "mRender": function(o) {
                        return '<a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-warning btn-sm editEmpleado">Editar</a> <a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-danger btn-sm deleteEmpleado">Eliminar</a>';
                    }
                }
            ],
            fnDrawCallback: function() {
                $('.deleteEmpleado').click(function() {
                    me.confirmEliminaEmpleado($(this).attr('lang'));
                });

                $('.editEmpleado').click(function() {


                    //$("#myModalNuevoEmpleado").modal();
                   // me.loadCatalogo(7, 'selEstadoCivil');

                    //$("#myModalEditarEmpleadoLabel").html("Editar datos el Empleado");

                    $.ajax({
                        type: "POST",
                        url: me.prefixUrl+'personal/ajaxObtenerEmpleado',
                        sync:false,
                        data : {idePersona:$(this).attr('lang')},                      
                    })
					.done(function(response){
						
						  $("#myModalNuevoEmpleado").modal();
					   $("#myModalEditarEmpleadoLabel").html("Editar datos el Empleado");
					   
						 $('#desNombres').val(response.des_nombres);
                            $('#apePaterno').val(response.des_apepat);
                            $('#apeMaterno').val(response.des_apemat);
                            $('#desDocumento').val(response.nro_documento);
                            $('#fecNacimiento').val(me.formatoFecha(response.fec_nacimiento));
                            $('#desTelefono').val(response.des_telefono);
                            $('#desCorreo').val(response.des_correo);
                            //debugger;
                            //console.log($("#selEstadoCivil").html());
                            //debugger;
                            

                            //$("#selEstadoCivil").val(response.ide_estcivil);
                            //$("#selEstadoCivil option[value="+ response.ide_estcivil +"]").attr("selected",true);
							 $("#selEstadoCivil option[value='"+response.ide_estcivil+"']").attr('selected','selected');
								
					
					});
					
        			  
       			

                });
            }
        });

    },
    grabarEmpleado: function(){
        var me = this;
                       var empleado = new Object();

                       empleado['empleado[desNombres]'] = $('#desNombres').val();
                       empleado['empleado[apePaterno]'] = $('#apePaterno').val();
                       empleado['empleado[apeMaterno]'] = $('#apeMaterno').val();
                       empleado['empleado[desDocumento]'] = $('#desDocumento').val();
                       empleado['empleado[fecNacimiento]'] = $('#fecNacimiento').val();
                       empleado['empleado[desTelefono]'] = $('#desTelefono').val();
                       empleado['empleado[desCorreo]'] = $('#desCorreo').val();
                       empleado['empleado[ideSexo]'] = $('input:radio[name=stSexo]:checked').val();
                       empleado['empleado[ideEstadoCivil]'] = $('#selEstadoCivil').val();

                       $.ajax({
                            type: "POST",
                            url: me.prefixUrl+'personal/ajaxSaveEmpleado',
                            data: empleado,
                            success: function(response) {
                                console.log(response);
                                if (response.success) {
                                    coreFn.loadListadoEmpleados();
                                    coreFn.closeWin('myModalNuevoEmpleado');
                                } else {
                                    //$('#message_save_acta').find('strong').html(response.message);
                                    //$('#message_save_acta').show('fade');

                                }
                            }
                        });
    },
    loadCatalogo: function(ideCatalogo, componente){
        var me = this;

        $.ajax({
            type: "POST",
            url: me.prefixUrl+'admCatalogo/ajaxObtenerCatalogo',
            sync:false,
            data : {ideGrupoCatalogo:ideCatalogo},
            success: function(data) {
                var html = "";

                $("#"+componente).find("option").remove();
                $.each(data, function(index, value) {

                    html += '<option value="'+value.ide_elemento+'">'+value.des_nombre+'</option>';
                });

                $("#"+componente).html(html);

            },
            dataType: 'json'
        });
    
    },
    closeWin: function(id) {

        $('#' + id).modal('hide');

    },
    estadoEdit: false,
    initListadoEmpleados: function() {

        var me = this;
        $('#myModalNuevoEmpleado').on('hidden.bs.modal', function(e) {
            me.estadoEdit = false;
            $("#myModalEditarEmpleadoLabel").html("Nuevo Empleado");

           $("#empleadoForm").bootstrapValidator('resetForm', true);  
        });

       
        $('#myModalNuevoEmpleado').on('show.bs.modal', function(e) {
            console.log(e);
            if(!me.estadoEdit){
                //$("#empleadoForm")[0].reset();
                //$("#desNombres").val(null);
            }

            //me.loadCatalogo(7, 'selEstadoCivil');
            //$("#fecNacimiento").datepicker({});
        });

        $('.grabarEmpleado').click(function() {
            me.grabarEmpleado();
        });
        
        me.loadListadoEmpleados();
		me.loadCatalogo(7, 'selEstadoCivil');

    }
};
    