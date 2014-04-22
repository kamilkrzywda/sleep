<?php

class Db
{

	private $config;
	private static $db = false;

	private function __construct()
	{
		$this->config = new Config();
		try {
			$this->_connect();
		} catch (Exception $e) {
			if (DEBUG)
				throw new Exception($e->getMessage());
			else
				throw new Exception('db error');
		}
		if (!$this->db)
			throw new Exception('db connection error');
		return $this;
	}

	public static function instance()
	{
		if (!self::$db)
			return self::$db = new Db();
		else
			return self::$db;
	}

	private function _connect()
	{
		$cfg = &$this->config;
		$this->db = new mysqli($cfg->host, $cfg->user, $cfg->password, $cfg->database);
	}

	public function submit($post)
	{

		foreach ($post as &$v) {
			$v = mysql_escape_string($v);
		}

		$out = '';
		if (empty($post['name']))
			$out .= 'Name cannot be empty<br />';
		if (empty($post['email']))
			$out .= 'Email cannot be empty<br />';
		if (empty($post['subject']))
			$out .= 'Name cannot be empty<br />';
		if (empty($post['content']))
			$out .= 'Name cannot be empty<br />';
		// itd...


		if (empty($out)) {
			$out = true;

			try {
				$this->db->query("
					INSERT INTO `form` (
					`name` ,
					`email` ,
					`subject` ,
					`content`
					)
					VALUES (
					'$post[name]',
					'$post[email]',
					'$post[subject]',
					'$post[content]'
					);
				");
			} catch (Exception $e) {
				if (DEBUG)
					throw new Exception($e->getMessage());
				else
					throw new Exception('db error');
			}
		}

		return $out;
	}

	public function getFormAsArray()
	{
		$query = 'SELECT * FROM ' . $this->config->database . '.form ORDER BY id ASC';
		$result = $this->db->query($query);
		if ($result === false) {
			throw new Exception('Invalid query');
		}
		return $result;
	}

	public function getFormatedList()
	{
		$out = '<table>';
		$out .= '<tr><td>lp.</td><td>name</td><td>email</td><td>subject</td><td>content</td></tr>';
		$list = $this->getFormAsArray();
		while ($row = $list->fetch_object()) {
			$out .= '<tr>';
			foreach ($row as $value) {
				$out .= "<td>$value</td>";
			}
			$out .= '<tr>';
		}
		$out .= '</table>';
		return $out;
	}

}
