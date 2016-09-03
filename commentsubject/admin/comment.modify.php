<?php
require_once("../connect.php");
$id = $_GET['id'];
$res = $mysqli->query("SELECT * FROM comment WHERE id = $id");
$data = $res->fetch_assoc();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<table bgcolor="white" width="100%" cellpadding="8" cellspacing="1">
    <tr>
        <td>
            <form action="comment.modifyevent.php" method="post" name="post2" id="post2">
                <input type="hidden" id="id" value="<?php echo $data['id']?>">
                <table cellspacing="1" cellpadding="8" border="1" width="500" align="center" bgcolor="#d2691e">

                    <tr>
                        <td align="center" valign="top" colspan="2"><strong>修改评论</strong></td>
                    </tr>
                    <tr>
                        <td align="center" valign="top">用户名</td>
                        <td><label for="nickname"></label>
                            <input type="text" name="nickname" id="nickname" value="<?php echo $data['nickname']?>"></td>
                    </tr>
                    <tr>
                        <td align="center" valign="top">邮箱</td>
                        <td><label for="email"></label>
                            <input type="text" name="email" id="email" value="<?php echo $data['email']?>"></td>
                    </tr>
                    <tr>
                        <td>评论内容</td>
                        <td><label for="comment"></label>
                            <textarea name="comment" id="comment" cols="50" rows="15"><?php echo $data['comment']?></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right" valign="right"><label for="submit"></label>
                            <input type="submit" value="提交"></td>
                    </tr>
                    <tr valign="middle" align="center">
                        <td colspan="2"><p><a href="comment.manage.php">查看留言</a></p>
                            <p><a href="comment.add.php">发表留言</a></p></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">版权所有</td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
</body>
</html>