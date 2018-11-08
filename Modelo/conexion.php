<?php
    
    class Conexion{
//        private $dbtype;
//        private $host;
//        private $user;
//        private $password;
//        private $dbname;
//        private $charset;
//        private $options;
//        
//        public function __construct() {
//            $db_cfg = require_once 'Config/data_db.ini.php';
//            
//            $this->dbtype = $db_cfg["dbtype"];
//            $this->host = $db_cfg["host"];
//            $this->user = $db_cfg["user"];
//            $this->password = $db_cfg["password"];
//            $this->dbname = $db_cfg["dbname"];
//            $this->charset = $db_cfg["charset"];
//            $this->options= "";
//        }
//        
//        static public function Conectar(){
//            $link = '"'.$this->dbtype.':host='.$this->host.';dbname='.$this->dbname.'"';
//            $conexion = new PDO($link, $this->user, $this->password);
//            $conexion->exec("set names '".$this->charset."'");
//            
//            return $conexion;
//        }
        
        static public function Conectar(){

		$dsn = 'mysql:host=localhost;dbname=porton_azul';
		$username = 'root';
		$password = '';
		$options = [];

		$conexion = new PDO($dsn, $username, $password, $options);
		$conexion->exec("set names utf8");

		return $conexion;

	}
        
        
    }
    
?>