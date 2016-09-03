<?php
/**
 * Created by PhpStorm.
 * User: geniuscrossain
 * Date: 16-9-2
 * Time: 下午8:32
 *//*
$p = $_GET['p']?$_GET['p']:1;
$offset = ($p-1)*$pagesize;
$countsql = "SELECT COUNT(*) AS  count FROM comment";*/
require_once ('connect.php');
$p = $_GET['p']?$_GET['p']:1;
$offset = ($p-1)*$pagesize;
//分页代码
//计算留言总数
$count_result = $mysqli->query("SELECT COUNT(*) AS  count FROM comment");
$count_array = $mysqli->fetch_array($count_result);

//计算总的页数
$pagenum=ceil($count_array['count']/$pagesize);
echo '共 ',$count_array['count'],' 条留言';

//循环输出各页数目及连接
if ($pagenum > 1) {
    for($i=1;$i<=$pagenum;$i++) {
        if($i==$p) {
            echo ' [',$i,']';
        } else {
            echo ' <a href="index.php?p=',$i,'">',$i,'</a>';
        }
    }
}
?>