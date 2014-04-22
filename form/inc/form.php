<?php

class Form
{

	private $out = '';
	private $db;

	public function __construct()
	{
		$this->db = Db::instance();
		if (!empty($_GET['page'])) {
			$page = $_GET['page'];
			if ($page == 'thx')
				return $this->_thxAction();
			else
				return $this->_formAction();
		}else if (!empty($_POST)) {
			var_dump($_POST);
			return $this->_formSubmit($_POST);
		}
		return $this->_formAction();
	}

	private function _formAction()
	{
		$this->out = new View('form');
		return true;
	}

	private function _thxAction()
	{
		$this->out = new View('thx', array('db' => $this->db));
		return true;
	}

	private function _formSubmit($post)
	{
		$submit = $this->db->submit($post);
		if ($submit === true) {
			return $this->_thxaction();
		} else if (is_string($submit)) {
			echo $submit;
			return $this->_formAction();
		} else {
			return $this->_formAction();
		}
	}

	public function __toString()
	{
		return (string) $this->out;
	}

}
