<?php 
require_once("include/function.inc.php");

if ($_REQUEST['idcontent']) {
	$html = listHtml($_REQUEST['idcontent']);
	if (0 == $html[1]) {
		echo $html[0];
	}else {
	    eval("\$str = \"$html[0]\";");
        echo $str. "\n";
	}
}else {
    echo "Hubo un problema al tratar de cargar la información";
}


?>