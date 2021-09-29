<?php

function getUsers($passS = true)
{
	$dirPath = "usuarios.txt";
	$users = [];
	$file = fopen($dirPath, "r") ;
	while (!feof($file)) {
		$line = fgets($file);
		$split = explode(":",  $line); 
		$user = $split[0];
		$pass = $split[1];
        if($passS){  
            $users[] = [$user,$pass];
        }else {
            $users[] = $user;
        }
	}
	fclose($file);

	return $users;
}
function alerta($msg)
{
    echo <<<HTML
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    $msg
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    HTML;
}

function addLineToFile($file, $line){
    $file = fopen($file, "a");
    fwrite($file, "\n");
    fwrite($file, $line);
    fclose($file);
}

function errorMessage($msg)
{
    echo <<<HTML
    <div class="text-danger">
        $msg
    </div>
    HTML;
}

function fileToArray($filePath)
{
    $content = [];
    $handle = fopen($filePath, "r");
    while (!feof($handle)) {
        $line = fgets($handle);
        $content[] = $line;
    }
    fclose($handle);
    return $content;
}
