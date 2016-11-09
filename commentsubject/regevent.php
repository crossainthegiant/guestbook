<?php
/**
 * Created by PhpStorm.
 * User: geniuscrossain
 * Date: 2016/11/8
 * Time: 23:29
 */

if (!isset($_POST['submit'])){
    exit("非法访问");
}

$adminname = $_POST['adminname'];
$adminpwd = $_POST['adminpwd'];
$adminemail = $_POST['adminemail'];
$regdate = time();

if (!preg_match('/^[\w]{4,18}$/',$adminname)){
    exit('用户名格式错误');
}
if(strlen($adminpwd) < 6) {
    exit('错误：密码长度不符合规定。<a href="javascript:history.back(-1);">返回</a>');
        }
if (!preg_match('/^[a-z]([a-z0-9]*[-_]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?$/i',$adminemail)){
    exit('邮箱地址格式错误');
}
require_once ("guestbookcon.php");
$check_reg = $mysqli ->query("select uid from guestbook where username = '$adminname' limit 1" );
if (mysqli_fetch_array($check_reg)){
   echo '用户已存在.<a href = "reg.html">返回</a>';
    exit;
}
    $sql = "insert into guestbook(username,password,email,redate)values('$adminname','$adminpwd','$adminemail','$regdate')";

    if ($mysqli ->query($sql)){
        echo "注册成功<a href='login.html'>前去登录</a>";
    }else{
        exit("注册失败");
    }

