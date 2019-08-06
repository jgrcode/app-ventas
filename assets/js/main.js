// FUNCION PARA MOSTRAR VENTAS
function mostrarDatos() {
    $.ajax({
        url: "php/TablaVentas.php",
        success: function (respuesta) {
            $('#tablaVentas').html(respuesta);
        }
    });
}
// FUNCION PARA MOSTRAR VENTA BUSCADA
function mostrarDatosBuscados() {
    if ($('#inputNombreB').val().length < 1) {
        swal("Error:", "no ha ingresado el nombre del cliente", "error");
        return false;
    } 

    $.ajax({
        type: "POST",
        url: "php/Buscar.php",
        data: "inputNombreB="+$('#inputNombreB').val(),
        success: function (respuesta) {
            $('#tablaVentas').html(respuesta);
        }
    });
}
// FUNCION PARA GENERAR VENTA
function insertarVenta() {

    if ($('#inputNombre').val().length < 1) {
        swal("Error:", "no ha ingresado el nombre del cliente", "error");
        return false;
    } 

    if ($('#inputProducto').val().length < 1) {
        swal("Error:", "no ha ingresado un producto", "error");
        return false;
    }
    if ($('#inputDescripcion').val().length < 1) {
        swal("Error:", "no ha ingresado una descripción", "error");
        return false;
    }
    if ($('#inputCantidad').val().length < 1) {
        swal("Error:", "no ha ingresado una cantidad", "error");
        return false;
    }
    if ($('#inputTotal').val().length < 1) {
        swal("Error:", "no ha ingresado el total", "error");
        return false;
    }


    $.ajax({
        type: "POST",
        url: "php/Insertar.php",
        data: $('#formDatos').serialize(),
        success: function (response) {
           if(response == "ok"){
            swal("Venta exitosa:", "la venta se ha generado con éxito", "success")
            $('#formDatos')[0].reset();
            mostrarDatos();
           }
        }
    });
}
//FUNCION PARA AGREGAR DATOS AL FORMULARIO DE ACTUALIZACION DE LA VENTA
function agregarDatosParaActualizacion(idVenta) {
    $.ajax({
        type: "POST",
        data: "inputIdVenta=" + idVenta,
        url: "php/AgregarDatosFormulario.php",
        success: function (respuesta) {
            //CONVERTIMOS RESPUESTA A UN JSON
            var datos = $.parseJSON(respuesta);
            //SETIAR VALORES DEL FORMULARIO DE ACTUALIZACION
            $('#inputIdVenta').val(datos['idventa']);
            $('#inputNombreU').val(datos['nombre']);
            $('#inputProductoU').val(datos['producto']);
            $('#inputDescripcionU').val(datos['descripcion']);
            $('#inputCantidadU').val(datos['cantidad']);
            $('#inputTotalU').val(datos['total']);
        }
    });
}
// FUNCION PARA ACTUALIZAR LA VENTA
function actualizarDatos() {
     if ($('#inputNombreU').val().length < 1) {
        swal("Error:", "no ha ingresado el nombre del cliente", "error");
        return false;
    } 

    if ($('#inputProductoU').val().length < 1) {
        swal("Error:", "no ha ingresado un producto", "error");
        return false;
    }
    if ($('#inputDescripcionU').val().length < 1) {
        swal("Error:", "no ha ingresado una descripción", "error");
        return false;
    }
    if ($('#inputCantidadU').val().length < 1) {
        swal("Error:", "no ha ingresado una cantidad", "error");
        return false;
    }
    if ($('#inputTotalU').val().length < 1) {
        swal("Error:", "no ha ingresado el total", "error");
        return false;
    }


    $.ajax({
        type: "POST",
        url: "php/Actualizar.php",
        data: $('#formDatosA').serialize(),
        success: function (response) {
           if(response == "ok"){
            swal("Actualizacion exitosa:", "la venta se ha actualizado con éxito", "success")
            $('#formDatosA')[0].reset();
            mostrarDatos()
           }
        }
    });
}

// FUNCION PARA ELIMINAR LA  VENTA
function eliminarDatos(idVenta) {
    swal({
        title: "Estas seguro de eliminar este registro?",
        text: "Una vez que elimine este registro, no podra ser recuperado!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        data: "inputIdVenta=" + idVenta,
                        url: "php/Eliminar.php",
                        success: function (respuesta) {
                            if (respuesta == "ok") {
                                mostrarDatos(); // IMPRIMIR LA TABLA CON LOS DATOS NUEVOS INSERTADOS
                                swal("EXITO", "Al eliminar la venta", "success");
                            } else {
                                swal("ERROR", "Al eliminar", "error");
                            }
                        }
                    });
                }

            });
}