<?php
class Conexion{
	static public function conectar(){
		$link = new PDO("mysql:host=207.210.232.61;dbname=edukappc_prod","eduka_admons","Wakanda1&_");
		$link->exec("set names utf8");
		return $link;	}
}