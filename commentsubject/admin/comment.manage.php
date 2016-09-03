<?php
require_once ("../connect.php");
$sql = "SELECT * FROM comment ORDER BY id DESC";
if ($res = $mysqli->query($sql)){
    while ($row = $res->fetch_assoc()){
        $data[] = $row;
    }
}else{
    $data[] = array();
}



?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理系统</title>
    <style type="text/css">
        body{
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<table width="800" bgcolor="#ffe4c4" cellspacing="8" cellpadding="1" border="1" align="center" >
    <tr align="center">
        <td  colspan="5"><strong>留言管理系统</strong></td>
    </tr>
    <tr>
        <td width="400" colspan="3" align="center"><a href="comment.add.php">发布留言</a></td>
        <td width="400" colspan="2" align="center"><a href="comment.manage.php">管理留言</a></td>
    </tr>
    <tr>

        <td width="100" align="center">昵称</td>
        <td width="150" align="center">邮箱</td>
        <td width="450" align="center">留言内容</td>
        <td width="110" align="center">留言时间</td>
        <td width="100" align="center">操作</td>
    </tr>
    <?php /*if(!empty($data)){
    foreach ($data as $value){
        */?><!--
    <tr>
        <td bgcolor="#f0f8ff">&nbsp;<?php /*echo $value['id']*/?></td>
        <td bgcolor="#f0f8ff">&nbsp;<?php /*echo $value['username']*/?></td>
        <td bgcolor="#f0f8ff">&nbsp;<?php /*echo $value['comment']*/?></td>
        <td bgcolor="#f0f8ff"><a href="comment.modify.php?id=<?php /*echo $value['id']*/?>">修改</a><a href="comment.delete.php?id=<?php /*echo $value['id']*/?>">删除</a></td>
    </tr>
    --><?php}/*
}   */?>
    <?php
    if(!empty($data)){
    foreach($data as $value){
    ?>
    <tr>

        <td bgcolor="#FFFFFF">&nbsp;<?php echo $value['nickname']?></td>
        <td bgcolor="#FFFFFF">&nbsp;<?php echo $value['email']?></td>
        <td bgcolor="#FFFFFF">&nbsp;<?php echo $value['comment']?></td>
        <td bgcolor="#FFFFFF">&nbsp;<?php echo date('Y-m-d H:i:s',$value['commenttime'])?></td>
        <td bgcolor="#FFFFFF"><a href="comment.delete.php?id=<?php echo $value['id']?>">删除</a> <a href="comment.modify.php?id=<?php echo $value['id']?>">修改</a></td>
    </tr>
    <?php
    }
    }
    ?>
</table>

</body>
</html>