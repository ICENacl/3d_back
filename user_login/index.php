<?php
session_start();
if(isset($_SESSION['userid']))//检查 userid 是否已经设置
{
    unset($_SESSION['userid']);
    //销毁变量 userid
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>影视平台 || 请登陆</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>

        body{
            width: 100%;
            overflow: hidden;
            background: url("1.jpg") no-repeat;
            background-size:cover;
            color: antiquewhite;
        }
    </style>

</head>
<body>
<h1 style="text-align: center;color:black"><strong>影视平台登陆</strong></h1>
<div style="padding: 180px 550px 10px;text-align: center">
    <form  action="login_check.php" method="POST" class="bs-example bs-example-form" role="form">
        <div id="login">
            <div class="input-group"><span class="input-group-addon">用户名</span><input  name="account" type="text" placeholder="请输入账号" class="form-control"></div><br><br>
            <div class="input-group"><span class="input-group-addon">密码</span><input  name="pass" type="password" placeholder="请输入密码" class="form-control"></div><br><br><br>
            <input type="submit" value="登录" class="btn btn-default">
            <input type="reset" value="重置" class="btn btn-default">
            <input type ="button" value="注册" class="btn btn-default" onclick= "window.location.href = 'user_register.php'">
        </div>
    </form>
</div>
</body>
</html>