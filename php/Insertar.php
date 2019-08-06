<?php
require_once 'Conexion.php';
/* 
 * PHP PARA INSERTAR UNA VENTA
 */

// VARIABLES DE CONEXION
$conexion = new Conexion();
$conectar = $conexion->conectarDB();
$desconectar = $conexion->desconectarDB();

// DATOS RECIBIDOS
$nombre = isset($_POST['inputNombre']) ? $_POST['inputNombre'] : false;
$producto = isset($_POST['inputProducto']) ? $_POST['inputProducto'] : false;
$descripcion = isset($_POST['inputDescripcion']) ? $_POST['inputDescripcion'] : false;
$cantidad = isset($_POST['inputCantidad']) ? $_POST['inputCantidad'] : false;
$total = isset($_POST['inputTotal']) ? $_POST['inputTotal'] : false;


// VALIDACION DE LOS DATOS
if ($nombre && $producto && $descripcion && $cantidad && $total) {
    
    $sql = "CALL insertarVenta(:nombre,:producto,:descripcion,:cantidad,:total)";
    $stmt = $conectar->prepare($sql);
    $stmt->bindParam(':nombre',$nombre,PDO::PARAM_STR);
    $stmt->bindParam(':producto',$producto,PDO::PARAM_STR);
    $stmt->bindParam(':descripcion',$descripcion,PDO::PARAM_STR);
    $stmt->bindParam(':cantidad',$cantidad);
    $stmt->bindParam(':total',$total);
    
    $resultado = $stmt->execute();
    
    if ($resultado) {
        echo "ok";
    }else{
        echo "Error: sql";
    }
    
}else{
    echo 'Error: data';
}





