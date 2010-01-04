<?php
require_once('core.php');
$core = new Core();
$core->inicio();

/**
 * call Auth
 *
 */
function authUser(){
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Text to send if user hits Cancel button';
    exit;
}


/**
 * Check if user is valid
 *
 * @param String $user
 * @param String $password
 * @return Array
 */
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

/**
 * call content html 
 *
 * @param int $id
 * @return Array
 */
function listHtml($id){
    global $core;
    
    $core->db->Execute('SET NAMES utf8');
    
    $sql = "SELECT * FROM html WHERE id = '{$id}'";
    $rs = $core->db->Execute($sql);
    
    return array(stripslashes($rs->fields['html']), $rs->fields['eval']);
}


/**
 * Start Block Actuacion
 */

/**
 * Search Actuacion
 *
 * @param int $idActuacion
 * @return Array
 */
function getActuacion($idActuacion){
    global $core;
    
    $sql = "SELECT * FROM actuacion WHERE id = '{$idActuacion}'";
    $rs = $core->db->Execute($sql);
    
    return $rs->fields;
}

/**
 * Insertt value in actuacion
 *
 * @param Atring $actuacion
 * @return Object
 */
function insertActuacion($actuacion){
    global $core;
    $objResponse = new xajaxResponse();
    
    if (empty($actuacion) || $actuacion == '') {
    	$objResponse->alert('Debe ingresar un valor');
    }else {
        $sql = "INSERT INTO actuacion (name) VALUES ('{$actuacion}')";
        if ($core->db->Execute($sql) === false) {
            $objResponse->alert('Hubo un problema ingresando la información');    
        }else {
            $objResponse->alert('Información ingresada con exito');
        }
    }
    
    return $objResponse;
}

/**
 * Put field to update
 *
 * @param int $idActuacion
 * @return Object
 */
function EditFieldActuacion($idActuacion){
    $objResponse = new xajaxResponse();
    
    $value = getActuacion($idActuacion);
    
    $field = "<input type='text' name='actuacion{$value['id']}' id='actuacion{$value['id']}' value='{$value['name']}'>";
    
    $button .= "<input type='button' style='width:24;height:24;background: transparent url(./icon/save.png) no-repeat center right;' name='guardar{$value['id']}}' id='guardar{$value['id']}}' onclick='xajax_editActuacion(\"{$value['id']}\", document.getElementById(\"actuacion{$value['id']}\").value)' >";
    $button .= "&nbsp;<input type='button' style='width:24;height:24;background: transparent url(./icon/cancel.png) no-repeat center right;' name='cancelar{$value['id']}}' id='cencelar{$value['id']}}' onclick='xajax_returnValueActuacion(\"{$value['id']}\")' >";
    
    $objResponse->assign('textActuacion' . $idActuacion, 'innerHTML', $field);
    $objResponse->assign('editActuacion' . $idActuacion, 'innerHTML', $button);
    
    return $objResponse;
}

function returnValueActuacion($idActuacion){
    $objResponse = new xajaxResponse();
    
    $value = getActuacion($idActuacion);
    
    $button = '<input type="button" name="editarActuacion' . $value['id'] .'" id="editarActuacion' . $value['id'] .'" 
style="width:24;height:24;background: transparent url(./icon/edit.png) no-repeat center;" onclick="xajax_EditFieldActuacion(\''. $value['id'] .'\')" >';
    
    
    $objResponse->assign('textActuacion' . $idActuacion, 'innerHTML', $value['name']);
    $objResponse->assign('editActuacion' . $idActuacion, 'innerHTML', $button);
    
    return $objResponse;
}

function editActuacion($idActuacion, $name){
    global $core;
    $objResponse = new xajaxResponse();
    
    $sql = "UPDATE actuacion SET name = '{$name}' WHERE id = '{$idActuacion}'";
    if ($core->db->Execute($sql) === false) {
        $objResponse->alert('Hubo un problema al editar la información');    
    }else {
        $objResponse->alert('El registro fue editado con exito'); 
        $objResponse->call("xajax_returnValueActuacion('{$idActuacion}')");
    }
    
    return $objResponse;
}


function deleteActuacion($idActuacion){
    $objResponse = new xajaxResponse();
    
    $value = getActuacion($idActuacion);
    
    $objResponse->confirmCommands(1,'¿Realmente desea borrar ' . $value['name'] . '?');
    $objResponse->call("xajax_confirmDeleteActuacion('{$idActuacion}')");
    
    return $objResponse;
}


function confirmDeleteActuacion($idActuacion){
    global $core;
    $objResponse = new xajaxResponse();
    
    $sql = "DELETE FROM actuacion WHERE id = '{$idActuacion}'";
    if ($core->db->Execute($sql) === false) {
        $objResponse->alert('Hubo un problema al borrar la información');    
    }else {
        $objResponse->alert('El registro fue borrado con exito'); 
        $objResponse->remove('trActuacion' . $idActuacion);
    }
    
    return $objResponse;
}

/**
 * End Block Actuacion
 */

?>