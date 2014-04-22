<?php

define(ROOT, realpath(dirname(__FILE__)));

function __autoload($class_name)
{
	require_once ROOT . '/inc/' . strtolower($class_name) . '.php';
}

try {
	echo new Form();
} catch (Exception $e) {
	echo $e->getMessage();
}