<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');
$user_id=$_GET['id'];
$user_id= (string)$user_id;
$sqlb="select * from user where user_name='{$user_id}'";
$resb=mysqli_query($dbc,$sqlb);
$resultb=mysqli_fetch_array($resb);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>影视管理 || 用户信息修改</title>
</head>
<body>
<h1 style="text-align: center"><strong>用户信息修改</strong></h1><br/><br/><br/>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_user_edit.php?id=<?php echo $user_id; ?>" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
        <div id="login">
            
            <div class="input-group"><span class="input-group-addon">用户名</span><input name="nname" value="<?php echo $resultb['user_name'] ;?>" type="text" placeholder="请输入修改的用户名，原用户名为:<?php echo $resultb['user_name'] ;?>" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">密码</span><input name="npass" value="<?php echo $resultb['user_pass'] ;?>" type="text" placeholder="请输入修改的密码，原密码为:<?php echo $resultb['user_pass'] ;?>" class="form-control"></div><br/>           
            <input type="submit" value="确认" class="btn btn-default">
            <input type="reset" value="重置" class="btn btn-default">
        </div>
    </form>
</div>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    $user_id=$_GET['id'];

    $npass = $_POST["npass"];
    $nname= $_POST["nname"];

    $sqla="update user 
    set 
    user_pass='{$npass}',
    user_name='{$nname}'
    where user_name='{$user_id}'";
    $resa=mysqli_query($dbc,$sqla);

    if($resa==1)
    {

        echo "<script>alert('修改成功！')</script>";
        echo "<script>window.location.href='admin_user.php'</script>";

    }
    else
    {
        echo "<script>alert('修改失败！请重新输入！');</script>";

    }

}

?>
</body>
</html>
