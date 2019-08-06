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
    
    $sql = "CALL borrarVenta(:idventa)";
    $stmt = $conectar->prepare($sql);
    $stmt->bindParam(':idventa',$idventa, PDO::PARAM_INT);
    
    $resultado = $stmt->execute();
    
    if ($resultado) {
        echo "ok";
    }else{
        echo "Error: sql";
    }
    
}else{
    echo 'Error: data';
}



