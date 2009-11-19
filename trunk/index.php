<?

$dirtemplate = "./template/solutions/";
require_once('core.php');
require_once('menu.php');

/**
 * llamado de Script
 */
?>
<!-- Ventanas -->
<script type="text/javascript" src="./script/dhtmlSuite-common.js"></script>
<script type="text/javascript" src="./script/dhtmlSuite-dynamicContent.js"></script>
<script type="text/javascript" src="./script/dhtmlSuite-windowWidget.js"></script>
<script type="text/javascript" src="./script/dhtmlSuite-dragDropSimple.js"></script>
<script type="text/javascript" src="./script/dhtmlSuite-resize.js"></script> 
<script type="text/javascript" src="./script/ajax.js"></script> 

<!-- Fin Ventanas -->
<link rel="stylesheet" href="./script/menu/slide-out-menu-new.css" media="screen" type="text/css"></link>
<script type="text/javascript" src="./script/slide-out-menu-new.js"></script> 
<!-- llamado de menu -->


<!-- FIn menu -->


<SCRIPT type="text/javascript">
var DHTML_SUITE_THEME_FOLDER = 'script/window/theme/';
</SCRIPT> 

<SCRIPT type="text/javascript">
var DHTML_SUITE_THEME = 'light-cyan';
</SCRIPT> 
<?php
/**
 * Fin llamado Script
 */

require_once($dirtemplate . 'header.inc.php');

?>

<div id="myWindow"
windowProperties="title:Mi Proyecto,width:440,height:380,maxWidth:900,cookieName:window,
xPos:5,yPos:170,minWidth:365,minHeight:250,activeTabId:windowTab2">
<div id="windowTab1" class="DHTMLSuite_windowContent" tabProperties="tabTitle:Porque del programa,overflow:hidden">
La realizaci&oacute;n de este programa esta dedicado a la persona que mas quiero, <b>mi princesa</b>
</div>
<div id="windowTab2" class="DHTMLSuite_windowContent" tabProperties="tabTitle:M&aacute;s sobre el programa,overflow:hidden">

</div>
</div> 



<?= $menu ?>


<?php

require_once($dirtemplate . 'footer.inc.php');

?>

<SCRIPT type="text/javascript">
var windowModel = new DHTMLSuite.windowModel();
windowModel.createWindowModelFromMarkUp('myWindow');
var colorWindow = new DHTMLSuite.windowWidget();
colorWindow.setLayoutThemeWindows();
colorWindow.addWindowModel(windowModel);
colorWindow.init();
</SCRIPT> 



<script type="text/javascript">
function createNewWindow(titlewindow)
{
var newWindowModel = new DHTMLSuite.windowModel({windowsTheme:true,id:'newWindow',title:titlewindow,xPos:200,yPos:200,minWidth:100,minHeight:100 } );
newWindowModel.addTab({ id:'myTab',htmlElementId:'myTab',tabTitle:'tab1',
textContent:'Hola' } );
newWindowModel.addTab({ id:'myTab2',htmlElementId:'myTab2',tabTitle:'tab2',
textContent:'Hola' } );
var newWindowWidget = new DHTMLSuite.windowWidget(newWindowModel);
newWindowWidget.init();
}
</script>