<?php
require_once 'Conexion.php';
/* 
 * PHP PARA ACTUALIZAR UNA VENTA
 */

// VARIABLES DE CONEXION
$conexion = new Conexion();
$conectar = $conexion->conectarDB();
$desconectar = $conexion->desconectarDB();

// DATOS RECIBIDOS
$idventa = isset($_POST['inputIdVenta']) ? $_POST['inputIdVenta'] : false;

// VALIDACION DE LOS DATOS
if ($idventa) {
    
    $sql = "CALL mostrarVentasF(:idventa)";
    $stmt = $conectar->prepare($sql);
    $stmt->bindParam(':idventa',$idventa, PDO::PARAM_INT);    
    $stmt->execute();

    //CONVERTIR EL RESULTADO A UN ARRAY ASOCIATIVO
    $datos = $stmt->fetch();
    //CONVERTIR ARRAY ASOCIATIVO EN UN JSON
    echo json_encode($datos);
}else{
    echo 'Error: data';
}


