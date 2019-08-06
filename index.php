<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CRUD de ventas </title>

        <!-- CDN BOOTSTRAP 4-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- CDN FONTAWESOME-->
        <link href="libs/fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="libs/fontawesome/css/brands.css" rel="stylesheet">
        <link href="libs/fontawesome/css/solid.css" rel="stylesheet">
        <!-- CDN SWEETALERT-->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- ESTILOS CSS-->
        <link rel="stylesheet" href="assets/css/main.css">
    </head>

    <body onload="   mostrarDatos();">

        <header>
            <div class="container">
                <div class="logo">
                    <img src="assets/img/logo.png" alt="" class="img-fluid">
                </div>
                <input type="text" class="form-control" name="inputNombreB" id="inputNombreB" placeholder="BUSCAR CLIENTE" >
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn-agregar"  data-toggle="collapse" data-target="#agregarVenta" aria-expanded="false" aria-controls="agregarVenta"> <span>+</span> Agregar
                            venta</button>
                    </div>
                    <div class="col-md-3">
                        <div class="caja-buscar">
                            <button onclick="mostrarDatosBuscados()" class="btn-buscar">Buscar</button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="caja-buscar">
                            <button onclick="mostrarDatos()" class="btn-buscar">Ver clientes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--CAJA DE AGREGAR DATOS DE VENTA-->
            <div class="collapse" id="agregarVenta">
                <div class="container mt-3">
                    <form id="formDatos">
                        <input type="text" class="form-control" name="inputNombre" id="inputNombre"
                               placeholder="NOMBRE DEL CLIENTE">
                        <input type="text" class="form-control" name="inputProducto" id="inputProducto"
                               placeholder="NOMBRE DEL PRODUCTO">
                        <input type="text" class="form-control" name="inputDescripcion" id="inputDescripcion"
                               placeholder="DESCRIPCIÓN DEL PRODUCTO">
                        <input type="number" class="form-control" name="inputCantidad" id="inputCantidad"
                               placeholder="CANTIDAD">
                        <input type="number" class="form-control" name="inputTotal" id="inputTotal"
                               placeholder="TOTAL A PAGAR">
                        <button type="button" class="btn btn-danger btn-sm mt-1 w-100" data-dismiss="modal" onclick="insertarVenta()">Guardar
                            venta</button>
                    </form>
                </div>
            </div>

            <!--MODAL DE ACTUALIZAR DATOS DE VENTA-->
            <div class="modal fade" id="modalActualizar" tabindex="-1" role="dialog" aria-labelledby="modalActualizar" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalActualizar">Actualizar venta</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formDatosA">
                                <input type="hidden" id="inputIdVenta" name="inputIdVenta">
                                <input type="text" class="form-control" name="inputNombreU" id="inputNombreU"
                                       placeholder="NOMBRE DEL CLIENTE">
                                <input type="text" class="form-control" name="inputProductoU" id="inputProductoU"
                                       placeholder="NOMBRE DEL PRODUCTO">
                                <input type="text" class="form-control" name="inputDescripcionU" id="inputDescripcionU"
                                       placeholder="DESCRIPCIÓN DEL PRODUCTO">
                                <input type="number" class="form-control" name="inputCantidadU" id="inputCantidadU"
                                       placeholder="CANTIDAD">
                                <input type="number" class="form-control" name="inputTotalU" id="inputTotalU"
                                       placeholder="TOTAL A PAGAR">


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm " data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-danger btn-sm " data-dismiss="modal" onclick="actualizarDatos()" >Actualizar venta</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main>

            <div class="container">
                <div id="tablaVentas">

                </div>
            </div>

        </main>


        <footer>
            <p class="lead text-center text-uppercase">App desarrollada por <a href="https://www.facebook.com/jgrcode/">jgrcode</a></p>
        </footer>






        <!-- CDN JQUERY-->
        <script src="https://code.jquery.com/jquery-3.4.1.js"
                integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
        </script>
        <script src="assets/js/main.js"></script>

        

                       
                             
         
        <!-- SCRIPTS BOOTSTRAP 4-->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
    </body>

</html>
