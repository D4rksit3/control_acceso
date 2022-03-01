// DATA TABLE USUARIOS REMOTOS ADMINISTRADOR
$(document).ready(function() {
    TablaUsersRemoto = $('#TablaUsersRemoto').DataTable({

        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div'><div><button class='btn btn-primary btn-circle btn-sm btnEditar'>E</button><button class='btn btn-danger btn-circle btn-sm btnBorrar'>B</button></div></div>"
        }],

        language: {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        },
        //para usar los botones   
        responsive: "true",
        dom: 'Bfrtilp',
        buttons: [{
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf"></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i> ',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
        ]
    });

    $("#btnNuevo").click(function() {
        $("#usuariosRemotos").trigger("reset");
        $(".modal-header").css("background-color", "#28a745");
        $(".modal-title").text("Registrar Personal Home Office");
        $("#modalCRUD").modal("show");
        registros_id = null;
        opcion = 1; // alta
    });

    var fila; //captura la fila para editar o borrar registro

    // BOTON EDITAR
    $(document).on("click", ".btnEditar", function() {
        fila = $(this).closest("tr");
        registros_id = parseInt(fila.find('td:eq(0)').text());
        ip = fila.find('td:eq(1)').text();
        sistema_operativo = fila.find('td:eq(2)').text();
        nombres = fila.find('td:eq(3)').text();
        apellido_pa = fila.find('td:eq(4)').text();
        apellido_ma = fila.find('td:eq(5)').text();
        dni = fila.find('td:eq(6)').text();
        telefono = fila.find('td:eq(7)').text();
        campaña = fila.find('td:eq(8)').text();
        sub_campaña = fila.find('td:eq(9)').text();
        cargo = fila.find('td:eq(10)').text();
        vpn = fila.find('td:eq(11)').text();
        fecha = fila.find('td:eq(12)').text();
        tecnico = fila.find('td:eq(13)').text();

        $("#ip").val(ip);
        $("#sistema_operativo").val(sistema_operativo);
        $("#nombres").val(nombres);
        $("#apellido_pa").val(apellido_pa);
        $("#apellido_ma").val(apellido_ma);
        $("#dni").val(dni);
        $("#telefono").val(telefono);
        $("#campaña").val(campaña);
        $("#sub_campaña").val(sub_campaña);
        $("#cargo").val(cargo);
        $("#vpn").val(vpn);
        $("#fecha").val(fecha);
        $("#tecnico").val(tecnico);
        opcion = 2; // editar

        $(".modal-header").css("background-color", "#007bff");
        $(".modal-title").text("Editar Personal Home Office");
        $("#modalCRUD").modal("show");
    });

    // BOTON BORRAR
    $(document).on("click", ".btnBorrar", function() {
        fila = $(this);
        registros_id = $(this).closest("tr").find('td:eq(0)').text();
        opcion = 3; // borrar


        Swal.fire({
            title: 'Estas seguro?',
            text: "Los cambios no podran ser revertidos!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: "DB/crud.php",
                    type: "POST",
                    dataType: "json",
                    data: { opcion: opcion, registros_id: registros_id },
                    success: function() {
                        TablaUsersRemoto.row(fila.parents('tr')).remove().draw();
                    }
                });

                Swal.fire(
                    'Eliminado!',
                    'Operacion realizada correctamente',
                    'success'
                )
            }
        })
    });

    //REGISTRAR 

    $("#usuariosRemotos").submit(function(e) {
        e.preventDefault();
        ip = $.trim($("#ip").val());
        sistema_operativo = $.trim($("#sistema_operativo").val());
        nombres = $.trim($("#nombres").val());
        apellido_pa = $.trim($("#apellido_pa").val());
        apellido_ma = $.trim($("#apellido_ma").val());
        dni = $.trim($("#dni").val());
        telefono = $.trim($("#telefono").val());
        campaña = $.trim($("#campaña").val());
        sub_campaña = $.trim($("#sub_campaña").val());
        cargo = $.trim($("#cargo").val());
        vpn = $.trim($("#vpn").val());
        fecha = $.trim($("#fecha").val());
        tecnico = $.trim($("#tecnico").val());
        $.ajax({
            url: "DB/crud.php",
            type: "POST",
            dataType: "json",
            data: {
                ip: ip,
                sistema_operativo: sistema_operativo,
                nombres: nombres,
                apellido_pa: apellido_pa,
                apellido_ma: apellido_ma,
                dni: dni,
                telefono: telefono,
                campaña: campaña,
                sub_campaña: sub_campaña,
                cargo: cargo,
                vpn: vpn,
                fecha: fecha,
                tecnico: tecnico,
                registros_id: registros_id,
                opcion: opcion
            },
            success: function(data) {
                console.log(data);
                registros_id = data[0].registros_id;
                ip = data[0].ip;
                sistema_operativo = data[0].sistema_operativo;
                nombres = data[0].nombres;
                apellido_pa = data[0].apellido_pa;
                apellido_ma = data[0].apellido_ma;
                dni = data[0].dni;
                telefono = data[0].telefono;
                campaña = data[0].campaña;
                sub_campaña = data[0].sub_campaña;
                cargo = data[0].cargo;
                vpn = data[0].vpn;
                fecha = data[0].fecha;
                tecnico = data[0].tecnico;
                if (opcion == 1) { TablaUsersRemoto.row.add([registros_id, ip, sistema_operativo, nombres, apellido_pa, apellido_ma, dni, telefono, campaña, sub_campaña, cargo, vpn, fecha, tecnico]).draw(); } else { TablaUsersRemoto.row(fila).data([registros_id, ip, sistema_operativo, nombres, apellido_pa, apellido_ma, dni, telefono, campaña, sub_campaña, cargo, vpn, fecha, tecnico]).draw(); }
            }
        });
        $("#modalCRUD").modal("hide");
    });

});

// DATA TABLE USUARIOS REMOTOS SOPORTE
$(document).ready(function() {
    TablaUsersRemotoSoporte = $('#TablaUsersRemotoSoporte').DataTable({

        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div><div><button class='btn btn-primary btn-circle btn-sm btnEditar'>E</button><button class='btn btn-danger btn-circle btn-sm btnBorrar'>B</button></div></div>"
        }],


        language: {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        },
        //para usar los botones   
        responsive: "true",
        dom: 'Bfrtilp',
        buttons: [{
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf"></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i> ',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
        ]
    });

    $("#btnNuevo").click(function() {
        $("#usuariosRemotosSoporte").trigger("reset");
        $(".modal-header").css("background-color", "#28a745");
        $(".modal-title").text("Registrar Personal Home Office");
        $("#modalCRUD").modal("show");
        registros_id = null;
        opcion = 1; // alta
    });

    var fila; //captura la fila para editar o borrar registro

    // BOTON EDITAR
    $(document).on("click", ".btnEditar", function() {
        fila = $(this).closest("tr");
        registros_id = parseInt(fila.find('td:eq(0)').text());
        ip = fila.find('td:eq(1)').text();
        sistema_operativo = fila.find('td:eq(2)').text();
        nombres = fila.find('td:eq(3)').text();
        apellido_pa = fila.find('td:eq(4)').text();
        apellido_ma = fila.find('td:eq(5)').text();
        dni = fila.find('td:eq(6)').text();
        telefono = fila.find('td:eq(7)').text();
        campaña = fila.find('td:eq(8)').text();
        sub_campaña = fila.find('td:eq(9)').text();
        cargo = fila.find('td:eq(10)').text();
        vpn = fila.find('td:eq(11)').text();
        fecha = fila.find('td:eq(12)').text();
        tecnico = fila.find('td:eq(13)').text();

        $("#ip").val(ip);
        $("#sistema_operativo").val(sistema_operativo);
        $("#nombres").val(nombres)
        $("#apellido_pa").val(apellido_pa)
        $("#apellido_ma").val(apellido_ma)
        $("#dni").val(dni)
        $("#telefono").val(telefono)
        $("#campaña").val(campaña)
        $("#sub_campaña").val(sub_campaña)
        $("#cargo").val(cargo)
        $("#vpn").val(vpn)
        $("#fecha").val(fecha)
        $("#tecnico").val(tecnico)
        opcion = 2; // editar

        $(".modal-header").css("background-color", "#007bff");
        $(".modal-title").text("Editar Personal Home Office");
        $("#modalCRUD").modal("show");
    });

    //REGISTRAR 

    $("#usuariosRemotosSoporte").submit(function(e) {
        e.preventDefault();
        ip = $.trim($("#ip").val());
        sistema_operativo = $.trim($("#sistema_operativo").val());
        nombres = $.trim($("#nombres").val());
        apellido_pa = $.trim($("#apellido_pa").val());
        apellido_ma = $.trim($("#apellido_ma").val());
        dni = $.trim($("#dni").val());
        telefono = $.trim($("#telefono").val());
        campaña = $.trim($("#campaña").val());
        sub_campaña = $.trim($("#sub_campaña").val());
        cargo = $.trim($("#cargo").val());
        vpn = $.trim($("#vpn").val());
        fecha = $.trim($("#fecha").val());
        tecnico = $.trim($("#tecnico").val());
        $.ajax({
            url: "DB/crud.php",
            type: "POST",
            dataType: "json",
            data: {
                ip: ip,
                sistema_operativo: sistema_operativo,
                nombres: nombres,
                apellido_pa: apellido_pa,
                apellido_ma: apellido_ma,
                dni: dni,
                telefono: telefono,
                campaña: campaña,
                sub_campaña: sub_campaña,
                cargo: cargo,
                vpn: vpn,
                fecha: fecha,
                tecnico: tecnico,
                registros_id: registros_id,
                opcion: opcion
            },
            success: function(data) {
                console.log(data);
                registros_id = data[0].registros_id;
                ip = data[0].ip;
                sistema_operativo = data[0].sistema_operativo;
                nombres = data[0].nombres;
                apellido_pa = data[0].apellido_pa;
                apellido_ma = data[0].apellido_ma;
                dni = data[0].dni;
                telefono = data[0].telefono;
                campaña = data[0].campaña;
                sub_campaña = data[0].sub_campaña;
                cargo = data[0].cargo;
                vpn = data[0].vpn;
                fecha = data[0].fecha;
                tecnico = data[0].tecnico;
                if (opcion == 1) { TablaUsersRemotoSoporte.row.add([registros_id, ip, sistema_operativo, nombres, apellido_pa, apellido_ma, dni, telefono, campaña, sub_campaña, cargo, vpn, fecha, tecnico]).draw(); } else { TablaUsersRemotoSoporte.row(fila).data([registros_id, ip, sistema_operativo, nombres, apellido_pa, apellido_ma, dni, telefono, campaña, sub_campaña, cargo, vpn, fecha, tecnico]).draw(); }
            }
        });
        $("#modalCRUD").modal("hide");
    });

});

//DATA TABLE BITACORA CLARO ADMINISTRADOR
$(document).ready(function() {
    TablaBitacoraClaro = $('#TablaBitacoraClaro').DataTable({

        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div'><div><button class='btn btn-primary btn-circle btn-sm btnEditar2'>E</button><button class='btn btn-danger btn-circle btn-sm btnBorrar2'>B</button></div></div>"
        }],


        language: {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        },
        //para usar los botones   
        responsive: "true",
        dom: 'Bfrtilp',
        buttons: [{
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf"></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i> ',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
        ]
    });

    $("#btnNuevo2").click(function() {
        $("#bitacoraClaro").trigger("reset");
        $(".modal-header").css("background-color", "#28a745");
        $(".modal-title").text("Registrar Incidente");
        $("#modalCRUD").modal("show");
        bitacora_claro_id = null;
        opcion = 1; // alta
    });

    var fila; //captura la fila para editar o borrar registro

    // BOTON EDITAR
    $(document).on("click", ".btnEditar2", function() {
        fila = $(this).closest("tr");
        bitacora_claro_id = parseInt(fila.find('td:eq(0)').text());
        fecha = fila.find('td:eq(1)').text();
        hora = fila.find('td:eq(2)').text();
        remedy = fila.find('td:eq(3)').text();
        falla = fila.find('td:eq(4)').text();
        coordinador = fila.find('td:eq(5)').text();
        gestion = fila.find('td:eq(6)').text();
        campaña = fila.find('td:eq(7)').text();
        actividad = fila.find('td:eq(8)').text();
        descripcion = fila.find('td:eq(9)').text();
        asesor = fila.find('td:eq(10)').text();
        estado = fila.find('td:eq(11)').text();
        tecnico = fila.find('td:eq(12)').text();

        $("#fecha").val(fecha);
        $("#hora").val(hora);
        $("#remedy").val(remedy);
        $("#falla").val(falla);
        $("#coordinador").val(coordinador);
        $("#gestion").val(gestion);
        $("#campaña").val(campaña);
        $("#actividad").val(actividad);
        $("#descripcion").val(descripcion);
        $("#asesor").val(asesor);
        $("#estado").val(estado);
        $("#tecnico").val(tecnico);
        opcion = 2; // editar

        $(".modal-header").css("background-color", "#007bff");
        $(".modal-title").text("Editar Bitacora");
        $("#modalCRUD").modal("show");
    });

    // BOTON BORRAR
    $(document).on("click", ".btnBorrar2", function() {
        fila = $(this);
        bitacora_claro_id = $(this).closest("tr").find('td:eq(0)').text();
        opcion = 3; // borrar


        Swal.fire({
            title: 'Estas seguro?',
            text: "Los cambios no podran ser revertidos!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: "DB/crud_bitacora_claro.php",
                    type: "POST",
                    dataType: "json",
                    data: { opcion: opcion, bitacora_claro_id: bitacora_claro_id },
                    success: function() {
                        TablaBitacoraClaro.row(fila.parents('tr')).remove().draw();
                    }
                });

                Swal.fire(
                    'Eliminado!',
                    'Operacion realizada correctamente',
                    'success'
                )
            }
        })
    });

    //REGISTRAR 

    $("#bitacoraClaro").submit(function(e) {
        e.preventDefault();
        fecha = $.trim($("#fecha").val());
        hora = $.trim($("#hora").val());
        remedy = $.trim($("#remedy").val());
        falla = $.trim($("#falla").val());
        coordinador = $.trim($("#coordinador").val());
        gestion = $.trim($("#gestion").val());
        campaña = $.trim($("#campaña").val());
        actividad = $.trim($("#actividad").val());
        descripcion = $.trim($("#descripcion").val());
        asesor = $.trim($("#asesor").val());
        estado = $.trim($("#estado").val());
        tecnico = $.trim($("#tecnico").val());
        $.ajax({
            url: "DB/crud_bitacora_claro.php",
            type: "POST",
            dataType: "json",
            data: {
                fecha: fecha,
                hora: hora,
                remedy: remedy,
                falla: falla,
                coordinador: coordinador,
                gestion: gestion,
                campaña: campaña,
                actividad: actividad,
                descripcion: descripcion,
                asesor: asesor,
                estado: estado,
                tecnico: tecnico,
                bitacora_claro_id: bitacora_claro_id,
                opcion: opcion
            },
            success: function(data) {
                console.log(data);
                bitacora_claro_id = data[0].bitacora_claro_id;
                fecha = data[0].fecha;
                hora = data[0].hora;
                remedy = data[0].remedy;
                falla = data[0].falla;
                coordinador = data[0].coordinador;
                gestion = data[0].gestion;
                campaña = data[0].campaña;
                actividad = data[0].actividad;
                descripcion = data[0].descripcion;
                asesor = data[0].asesor;
                estado = data[0].estado;
                tecnico = data[0].tecnico;
                if (opcion == 1) { TablaBitacoraClaro.row.add([bitacora_claro_id, fecha, hora, remedy, falla, coordinador, gestion, campaña, actividad, descripcion, asesor, estado, tecnico]).draw(); } else { TablaBitacoraClaro.row(fila).data([bitacora_claro_id, fecha, hora, remedy, falla, coordinador, gestion, campaña, actividad, descripcion, asesor, estado, tecnico]).draw(); }
            }
        });
        $("#modalCRUD").modal("hide");
    });

});

//DATA TABLE BITACORA CLARO SOPORTE
$(document).ready(function() {
    TablaBitacoraClaroSoporte = $('#TablaBitacoraClaroSoporte').DataTable({

        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": ""
        }],


        language: {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        },
        //para usar los botones   
        responsive: "true",
        dom: 'Bfrtilp',
        buttons: [{
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf"></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i> ',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
        ]
    });

    $("#btnNuevo2").click(function() {
        $("#bitacoraClaroSoporte").trigger("reset");
        $(".modal-header").css("background-color", "#28a745");
        $(".modal-title").text("Registrar Incidente");
        $("#modalCRUD").modal("show");
        bitacora_claro_id = null;
        opcion = 1; // alta
    });

    var fila; //captura la fila para editar o borrar registro

    // BOTON EDITAR
    $(document).on("click", ".btnEditar2", function() {
        fila = $(this).closest("tr");
        bitacora_claro_id = parseInt(fila.find('td:eq(0)').text());
        fecha = fila.find('td:eq(1)').text();
        hora = fila.find('td:eq(2)').text();
        remedy = fila.find('td:eq(3)').text();
        falla = fila.find('td:eq(4)').text();
        coordinador = fila.find('td:eq(5)').text();
        gestion = fila.find('td:eq(6)').text();
        campaña = fila.find('td:eq(7)').text();
        actividad = fila.find('td:eq(8)').text();
        descripcion = fila.find('td:eq(9)').text();
        asesor = fila.find('td:eq(10)').text();
        estado = fila.find('td:eq(11)').text();
        tecnico = fila.find('td:eq(12)').text();

        $("#fecha").val(fecha);
        $("#hora").val(hora);
        $("#remedy").val(remedy);
        $("#falla").val(falla);
        $("#coordinador").val(coordinador);
        $("#gestion").val(gestion);
        $("#campaña").val(campaña);
        $("#actividad").val(actividad);
        $("#descripcion").val(descripcion);
        $("#asesor").val(asesor);
        $("#estado").val(estado);
        $("#tecnico").val(tecnico);
        opcion = 2; // editar

        $(".modal-header").css("background-color", "#007bff");
        $(".modal-title").text("Editar Bitacora");
        $("#modalCRUD").modal("show");
    });

    //REGISTRAR 

    $("#bitacoraClaroSoporte").submit(function(e) {
        e.preventDefault();
        fecha = $.trim($("#fecha").val());
        hora = $.trim($("#hora").val());
        remedy = $.trim($("#remedy").val());
        falla = $.trim($("#falla").val());
        coordinador = $.trim($("#coordinador").val());
        gestion = $.trim($("#gestion").val());
        campaña = $.trim($("#campaña").val());
        actividad = $.trim($("#actividad").val());
        descripcion = $.trim($("#descripcion").val());
        asesor = $.trim($("#asesor").val());
        estado = $.trim($("#estado").val());
        tecnico = $.trim($("#tecnico").val());
        $.ajax({
            url: "DB/crud_bitacora_claro.php",
            type: "POST",
            dataType: "json",
            data: {
                fecha: fecha,
                hora: hora,
                remedy: remedy,
                falla: falla,
                coordinador: coordinador,
                gestion: gestion,
                campaña: campaña,
                actividad: actividad,
                descripcion: descripcion,
                asesor: asesor,
                estado: estado,
                tecnico: tecnico,
                bitacora_claro_id: bitacora_claro_id,
                opcion: opcion
            },
            success: function(data) {
                console.log(data);
                bitacora_claro_id = data[0].bitacora_claro_id;
                fecha = data[0].fecha;
                hora = data[0].hora;
                remedy = data[0].remedy;
                falla = data[0].falla;
                coordinador = data[0].coordinador;
                gestion = data[0].gestion;
                campaña = data[0].campaña;
                actividad = data[0].actividad;
                descripcion = data[0].descripcion;
                asesor = data[0].asesor;
                estado = data[0].estado;
                tecnico = data[0].tecnico;
                if (opcion == 1) { TablaBitacoraClaroSoporte.row.add([bitacora_claro_id, fecha, hora, remedy, falla, coordinador, gestion, campaña, actividad, descripcion, asesor, estado, tecnico]).draw(); } else { TablaBitacoraClaroSoporte.row(fila).data([bitacora_claro_id, fecha, hora, remedy, falla, coordinador, gestion, campaña, actividad, descripcion, asesor, estado, tecnico]).draw(); }
            }
        });
        $("#modalCRUD").modal("hide");
    });

});

//DATA TABLE SOLICITUDES EQUIPOS ADMINISTRADOR
$(document).ready(function() {
    TablaSolicitudesEquipos = $('#TablaSolicitudesEquipos').DataTable({

        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div'><div><button class='btn btn-primary btn-circle btn-sm btnEditar3'>E</button><button class='btn btn-danger btn-circle btn-sm btnBorrar3'>B</button></div></div>"
        }],

        language: {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        },
        //para usar los botones   
        responsive: "true",
        dom: 'Bfrtilp',
        buttons: [{
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf"></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i> ',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
        ]
    });

    $("#btnNuevo3").click(function() {
        $("#solicitudesEquipos").trigger("reset");
        $(".modal-header").css("background-color", "#28a745");
        $(".modal-title").text("Registrar Solicitud de Prestamo");
        $("#modalCRUD").modal("show");
        solicitudes_equipos_id = null;
        opcion = 1; // alta
    });

    var fila; //captura la fila para editar o borrar registro

    // BOTON EDITAR
    $(document).on("click", ".btnEditar3", function() {
        fila = $(this).closest("tr");
        solicitudes_equipos_id = parseInt(fila.find('td:eq(0)').text());
        estado = fila.find('td:eq(1)').text();
        fecha = fila.find('td:eq(2)').text();
        nombre = fila.find('td:eq(3)').text();
        apellido_pa = fila.find('td:eq(4)').text();
        apellido_ma = fila.find('td:eq(5)').text();
        dni = fila.find('td:eq(6)').text();
        celular = fila.find('td:eq(7)').text();
        telefono = fila.find('td:eq(8)').text();
        direccion = fila.find('td:eq(9)').text();
        referecnia = fila.find('td:eq(10)').text();
        razon_social = fila.find('td:eq(11)').text();
        segmento = fila.find('td:eq(12)').text();
        campaña = fila.find('td:eq(13)').text();
        sub_campaña = fila.find('td:eq(14)').text();
        sede = fila.find('td:eq(15)').text();
        puesto = fila.find('td:eq(16)').text();
        equipo_prestamo = fila.find('td:eq(17)').text();
        solicitante = fila.find('td:eq(18)').text();

        $("#estado").val(estado);
        $("#fecha").val(fecha);
        $("#nombre").val(nombre);
        $("#apellido_pa").val(apellido_pa);
        $("#apellido_ma").val(apellido_ma);
        $("#dni").val(dni);
        $("#celular").val(celular);
        $("#telefono").val(telefono);
        $("#direccion").val(direccion);
        $("#referencia").val(referencia);
        $("#razon_social").val(razon_social);
        $("#segmento").val(segmento);
        $("#campaña").val(campaña);
        $("#sub_campaña").val(sub_campaña);
        $("#sede").val(sede);
        $("#puesto").val(puesto);
        $("#equipo_prestamo").val(equipo_prestamo);
        $("#solicitante").val(solicitante);
        opcion = 2; // editar

        $(".modal-header").css("background-color", "#007bff");
        $(".modal-title").text("Editar Solicitud");
        $("#modalCRUD").modal("show");
    });

    // BOTON BORRAR
    $(document).on("click", ".btnBorrar3", function() {
        fila = $(this);
        solicitudes_equipos_id = $(this).closest("tr").find('td:eq(0)').text();
        opcion = 3; // borrar


        Swal.fire({
            title: 'Estas seguro?',
            text: "Los cambios no podran ser revertidos!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: "DB/crud_solicitudes_equipos.php",
                    type: "POST",
                    dataType: "json",
                    data: { opcion: opcion, solicitudes_equipos_id: solicitudes_equipos_id },
                    success: function() {
                        TablaSolicitudesEquipos.row(fila.parents('tr')).remove().draw();
                    }
                });

                Swal.fire(
                    'Eliminado!',
                    'Operacion realizada correctamente',
                    'success'
                )
            }
        })
    });

    //REGISTRAR 

    $("#solicitudesEquipos").submit(function(e) {
        e.preventDefault();
        estado = $.trim($("#estado").val());
        fecha = $.trim($("#fecha").val());
        nombre = $.trim($("#nombre").val());
        apellido_pa = $.trim($("#apellido_pa").val());
        apellido_ma = $.trim($("#apellido_ma").val());
        dni = $.trim($("#dni").val());
        celular = $.trim($("#celular").val());
        telefono = $.trim($("#telefono").val());
        direccion = $.trim($("#direccion").val());
        referencia = $.trim($("#referencia").val());
        razon_social = $.trim($("#razon_social").val());
        segmento = $.trim($("#segmento").val());
        campaña = $.trim($("#campaña").val());
        sub_campaña = $.trim($("#sub_campaña").val());
        sede = $.trim($("#sede").val());
        puesto = $.trim($("#puesto").val());
        equipo_prestamo = $.trim($("#equipo_prestamo").val());
        solicitante = $.trim($("#solicitante").val());
        $.ajax({
            url: "DB/crud_solicitudes_equipos.php",
            type: "POST",
            dataType: "json",
            data: {
                estado: estado,
                fecha: fecha,
                nombre: nombre,
                apellido_pa: apellido_pa,
                apellido_ma: apellido_ma,
                dni: dni,
                celular: celular,
                telefono: telefono,
                direccion: direccion,
                referencia: referencia,
                razon_social: razon_social,
                segmento: segmento,
                campaña: campaña,
                sub_campaña: sub_campaña,
                sede: sede,
                puesto: puesto,
                equipo_prestamo: equipo_prestamo,
                solicitante: solicitante,
                solicitudes_equipos_id: solicitudes_equipos_id,
                opcion: opcion
            },
            success: function(data) {
                console.log(data);
                solicitudes_equipos_id = data[0].solicitudes_equipos_id;
                estado = data[0].estado;
                fecha = data[0].fecha;
                nombre = data[0].nombre;
                apellido_pa = data[0].apellido_pa;
                apellido_ma = data[0].apellido_ma;
                dni = data[0].dni;
                celular = data[0].celular;
                telefono = data[0].telefono;
                direccion = data[0].direccion;
                referencia = data[0].referencia;
                razon_social = data[0].razon_social;
                segmento = data[0].segmento;
                campaña = data[0].campaña;
                sub_campaña = data[0].sub_campaña;
                sede = data[0].sede;
                puesto = data[0].puesto;
                equipo_prestamo = data[0].equipo_prestamo;
                solicitante = data[0].solicitante;
                if (opcion == 1) { TablaSolicitudesEquipos.row.add([solicitudes_equipos_id, estado, fecha, nombre, apellido_pa, apellido_ma, dni, celular, telefono, direccion, referencia, razon_social, segmento, campaña, sub_campaña, sede, puesto, equipo_prestamo, solicitante]).draw(); } else { TablaSolicitudesEquipos.row(fila).data([solicitudes_equipos_id, estado, fecha, nombre, apellido_pa, apellido_ma, dni, celular, telefono, direccion, referencia, razon_social, segmento, campaña, sub_campaña, sede, puesto, equipo_prestamo, solicitante]).draw(); }
            }
        });
        $("#modalCRUD").modal("hide");
    });

});

// DATA TABLE MAPEO
$(document).ready(function() {
    example = $('#example').DataTable({
        language: {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        },
        //para usar los botones   
        responsive: "true",
        dom: 'Bfrtilp',
        buttons: [{
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf"></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i> ',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
        ]
    });

});