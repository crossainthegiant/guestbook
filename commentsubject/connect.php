<?php

require_once ('config.php');
$mysqli = new mysqli(HOST,USERNAME,PASSWORD,'commentsubject');
if ($mysqli->connect_errno){
    die($mysqli->connect_error);
}
$mysqli->set_charset('utf8');
date_default_timezone_set("PRC");
$pagesize = 4;