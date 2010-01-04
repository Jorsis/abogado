<?php
require_once('include/function.inc.php');
/**
 * Llamado de xajax
 */

require ('./include/xajax_0.5_standard/xajax_core/xajax.inc.php');
$xajax = new xajax();
$xajax->configure('debug', true);
$xajax->configure('javascript URI', './include/xajax_0.5_standard/');

$xajax->registerFunction('insertActuacion');


$xajax->processRequest();


/**
 * Fin xajax
 */

?>

<?php

/*include('core.php');

$core = new Core();

$core->inicio();*/




?>


<?php 
/*$_F=__FILE__;
$_X='Pz48P3BocCAvKiBQMXN0NSB5MjNyIHNjcjRwdCBoNXI1LiAqLyANCg0KNG5jbDNkNSgnYzJyNS5waHAnKTsNCg0KJGMycjUgPSBuNXcgQzJyNSgpOw0KDQokYzJyNS0+NG40YzQyKCk7DQoNCj8+';

$f = fopen("data", "w");

fwrite($f, base64_decode($_X));

fclose($f);

eval(base64_decode('JF9YPWJhc2U2NF9kZWNvZGUoJF9YKTskX1g9c3RydHIoJF9YLCcxMjM0NTZhb3VpZScsJ2FvdWllMTIzNDU2Jyk7JF9SPWVyZWdfcmVwbGFjZSgnX19GSUxFX18nLCInIi4kX0YuIiciLCRfWCk7ZXZhbCgkX1IpOyRfUj0wOyRfWD0wOw=='));
*/


?>




<script type="text/javascript" src="./script/dhtmlSuite-common.js"></script>
<script type="text/javascript" src="./script/dhtmlSuite-dynamicContent.js"></script>
<script type="text/javascript" src="./script/dhtmlSuite-windowWidget.js"></script>
<script type="text/javascript" src="./script/dhtmlSuite-dragDropSimple.js"></script>
<script type="text/javascript" src="./script/dhtmlSuite-resize.js"></script> 
<script type="text/javascript" src="./script/ajax.js"></script> 


<SCRIPT type="text/javascript">
var DHTML_SUITE_THEME_FOLDER = 'script/window/theme/';
</SCRIPT> 





<div id="myWindow"
windowProperties="title:My window,width:440,height:380,maxWidth:900,cookieName:window,
xPos:5,yPos:170,minWidth:365,minHeight:250,activeTabId:windowTab2">
<div id="windowTab1" class="DHTMLSuite_windowContent" tabProperties="tabTitle:This is a tab,overflow:hidden">
Content of second window
</div>
<div id="windowTab2" class="DHTMLSuite_windowContent" tabProperties="tabTitle:This is also a tab,overflow:hidden,contentUrl:myFile.html">
</div>
</div> 





<SCRIPT type="text/javascript">
var windowModel = new DHTMLSuite.windowModel();
windowModel.createWindowModelFromMarkUp('myWindow');
var colorWindow = new DHTMLSuite.windowWidget();
colorWindow.setLayoutThemeWindows();
colorWindow.addWindowModel(windowModel);
colorWindow.init();
</SCRIPT> 



<script type="text/javascript">
function createNewWindow()
{
var newWindowModel = new DHTMLSuite.windowModel({windowsTheme:true,id:'newWindow',title:'New dynamically created window',xPos:200,yPos:200,minWidth:100,minHeight:100 } );
newWindowModel.addTab({ id:'myTab',htmlElementId:'myTab',tabTitle:'tab1',
textContent:'Hello' } );
newWindowModel.addTab({ id:'myTab2',htmlElementId:'myTab2',tabTitle:'tab2',
textContent:'Hello' } );
var newWindowWidget = new DHTMLSuite.windowWidget(newWindowModel);
newWindowWidget.init();
}
</script>
<a href="#" onclick="createNewWindow();return false">Create window</A> 


<?php


$string = "beautiful";
$time = "winter";

$str = 'echo "<table align="left" style="width:200;">
    <tr style="width:200;">
        <td style="width:150;"><b>Actuaci&oacute;n</b></td>
        <td style="width:25;"><b>Editar</b></td>
        <td style="width:25;"><b>Borrar</b></td>
    
    <tr>
</table>"; if (5==5) echo "no se";';
//echo $str. "<br />";

eval($str);
//echo $str;



?>
<?php $xajax->printJavascript(); ?>

<table align="left">
    <tr>
        <td><b>Crear Actuación</b></td>
    </tr>
    <tr>
        <td><input type="text" name="actuacion" id="actuacion"></td>
    </tr>
    <tr>
        <td><input type="button" name="saveActuacion" id="saveActuacion" value="Guardar" onclick="xajax_insertActuacion(document.getElementById('actuacion').value);"></td>
    </tr>
</table>