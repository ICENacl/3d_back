<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

</body>
</html>
<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');


$delid=$_GET['id'];

$sqla = "delete from user where user_name = '{$delid}';";
$resa=mysqli_query($dbc,$sqla);

if($resa != false)
{
    echo "<script>alert('删除成功！')</script>";
    echo "<script>window.location.href='admin_user.php'</script>";
}
else{
    echo "<script>alert('删除失败！')</script>";
    echo "<script>window.location.href='admin_user.php'</script>";
}

?>
