<?php

/*
 * CLASE PARA CONECTAR ALA BASE DE DATOS
 * CONEXION MEDIANTE PDO
 */

/**
 *
 * @author JGRCODE
 */
class Conexion {
    
    private $mbd;
    private $host = "localhost";
    private $dbname = "bd_ventas";
    private $usuario = "root";
    private $password = "";
    
    function __construct() {
        
    }
    
    public function conectarDB() {
        try {
            $this->mbd = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->usuario, $this->password);
            return $this->mbd;
        } catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function desconectarDB() {
        $this->mbd = null;
    }
}



