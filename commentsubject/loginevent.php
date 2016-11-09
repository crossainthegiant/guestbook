<?php
/**
 * Created by PhpStorm.
 * User: geniuscrossain
 * Date: 2016/11/8
 * Time: 23:28
 */
session_start();
if ($_GET['action'] == "logout"){
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    echo '已注销，请重新<a href="login.html">登录</a>';
    exit;
}


//登录
if (!isset($_POST['submit'])){
    exit('登录方式出错');
}

$adminname = $_POST['adminname'];
$adminpwd = $_POST['adminpwd'];
require_once ("guestbookcon.php");
$check_sql = $mysqli ->query("select * from guestbook WHERE username = '$adminname' and password = '$adminpwd'");
if ($result = mysqli_fetch_assoc($check_sql)){
    $_SESSION['username'] = $adminname;
    $_SESSION['userid'] = $result['uid'];
    echo '$adminname."登录成功，欢迎进入".<a href="admin/comment.manage.php">后台管理</a>';
    echo '点击此处<a href="loginevent.php?action=logout">注销</a>';
    exit;
}else{
    echo '登陆失败，用户名不存在<a href="login.html">返回</a>';
}
