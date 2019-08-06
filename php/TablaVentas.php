<?php

/* 
 * PHP PARA MOSTRAR LA TABLA DE VENTAS
 */

require_once  'Conexion.php';
// VARIABLES DE CONEXION
$conexion = new Conexion();
$conectar = $conexion->conectarDB();



$sql = "CALL mostrarVentas()";
$query = $conectar->query($sql);
$query->setFetchMode(PDO::FETCH_ASSOC);
$tablaDatosVentas = "";
while ($dato = $query->fetch()) {
    $tablaDatosVentas.= '<tr>
                      <td>'.$dato['nombre'].'</td>
                      <td>'.$dato['producto'].'</td>
                      <td>'.$dato['descripcion'].'</td>
                      <td>'.$dato['cantidad'].'</td>
                      <td>'.$dato['total'].'</td>
                      <td><span  data-toggle="modal" data-target="#modalActualizar" class="btn btn-warning btn-sm" onclick="agregarDatosParaActualizacion('.$dato['idventa'].')"><i class="fas fa-pen-square"></i></span></td>
                      <td><span class="btn btn-danger btn-sm" onclick="eliminarDatos('.$dato['idventa'].')"><i class="fas fa-trash-alt"></i></span></td>
                   </tr>  ';
}
$conexion->desconectarDB();

echo '<table class="table">
                <thead>
                    <tr>
                        <th scope="col">Cliente</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Total a pagar</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                        '.$tablaDatosVentas.'
                </tbody>
            </table>';



