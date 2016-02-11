<?php
$filename = 'busy_day.in';

$data = explode("\n", file_get_contents($filename));

$first = $data[0];

var_dump($first);
var_dump(explode(' ', $first));
