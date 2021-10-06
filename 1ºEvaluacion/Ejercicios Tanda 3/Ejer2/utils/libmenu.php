<?php

function autentica($user, $pass)
{
	return getUserFromDB()[$user]['pass'] == $pass;
}


function getPlatesByType($type)
{
	$plates = getPlates();
	$filtered = [];
	foreach ($plates as $key => $value) if($value['tipo'] == $type) $filtered[$key] = $value;
	return $filtered;
}

function getDiscount($user)
{
	$users = getUserFromDB();
	return $users[$user]['discount'] ?? false;
}

function getUserFromDB()
{
	$filePath = './db/socios.txt';
	$file = fopen($filePath, "r");
	$users = [];
	while (!feof($file)) {
		$line = fgets($file);
		$line = explode(' ', $line);
		$users[$line[0]] = ["username" => $line[0], "pass" => $line[1], "discount" => $line[2]];
	}

	return $users;
}

function getPlates()
{
	$filePath = './db/platos.txt';
	$file = fopen($filePath, "r");
	$plates = [];
	while (!feof($file)) {
		$line = fgets($file);
		$line = explode(' ', $line);
		$plates[$line[0]] =  ["tipo" => $line[1], "precio" => $line[2]];
	}

	return $plates;
}

function getPlatePrice($plate)
{
	return getPlates()[$plate];
}
