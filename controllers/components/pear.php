<?php

class PearComponent extends Object {
	public $controller;
	
	function initialize(&$controller, $settings = array()) {
        $this->controller = $controller;
    }
    
	function import($key) {
		$this->__setPearEnviroment();
		App::import('Vendor', $key, array(
			'file' => str_replace(DS, '/', $key) . '.php',
			'plugin' => 'Pear'
		));
	}
	
	private function __setPearEnviroment() {
		$separator = PATH_SEPARATOR; 
        $includePath = explode($separator, ini_get("include_path"));
        $includePath[] = dirname(dirname(dirname(__FILE__))) . DS . 'vendors' . DS . 'pear';
        ini_set("include_path", implode($separator, $includePath));
	}
}