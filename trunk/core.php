<?

include_once("config.inc.php");

class Core {
    var $db;
    
    var $debugdb = false;
    
    function inicio(){
        $this->db = $this->db();
    }
    
    /**
     * Conexion con la base de datos
     *
     * @return unknown
     */
    private function db(){
        global $dbconfig;
        
        include("include/adodb5/adodb-exceptions.inc.php"); 
	    include("include/adodb5/adodb.inc.php");	 
	    try { 
		  $db = NewADOConnection($dbconfig['type']); 
		  $db->Connect($dbconfig['hostname'],$dbconfig['username'],$dbconfig['password'], $dbconfig['dbname']); 
		  $db->debug = $this->debugdb;
	    } catch (exception $e) { 
	        echo "<pre>";
		  var_dump($e); 
		  die();
	    } 
	    
	    return $db;
    }
}

?>