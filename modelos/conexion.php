<?php

class Conexion{
  static public function conectar(){
    $hostname = "127.0.0.1";
    $db = "certificados";
    $username = "root";
    $password = "";

    $link = new PDO("mysql:host=$hostname;dbname=$db","$username","$password");
    try {
      $link->exec("set names utf8");
      return $link;
    }
    catch(PDOException $e) {
        echo "error";
    }

  }
}
