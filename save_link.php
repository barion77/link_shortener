<?php

$link = $_GET['link'];
$hash = substr(md5($link), 0, 6);

$urls = file_get_contents('urls.json');
$urls = json_decode($urls, true);

if (!empty($urls)) {
    if (isset($urls[$hash])) {
        echo '<b>Link: </b>' . 'http://' . $_SERVER['HTTP_HOST'] . '/' . $hash . 
        '</br>' . '<b>Hits: </b>' . $urls[$hash]['hits'];
        exit;
    }
}

$urls[$hash] = ['url' => $link, 'hits' => 0];
file_put_contents('urls.json', json_encode($urls));

echo '<b>Your link:</b> http://' . $_SERVER['HTTP_HOST'] . '/' . $hash;