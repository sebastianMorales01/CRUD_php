<?php

namespace models;

class Conexion{
    public static $user = "uxccglckrl86tgkl";
    public static $pass = "WpLIpyKPIFkqnjzUq6o1";
    public static $URL = "mysql:host=bbupa6oqevpycgoqg48m-mysql.services.clever-cloud.com;dbname=bbupa6oqevpycgoqg48m";

    public static function conector(){
        try {
            return new \PDO(Conexion::$URL, Conexion::$user, Conexion::$pass);
        } catch (\PDOException $e) {
            return null;
        }
    }
}

?>