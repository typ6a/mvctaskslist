<?php
function redirect($url)
{
	header("Location: {$url}");
}

function base_url($uri = '')
{
	$uri = ltrim($uri, '/');
	$base = rtrim(BASE_URL,'/');
	if(!empty($uri)){
		return $base . '/' .  $uri;
	} else {
		return $base;
	}
}

function isPost(){
	return $_SERVER['REQUEST_METHOD'] === 'GET' ? false : true;
}

function isAdmin(){
	return !empty($_SESSION['is_admin']) ? true : false;
}