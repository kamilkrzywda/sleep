<?php

class Config
{

	private $config = array(
		'host' => 'localhost',
		'database' => 'kamilkrzywda',
		'user' => 'kamilkrzywda',
		'password' => 'killer4601243',
	);

	public function __get($name)
	{
		if (array_key_exists($name, $this->config))
			return $this->config[$name];
		else
			return false;
	}

}
