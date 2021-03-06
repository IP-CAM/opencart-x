<?php
if (!function_exists('view')) {
	function view($path, $data) {
		$config = Registry::getInstance()->get('config');
		$loader = Registry::getInstance()->get('load');
		
		if(defined('HTTP_CATALOG')) { // if in admin panel
			return $loader->view($path.'.tpl', $data);
		} else {
			if (file_exists(DIR_TEMPLATE . $config->get('config_template') . '/template/' . $path . '.tpl')) {
				return $loader->view($config->get('config_template') . '/template/' . $path . '.tpl', $data);
			} else {
				return $loader->view('default/template/' . $path . '.tpl', $data);
			}
		}
	}
}
