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
$nombre = isset($_POST['inputNombreU']) ? $_POST['inputNombreU'] : false;
$producto = isset($_POST['inputProductoU']) ? $_POST['inputProductoU'] : false;
$descripcion = isset($_POST['inputDescripcionU']) ? $_POST['inputDescripcionU'] : false;
$cantidad = isset($_POST['inputCantidadU']) ? $_POST['inputCantidadU'] : false;
$total = isset($_POST['inputTotalU']) ? $_POST['inputTotalU'] : false;
$idventa = isset($_POST['inputIdVenta']) ? $_POST['inputIdVenta'] : false;

// VALIDACION DE LOS DATOS
if ($nombre && $producto && $descripcion && $cantidad && $total && $idventa) {
    
    $sql = "CALL actualizarVenta(:nombre,:producto,:descripcion,:cantidad,:total,:idventa)";
    $stmt = $conectar->prepare($sql);
    $stmt->bindParam(':nombre',$nombre,PDO::PARAM_STR);
    $stmt->bindParam(':producto',$producto,PDO::PARAM_STR);
    $stmt->bindParam(':descripcion',$descripcion,PDO::PARAM_STR);
    $stmt->bindParam(':cantidad',$cantidad);
    $stmt->bindParam(':total',$total);
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





