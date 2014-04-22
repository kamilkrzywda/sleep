<?php

class View
{

	private $layout = 'index';
	private $out = '';
	private $db;

	public function __construct($view)
	{
		$this->db = Db::instance();
		$this->view = $view;
	}

	public function __toString()
	{
		$this->content = $this->_loadView($this->view);
		$this->out = $this->_loadLayout($this->layout);
		return (string) $this->out;
	}

	private function _loadLayout($name)
	{
		ob_start();
		$this->_loadFile($name, 'layout');
		return ob_get_clean();
	}

	private function _loadView($name)
	{
		ob_start();
		$this->_loadFile($name);
		return ob_get_clean();
	}

	private function _loadFile($name, $location = '')
	{
		$location .= '/';
		require_once ROOT . '/view/' . $location . $name . '.php';
	}

}
