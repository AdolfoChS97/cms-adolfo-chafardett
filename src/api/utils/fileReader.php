<?php 

function parseEnvVariables($data) {
    $lines = explode("\n", $data);
    foreach ($lines as $line) {
        $parts = explode('=', $line);
        $_ENV[$parts[0]] = $parts[1];
    }
}

function fileReader ($path) {
    return parseEnvVariables(file_get_contents($path));
}

