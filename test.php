<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();

$time = "10/10/2021 00:00:00";

$datetime = (new DateTime($time))->format('d-m-Y');

$d = DateTime::createFromFormat('d/m/Y H:i:s', $time);
// var_dump($d);
echo $d->getTimestamp();
echo '<br>';
echo date("Y-m-d H:i:s", $d->getTimestamp());