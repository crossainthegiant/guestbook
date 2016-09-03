<?php

require_once ('../connect.php');

$sql = "INSERT comment(nickname,email,comment,commenttime)VALUES(?,?,?,?)";
$mysqli_stmt = $mysqli->prepare($sql);
$mysqli_stmt->bind_param('sssi',$nickname,$email, $comment,$commenttime);
if(!(isset($_POST['nickname'])&&(!empty($_POST['nickname'])))) {
    echo "<script>alert('用户名设置出错‘);window.location.href = 'comment.add.php'</script>";
}
$nickname=$_POST['nickname'];
$comment=$_POST['comment'];
$commenttime = time();
$email = $_POST['email'];
if ($mysqli_stmt->execute()){
    echo "<script> alert('评论成功');location.href='comment.manage.php'</script>";
}else{
    echo "<script>alert('输入失败');window.location.href='comment.add.php'";
};


