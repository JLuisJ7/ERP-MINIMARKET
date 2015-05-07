var User = {
    createGrid: function(id, options) {

        var toolButons = options.toolButons || '';
        var extraOptions = options.extraOptions || {};

        var configGrid = {
            "destroy": true,
            "language": {
                "loadingRecords": '<img src="resources/images/profile-loading.gif" width="60px" height="60px">',
                "zeroRecords": "No se Encontraron Resultados",
                paginate: {
                    "next": "Siguiente"
                  , "previous": "Anterior"
                }
                , "search": ""
                        , searchPlaceholder: 'Buscar..'
                        , "info": '<div style="margin:0px 0px 0px 0px;">Mostrando p&aacute;gina _PAGE_ de _PAGES_</div>'
                        , "infoEmpty": "No se encontraron resultados"
                        , "lengthMenu": '<div> ' + toolButons +
                        '<select style="display:inline-block;margin-top:0px;margin-left:5px;padding:6px;border:1px #E1E1E1 solid;">' +
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
                "dataSrc": 'data' || options.dataSrc
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

var coreFn = {
    //tablePersona: null,
    
    confirmEliminarUsuario: function(usuario) {
        debugger;
        var me = usuario;
        $.ajax({
            type: "POST",
            url: 'deleteusuario',
            data: {idUsuario: me.value},
            success: function(response) {
               
                $('#dialogUsuarioModal').modal('hide');
                coreFn.loadListUser();
            }
        });

    },
    loadListUser: function() {
        var me = this;
        

        $(document).on("click", ".editarEmpleado", function(e) {
            var codEmpleado = $(this).attr('href');
            console.log("IDE_EMPLEADO="+codEmpleado);

            jQuery.ajax({
                url: 'index.php?r=personal/ajaxObtenerEmpleado',
                type: "POST",
                async:false,
                data : {idePersona: codEmpleado},
                success: function(resp){
                    var data = resp.salida;
                    var deta = resp.detalle;
                    //console.log(data);
                    $("#desNombres").val(data.des_nombres);
                    $("#desDocumento").val(data.nro_documento);
                    $("#fecNacimiento").val(data.fec_nacimiento);
                    $("#desTelefono").val(data.des_telefono);  
                    $("#desCorreo").val(data.des_correo);
                    //console.log("IDE SEXO="+data.ide_sexo);
                    if (data.ide_sexo + "" == "21") {
                        $('#idsexomasculino').prop('checked', true);
                        $('#idsexomasculino').parent().addClass("active");
                        $('#idsexofemenino').parent().removeClass("active");
                    } else {
                        $('#idsexofemenino').prop('checked', true);
                        $('#idsexofemenino').parent().addClass("active");
                        $('#idsexomasculino').parent().removeClass("active");
                    }
                    
                    me.cargaCatalogo(7, 'selEstadoCivil', data.ide_estcivil);
                }
            });

            e.preventDefault();
        });


    },
    cargaCatalogo: function(ideCatalogo, componente, compara){
        jQuery.ajax({
            url: 'index.php?r=admCatalogo/traeCatalogo',
            type: "POST",
            async:false,
            data : {ideGrupo:ideCatalogo},
            success: function(resp){
                var html = "";

                $.each(resp.output,function(index, value){
                    html += '<option value="'+value.ide_elemento+'" '+(value.des_nombre==compara?'selected':'')+'>'+value.des_nombre+'</option>';
                });

                $("#"+componente).html(html);
            }
        });
    },
    closeWin: function(id) {
        $('#' + id).modal('hide');
        this.loadListUser();

    },
    estadoEdit: false,
    initUsers: function() {

        var me = this;
       $('#myModalUsuario').on('hidden.bs.modal', function(e) {
            me.estadoEdit = false;
            $('#usuarioForm')[0].reset();
            $('#idSegusuario').val(null);
//            $('#desprecio').val('');
//            $('#desdescripcion').val('');
       
        });
       
        $('#myModalUsuario').on('show.bs.modal', function(e) {
            if (!me.estadoEdit) {
                 $('#usuarioForm')[0].reset();
                 $('#idSegusuario').val(null);
            }
        });


        this.loadListUser();

    },
  //VALIDAR FORMULARIO
    validar: function () {
        
        //$('#mensaje-succes-usuario-div').hide();
        $('#mensaje-succes-usuario-div').removeAttr('style')
        //$('#mensaje-succes-usuario-div').css({"display":"none"});
        //.removeClass('selectedRowTable');
        
        $('#usuarioForm')       
        .bootstrapValidator(
                {
                    message : 'This value is not valid',
                    feedbackIcons : {
                        valid : 'glyphicon glyphicon-ok',
                        invalid : 'glyphicon glyphicon-remove',
                        validating : 'glyphicon glyphicon-refresh'
                    },
                    fields : {
                        
                        
                        desUsername : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el usuario'
                                }
                            }
                        },
                        
                        
                        desPassword : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar la constrase&ntilde;a'
                                }
                            }
                        },
                        
                        desNombres : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el Nombre'
                                }
                            }
                        },
                        
                        desApPaterno : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el apellido paterno es requerido'
                                }
                            }
                        },
                        desApMaterno : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el apellido materno es requerido'
                                }
                            }
                        },
                        desEmail : {
                            validators : {
                                notEmpty : {
                                    message : 'Debe ingresar el email'
                                }
                            }
                        }


                    },
                    submitHandler : function(form) {

                        var usuario = new Object();
                        var idUsuario=null;
                        
                        if($('#idSegusuario').val()!=null && $('#idSegusuario').val()!=''){
                            idUsuario=$('#idSegusuario').val();
                        }
                        
                        var data = {
                            desUsername : $('#desUsername').val(),
                            desPassword : $('#desPassword').val(),
                            desNombres : $('#desNombres').val(),
                            desApPaterno : $('#desApPaterno').val(),
                            desApMaterno : $('#desApMaterno').val(),
                            stSexo : $('#stSexo').val(),
                            desEmail : $('#desEmail').val(),
                            idSegusuario:idUsuario};
                        
                        
                        $.ajax({
                            url : 'saveusuario',
                            data : JSON.stringify(data),
                            type : 'POST',
                            dataType : "json",
                            contentType: "application/json; charset=utf-8",
                            success : function(resp) {
                            
                                if (resp.Result=='OK') {
                                    $('#usuarioForm').bootstrapValidator('resetForm',true);
                                    $('#mensaje-succes-usuario-div').show();
                                    $('#mensaje-succes-usuario-div').addClass('alert alert-success');
                                    $('#mensaje-succes-usuario').html(resp.message);
                                    setTimeout("mensaje()", 80000);
                                    $('#myModalUsuario').modal('hide');
                                    coreFn.loadListUser();
                                } else {
                                    $('#mensaje-succes-usuario-div').addClass('alert alert-danger');
                                    $('#mensaje-succes-usuario').html(resp.message);
                                    $('#mensaje-succes-usuario-div').show();
                                }
                            }
                        });

                    }
                });

    }
    
    

};

