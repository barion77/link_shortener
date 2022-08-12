<?php

$link = $_GET['link'];
$hash = substr(md5($link), 0, 6);

$urls = file_get_contents('urls.json');
$urls = json_decode($urls, true);

if (!empty($urls)) {
    if (isset($urls[$hash])) {
        echo '<label>Link: </label><input type="text" style="border:none;outline:none;" value="'. 'http://' . $_SERVER['HTTP_HOST'] . '/' . $hash .'" />' .
        '<br/><b>Hits: </b>' . $urls[$hash]['hits'];
        exit;
    }
}

$urls[$hash] = ['url' => $link, 'hits' => 0];
file_put_contents('urls.json', json_encode($urls));

$url = 'http://' . $_SERVER['HTTP_HOST'] . '/' . $hash;
echo '<label>Your link: </label><input type="text" style="border: none;outline:none;" value="'. $url .'" />';