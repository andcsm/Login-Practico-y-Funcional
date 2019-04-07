<?php
	/*
		Este archivo sera utilizado cada ves que se requiera
		datos alojados en la basde de datos.
	*/
	class Conexion extends mysqli {
		public function __construct() {
			parent::__construct('localhost','root','rootroot','logindb');
			$this->query("SET NAMES 'utf8';");
			$this->connect_errno ? die('Error con la Conexion '.mysqli_connect_error()) : $x = 'Conectado';
			unset($x);
		}
	}
?>
