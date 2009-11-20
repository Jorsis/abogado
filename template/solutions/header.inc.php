<?
global $dirtemplate;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Solutions 
Description: A two-column, fixed-width design for 1024x768 screen resolutions.
Version    : 1.0
Released   : 20091102

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?= $titlepage ?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="<?= $dirtemplate ?>style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
	<div id="logo">
		<h1><a href="#"><?= $titlehead ?>  </a></h1>
		<p><?= $slogan ?></em></p>
	</div>
	<hr />
	<!-- end #logo -->
	<div id="header">
		<div id="menu">
			<ul>
				<li><a href="#" onclick="createNewWindow('Sistema');return false" class="first">Sistema</a></li>
				<li class="current_page_item"><a href="#" onclick="createNewWindow('Nuestro Blog');return false">Blog</a></li>
				<li><a href="#" onclick="createNewWindow('Sobre Nosotros');return false">Sobre Nosotros</a></li>
				<li><a href="#" onclick="createNewWindow('contactenos');return false">Cont&aacute;ctenos</a></li>
			</ul>
		</div>
		<!-- end #menu -->
		
	</div>
	<!-- end #header -->
	<!-- end #header-wrapper -->
	<div id="page">
	<div id="sidebar">
		<?= $menu ?>
		</div>
		<div id="content">
		
		  <div class="post" style="height:350px" >