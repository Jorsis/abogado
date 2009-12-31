<?php 
require_once("include/function.inc.php");

if ($_REQUEST['idcontent']) {
	echo listHtml($_REQUEST['idcontent']);
}


?>