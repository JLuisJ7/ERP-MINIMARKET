var Util = {
    createGrid: function(id, options) {        
        var toolButons = options.toolButons || '';
        var extraOptions = options.extraOptions || {};

        var configGrid = {
            "destroy": true,
            "language": {
                "loadingRecords": '<img src="../../images/profile-loading.gif">',
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
        //console.log(datatable);
        return datatable;
    }
};

var coreFn = {
    loadListadoEmpleados: function(){
        var me = this;
        console.log("Estamos en listado empleados");
        Util.createGrid('#listaEmpleados',{
            toolButons:'<a style="display:inline-block;margin:-1px 0px 0px 0px;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalNuevoEmpleado">Nuevo Empleado</a>',
            url:'index.php/personal/ajaxListadoEmpleados',
            columns:[
                {"mData": "des_nombres", "sClass": "alignCenter"},
                {"mData": "fec_nacimiento", "sClass": "alignCenter"},
                {"mData": "nro_documento", "sClass": "alignCenter"},
                {"mData": "des_telefono", "sClass": "alignCenter"},
                {"mData": "des_correo", "sClass": "alignCenter"},
                {
                    "mData": 'ide_persona',
                    "bSortable": false,
                    "bFilterable": false,
                    "width": "110px",
                    "mRender": function(o) {
                        return '<a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-warning btn-sm editActa">Editar</a> <a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-danger btn-sm anularActa">Anular</a>';
                    }
                }
            ],
            fnDrawCallback: function() {

            }
        });
    },
    closeWin: function(id) {

        $('#' + id).modal('hide');

    },
    initListadoEmpleados: function() {

        var me = this;
       /* $('#myModalActa').on('hidden.bs.modal', function(e) {
            me.estadoEdit = false;
            $('#numeroActa').val('');
            $('#actatotalvotos').val('');
            $('#numeroActa').removeClass('error-input-invalido');
            $('#actatotalvotos').removeClass('error-input-invalido');
            $('#idActa').val('');
            $('.rowListGrupoActa').remove();
            $('#message_save_acta').hide();
        });

        $('#myModalActa').on('show.bs.modal', function(e) {
            if (!me.estadoEdit) {
                me.printGruposActa();
            }
        });

        $('.grabarActa').click(function() {
            me.grabarActa();
        });*/

        this.loadListadoEmpleados();

    }
};
    