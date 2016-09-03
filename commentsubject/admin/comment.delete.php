<?php
/**
 * Created by PhpStorm.
 * User: geniuscrossain
 * Date: 2016/9/1
 * Time: 0:20
 */
require_once ("../connect.php");

$id = $_GET['id'];
$sql = "DELETE FROM comment WHERE id = $id";
if ($mysqli_result = $mysqli->query($sql)){
    echo "<script>alert('删除成功');window.location.href = 'comment.manage.php'</script>";
}else{
    echo "<script>alert('修改失败');window.location.href = 'comment.manage.php'</script>";
};
