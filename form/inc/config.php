<?php

class Config
{

	private $config = array(
		'host' => 'localhost',
		'database' => '',
		'user' => '',
		'password' => '',
	);

	public function __get($name)
	{
		if (array_key_exists($name, $this->config))
			return $this->config[$name];
		else
			return false;
	}

}
