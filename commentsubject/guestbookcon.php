<?php
/**
 * Created by PhpStorm.
 * User: geniuscrossain
 * Date: 2016/11/9
 * Time: 0:22
 */
require_once ('config.php');
$mysqli = new mysqli(HOST,USERNAME,PASSWORD,'commentsubject');
if ($mysqli->connect_errno){
    die($mysqli->connect_error);
}
$mysqli ->select_db('guestbook');
$mysqli->set_charset('utf8');
date_default_timezone_set("PRC");
