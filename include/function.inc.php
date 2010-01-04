<?php
require_once('core.php');
$core = new Core();
$core->inicio();


function authUser(){
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Text to send if user hits Cancel button';
    exit;
}



function validUser($user, $password){
    global $core;
    
    $pwd =md5( $password );
    
    $sql = "SELECT * FROM user WHERE username = '{$user}' AND password = '{$pwd}'";
    $rs = $core->db->Execute($sql);
    
  /* $f = fopen("test", "w");
   fwrite($f, print_r($rs, true));
   fclose($f);
    */
    if (!$rs) {
    	return false;
    }else {
        if (0 < $rs->_numOfRows) {
        	return array($rs->fields['id'],
        	             $rs->fields['username'], 
        	             $rs->fields['rol'], 
        	             $rs->fields['firstname'], 
        	             $rs->fields['lastname'], 
        	             $rs->fields['phone'], 
        	             $rs->fields['email'], 
        	             $rs->fields['picture']);
        }else {
            return false;
        }
    }
}


function listHtml($id){
    global $core;
    
    $core->db->Execute('SET NAMES utf8');
    
    $sql = "SELECT * FROM html WHERE id = '{$id}'";
    $rs = $core->db->Execute($sql);
    
    return array(stripslashes($rs->fields['html']), $rs->fields['eval']);
}

?>