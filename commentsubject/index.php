<?php
require_once ("connect.php");
$p = @$_GET['p']?$_GET['p']:1;
$offset = ($p-1)*$pagesize;
$sql = "SELECT * FROM comment  ORDER BY id DESC LIMIT $offset,$pagesize";

if ($res = $mysqli->query($sql)){
    while ($row = $res->fetch_assoc()){
        $data[] = $row;
    }
}else{
    $data = array();
}

$countsql = "SELECT COUNT(*) AS  count FROM comment";
$coun = $mysqli->query($countsql);
$crow = $coun->fetch_array();
$pagenum = ceil($crow['count']/$pagesize);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>留言板</title>
    <style type="text/css">
    body{
    margin: 0;
    padding: 0;
}
        #wrap{
            width: 500px;
            margin: 0 auto;
        }
        .subject{1px solid #7a2518;position: relative;margin: 5px 0px;background-color: #aaaaaa}
        h2{text-align: center}
        h3{font-family: 华文隶书;position: absolute;left: 10px;}
        .email{position: absolute;right: 10px;top: 10px;
            font-family: Arial, Helvetica, sans-serif;font-size: 10px;color: #7d0000}
        p{font-size: 20px;color: #7a2518;font-family: "华文楷体";line-height: 1.5em;}
        .commenttime{position: absolute;right: 10px;bottom: 10px;  font-family: Arial, Helvetica, sans-serif;font-size: 10px;color: #bf6900}
        #manage{position: absolute;
            top:10px;right: 10px}
        .page{text-align: center}
    </style>
</head>
<body>
<h2><strong>crossain的留言板</strong></h2>
<div id="wrap">
    <p><a href="./admin/comment.add.php">发布留言</a>&nbsp;&nbsp;&nbsp;<a
            href="./admin/comment.manage.php">管理留言</a></p>
    <span id="manage"><a href="login.html">登录</a><span>/</span><a href="reg.html">注册</a></span>
    <?php
    if(!empty($data)){
        foreach ($data as $value){
    ?>
    <div class="subject">
            <h3><?php echo $value['nickname']?></h3><br>
            <span class="email"><?php echo $value['email']?></span>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $value['comment']?></p>
        <br>
        <span class="commenttime"><?php echo date('Y-m-d h:m:s',$value['commenttime'])?></span>
    </div>
    <?php
        }
    }?>
    <p class="page"><?php if ($pagenum > 1) {
    for($i=1;$i<=$pagenum;$i++) {
        if($i==$p) {
            echo ' [',$i,']';
        } else {
            echo ' <a href="index.php?p=',$i,'">',$i,'</a>';
        }
    }
}
        ?></p>


</div>
</body>
</html>