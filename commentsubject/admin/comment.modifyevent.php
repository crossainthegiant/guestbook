<?php
require_once ("../connect.php");
$sql = "UPDATE comment SET nickname = ?,comment = ?,email = ?,commenttime = ? WHERE id = ?";
$mysqli_stmt = $mysqli->prepare($sql);
$mysqli_stmt->bind_param('sssii',$username,$comment,$email,$commenttime, $id);
if(!(isset($_POST['nickname'])&&(!empty($_POST['nickname'])))) {
    echo "<script>alert('用户名设置出错‘);window.location.href = 'comment.add.php'</script>";
}
$id = $_POST['id'];
$nickname=$_POST['nickname'];
$comment=$_POST['comment'];
$email = $_POST['email'];
$commenttime = time();
if ($mysqli_stmt->execute()){
    echo "<script>alert('修改成功');window.location.href = 'comment.manage.php'</script>";
}else{
    echo "<script>alert('修改失败');window.location.href = 'comment.modify.php'</script>";
};

