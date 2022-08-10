<?php

$link = $_GET['link'];
$hash = md5($link);


$urls = file_get_contents('urls.txt');
$urls = explode("\r\n", $urls);

foreach ($urls as $key => $value) {
    if (!empty($value)) {
        if ($link == 'http://' . $_SERVER['HTTP_HOST'] . '/' . explode('@', $value)[1]) {
            echo '<b>Hits: </b>' . explode('@', $value)[2];
            exit;
        }
    }
}

$record = $link . "@" . $hash . '@' . '0' . "\r\n";
file_put_contents('urls.txt', $record, FILE_APPEND);

echo '<b>Your link: </b>' . 'http://' . $_SERVER['HTTP_HOST'] . '/' . $hash;
