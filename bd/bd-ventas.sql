/* 
 *BASE DE DATOS PARA LA APP DE VENTAS
 */
/**
 * Author:  JGRCODE
 * Created: 2 ago 2019
 */
DROP DATABASE IF EXISTS bd_ventas;

CREATE DATABASE IF NOT EXISTS bd_ventas 
CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci;

USE bd_ventas;

-- TABLA DE VENTAS
CREATE TABLE tb_ventas(
    idventa INTEGER UNSIGNED  PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(150) NOT NULL,
    producto VARCHAR(150) NOT NULL,
    descripcion VARCHAR(200) NOT NULL,
    cantidad DOUBLE NOT NULL,
    total DOUBLE NOT NULL
);

/*PROCEDIMIENTO ALMACENADO PARA INSERTAR VENTA */
DELIMITER //
CREATE PROCEDURE insertarVenta(nombreP VARCHAR(150),productoP VARCHAR(150),descripcionP VARCHAR(200),cantidadP DOUBLE,totalP DOUBLE)
BEGIN
INSERT INTO tb_ventas(nombre,producto,descripcion,cantidad,total)VALUES(nombreP,productoP,descripcionP,cantidadP,totalP);
END//
DELIMITER ;

/*PROCEDIMIENTO ALMACENADO PARA ACTUALIZAR VENTA*/
DELIMITER //
CREATE PROCEDURE actualizarVenta(nombreP VARCHAR(150),productoP VARCHAR(150),descripcionP VARCHAR(200),cantidadP DOUBLE,totalP DOUBLE, idventaP INT)
BEGIN
UPDATE tb_ventas SET nombre = nombreP,
                     producto = productoP,
                     descripcion = descripcionP,
                     cantidad = cantidadP,
                     total = totalP
WHERE idventa = idventaP;
END//
DELIMITER ;

/*PROCEDIMIENTO ALMACENADO PARA BORRAR VENTAS*/
DELIMITER //
CREATE PROCEDURE borrarVenta(idventaP INT)
BEGIN
DELETE FROM tb_ventas WHERE idventa = idventaP;
END//
DELIMITER ;

/*PROCEDIMIENTO ALMACENADO PARA MOSTRAR VENTAS*/
DELIMITER //
CREATE PROCEDURE mostrarVentas()
BEGIN
SELECT * FROM tb_ventas;
END//
DELIMITER ;

/*PROCEDIMIENTO ALMACENADO PARA MOSTRAR VENTAS CON ID INDICADO*/
DELIMITER //
CREATE PROCEDURE mostrarVentasF(idventaP INT)
BEGIN
SELECT * FROM tb_ventas WHERE idventa = idventaP;
END//
DELIMITER ;

/*PROCEDIMIENTO ALMACENADO PARA BUSCAR VENTA*/
DELIMITER //
CREATE PROCEDURE buscarVentas(nombreB VARCHAR(100))
BEGIN
SELECT * FROM tb_ventas WHERE nombre LIKE CONCAT("%",palabra,"%");
END//
DELIMITER ;





