<?php


$request = trim($_SERVER['REQUEST_URI'], '/');

$urls = file_get_contents('urls.txt');
$urls = explode("\r\n", $urls);

foreach ($urls as $key => $value) {
    if (!empty($value)) {
        $url = explode('@', $value)[0];
        $hash = explode('@', $value)[1];
        $count = explode('@', $value[2]);

        if ($hash == $request) {
            $count = intval(explode('@', $value)[2]) + 1;
            $record = $url . '@' . $hash . '@' . $count;
            $urls[$key] = $record;
            $urls = implode(',', $urls);
            $urls = str_replace(',', "\r\n", $urls);
            file_put_contents('urls.txt', $urls);

            header('Location: ' . $url);
        }
    }
}

die('404 Not Found');
