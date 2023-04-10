<?php

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


<h1 style="text-align: center"><strong>用户注册</strong></h1>
<div style="padding: 10px 500px 10px;">
    <form  action="user_register.php" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
        <div id="login">
            <div class="input-group"><span class="input-group-addon">用户名</span><input name="nname" type="text" placeholder="请输入用户名" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">密码</span><input name="npass" type="text" placeholder="请输入密码" class="form-control"></div><br/>

            <input type="submit" value="添加" class="btn btn-default">
            <input type="reset" value="重置" class="btn btn-default">
        </div>
    </form>
</div>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    /*$nnid = $_POST["nid"];*/
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
        /*$nnid = mysqli_fetch_assoc($res_temp)['user_id'];
        $nnid = (int)$nnid;
        if(is_string($nnid))
        {
             echo "<script>alert('这是一个字符串！');</script>";
        }
        else{
            echo "<script>alert('这不是一个字符串！');</script>";
        }
        $nnid = $nnid + 1;
        $nnid = (string)$nnid;*/
        echo "<script>alert('用户名已经存在，请重新输入!')</script>";
    }
    else{
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
            #echo "<script>alert('用户添加成功!,您的ID为：",  "{$nnid}", "')</script>";
            echo "<script>alert('用户注册成功!')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
        else
        {
            echo "<script>alert('注册失败！请重新输入！');</script>";

        }
    }

    
}


?>
</body>
</html>
