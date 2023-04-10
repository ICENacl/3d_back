<?php
session_start();
include ('mysqli_connect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    
    
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="../../bootstrap/awesome-bootstrap-checkbox/bower_components/Font-Awesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="../../bootstrap/awesome-bootstrap-checkbox/demo/build.css"/>

    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>影视管理 || 用户注册</title>
</head>
<body>

<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#" >用户管理</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="admin_index.php">主页</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">用户管理<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_user.php">全部用户</a></li>
                        <li><a href="admin_user_add.php">增加用户</a></li>
                    </ul>
                </li>
                <li><a href="admin_repass.php">密码修改</a></li>
                <li><a href="index.php">退出</a></li>
            </ul>
        </div>
    </div>
</nav>


<h1 style="text-align: center"><strong>增加用户</strong></h1>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_user_add.php" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
        <div id="login">
            <div class="input-group"><span class="input-group-addon">昵称</span><input name="nname" type="text" placeholder="请输入昵称" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">密码</span><input name="npass" type="text" placeholder="请输入密码" class="form-control"></div><br/>
            
            <input type="submit" value="添加" class="btn btn-default">
            <input type="reset" value="重置" class="btn btn-default">
        </div>
    </form>
</div>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    $nname = $_POST["nname"];
    $npass= $_POST["npass"];

    
    /*$nadd= $_POST["naddress"];
    $nnte = $_POST["ntel"];*/
    $sql_temp1 = "select * from user where user_name='{$nname}';";
    $sql_temp2 = "select * from manager where manager_name='{$nname}';";
    $res_temp1 = mysqli_query($dbc,$sql_temp1);
    $res_temp2 = mysqli_query($dbc,$sql_temp2);
    if(mysqli_num_rows($res_temp1) >= 1 || mysqli_num_rows($res_temp2) >= 1)
    {
        echo "<script>alert('用户名已经存在，请重新输入!')</script>";
    }
    else 
    {
        $sqla="INSERT INTO `user`
        (`user_name`,
        `user_pass`)
        VALUES
        ('{$nname}',
        '{$npass}');";

        //$sqlb="insert into reader_card (reader_id,name) VALUES($nnid ,'{$nnam}');";
        $resa=mysqli_query($dbc,$sqla);
        //$resb=mysqli_query($dbc,$sqlb);

        if($resa==1)
        {
            echo "<script>alert('用户添加成功!')</script>";
        }
        else
        {
            echo "<script>alert('添加失败！请重新输入！');</script>";

        }
    }
    
    
}


?>
</body>
</html>
