<?php
/*require_once('core.php');
$core = new Core();
$core->inicio();*/


$sql = "SELECT * FROM menu WHERE protected = '1' ORDER BY name";
$rs = $core->db->Execute($sql);

$menu = '<div id="dhtmlgoodies_menu" style="visibility: hidden;"><ul>';



while (!$rs->EOF) {
    
    $menu .= '<li><a href="#">' . $rs->fields['name'] . '</a>';
    $menu .= '<ul>';
    
    $sql = "SELECT * FROM menu WHERE parentID = '{$rs->fields['id']}' ORDER BY name";
    $submenu = $core->db->Execute($sql);
    
    while (!$submenu->EOF) {
        $form = $submenu->fields['form'];
        
    	$menu .= '<li><a href="#" onclick="createNewWindow(\''. $submenu->fields['name'] . '\', \'http://localhost/abogado/content.php?idcontent='. $form . '\', \''. $form . '\');return false">'. $submenu->fields['name'] . '</a></li>';
    	$submenu->MoveNext();
    }
    $menu .= '</li></ul>';
    
	$rs->MoveNext();
}
$menu .= '</ul>';
$menu .= '</div>';

$menus = '<div id="dhtmlgoodies_menu" style="visibility: hidden;">
		<ul>
			<li><a href="#">Sistema Judicial</a>
				<ul>
					<li><a href="#" onclick="createNewWindow(\'Areas\');return false">Areas</a></li>
					<li><a href="#">Temas</a>
						<ul>
							<li><a href="#" onclick="createNewWindow(\'Tema 1\');return false">Tema 1</a></li>
							<li><a href="#" onclick="createNewWindow(\'Tema 2\');return false">Tema 2</a></li>
						</ul>
					</li>
					<li><a href="#" onclick="createNewWindow(\'Procesos\');return false">Procesos</a></li>
					<li><a href="#" onclick="createNewWindow(\'Juzgados\');return false">Juzgados</a></li>
					<li><a href="#" onclick="createNewWindow(\'Inspecciones\');return false">Inspecciones</a></li>
				</ul>
			</li>
			<li><a href="#">Usuario</a>
				<ul>
					<li><a href="#" onclick="createNewWindow(\'Craar usuario\');return false">Crear Usuario</a></li>
					<li><a href="#" onclick="createNewWindow(\'Modificar Usuario\');return false">Modificar Usuario</a></li>
					<li><a href="#" onclick="createNewWindow(\'Borrar Usuario\');return false">Borrar usuario</a></li>
					<li><a href="#" onclick="createNewWindow(\'Lista de usuarios\');return false">Ver Usuarios</a></li>
				</ul>
			</li>
			<li><a href="#">Soporte</a>
				<ul>
					<li><a href="#" onclick="createNewWindow(\'Cont&aacute;ctenos\');return false">Contacto</a></li>
					<li><a href="#" onclick="createNewWindow(\'Su experiencia\');return false">Recomiendenos</a></li>
					<li><a href="#" onclick="createNewWindow(\'Donaciones\');return false">Donaciones</a></li>
				</ul>
			</li>
			<li><a href="#">Foros</a>
				<ul>
					<li><a href="#" onclick="createNewWindow(\'Topico 1\');return false">Topico 1</a></li>
					<li><a href="#" onclick="createNewWindow(\'Topico 2\');return false">Topico 2</a></li>
					<li><a href="#" onclick="createNewWindow(\'Topico 3\');return false">Topico 3</a></li>
				</ul>
			</li>
			
			<li><a href="#">Fin</a></li>
		</ul>
		</div>';


?>