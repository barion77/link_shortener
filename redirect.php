<?php


$request = trim($_SERVER['REQUEST_URI'], '/');

$urls = file_get_contents('urls.json');
$urls = json_decode($urls, true);

if (!empty($urls)) {
    if (isset($urls[$request])) {
        $url = $urls[$request]['url'];
        $count = $urls[$request]['hits'];

        $urls[$request]['hits'] = $count + 1;
        file_put_contents('urls.json', json_encode($urls));

        header('Location: ' . $url);
    }    
}


die('404 Not Found');
