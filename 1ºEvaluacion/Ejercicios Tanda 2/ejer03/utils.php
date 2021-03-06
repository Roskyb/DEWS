<?php



function alerta($msg)
{
    echo <<<HTML
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    $msg
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    HTML;
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
