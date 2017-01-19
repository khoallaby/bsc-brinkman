<?php

$array_menu = wp_get_nav_menu_items('header-menu');
$menu = array();
foreach ($array_menu as $m) {
	if (empty($m->menu_item_parent)) {
		$menu[$m->ID] = array();
		$menu[$m->ID]['ID']      =   $m->ID;
		$menu[$m->ID]['title']       =   $m->title;
		$menu[$m->ID]['url']         =   $m->url;
		$menu[$m->ID]['children']    =   array();
	}
}
$submenu = array();
foreach ($array_menu as $m) {
	if ($m->menu_item_parent) {
		$submenu[$m->ID] = array();
		$submenu[$m->ID]['ID']       =   $m->ID;
		$submenu[$m->ID]['title']    =   $m->title;
		$submenu[$m->ID]['url']  =   $m->url;
		$menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
	}
}


echo '<ul class="list-unstyled footer-menu">';
foreach( $menu as $menu_parent ) {

	// excludes home
	if( strtolower($menu_parent['title']) == 'home' )
		continue;
	echo '<li class="col-xs-12 col-sm-6 col-md-2"><h3>' . $menu_parent['title'] . '</h3>';
	echo '<ul>';
	if( empty($menu_parent['children']) ) {
		echo '<li><a href="' . $menu_parent['url'] . '">' . $menu_parent['title'] . '</a></li>';
	} else {
		foreach( $menu_parent['children'] as $menu_child )
			echo '<li><a href="' . $menu_child['url'] . '">' . $menu_child['title'] . '</a></li>';
	}
	echo '</ul>';
	echo '</li>';
}
echo '</ul>';