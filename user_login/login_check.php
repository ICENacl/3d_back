<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>

</body>
</html>
<?php
include ('mysqli_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acco = $_POST["account"];
    $pw = $_POST["pass"];
}
$adsql="select * from manager where  manager_name='{$acco}' and  manager_pass='{$pw}';";
$adres=mysqli_query($dbc,$adsql);


$resql="select * from user where  user_name='{$acco}' and  user_pass='{$pw}';";
$reres=mysqli_query($dbc,$resql);


if(mysqli_num_rows($adres)==1 ){
    session_start();
    $result = mysqli_fetch_assoc($adres);

    $_SESSION['userid']=$result['manager_name'];
    echo "<script>window.location='admin_index.php'</script>";//页面重定向，跳转到admin_index.php
}
else if(mysqli_num_rows($reres)==1){

    session_start();
    $result = mysqli_fetch_assoc($reres);
    $_SESSION['userid']=$result['manager_name'];
    // $_SESSION['super_manager']=0;

    //在此跳转到3d_room 首页
    echo "<script>window.location='user_index.php'</script>";
}
else
{
    echo "<script>alert('用户名或密码错误，请重新输入!');window.location='index.php';</script>";

}

?>