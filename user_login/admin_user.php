<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>影视管理 || 用户管理</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body{
            width: 100%;
            height:auto;

        }
        #query{
            text-align: center;
        }
    </style>
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

<h1 style="text-align: center"><strong>全部用户</strong></h1>
<form  id="query" action="admin_user.php" method="POST">
    <div id="query">
        <label ><input  name="readerquery" type="text" placeholder="请输入用户姓名" class="form-control"></label>
        <input type="submit" value="查询" class="btn btn-default">
    </div>
</form>
<table  width='100%' class="table table-hover">
    <tr>
        <th>用户昵称</th>
        <th>用户密码</th>
        <th>操作</th>
        <th>操作</th>
    </tr>
    <?php



    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $gjc = $_POST["readerquery"];
        /*$sql="select reader_info.reader_id, reader_info.name,sex,birth,address,telcode,card_state 
        from reader_info,reader_card 
        where reader_info.reader_id=reader_card.reader_id and (name like '%{$gjc}%' or reader_id like '%{$gjc}%') ;";*/
        $sql="SELECT *
        FROM `user`
        where user_name like '%{$gjc}%';";

    }
    else{
        /*$sql="select reader_info.reader_id, reader_info.name, sex, birth, address, telcode, card_state
            from reader_info, reader_card where reader_info.reader_id = reader_card.reader_id";*/
        $sql = "SELECT * FROM `user`;";
    }


    $res=mysqli_query($dbc,$sql);
    foreach ($res as $row){
        echo "<tr>";
        echo "<td>{$row['user_name']}</td>";
        echo "<td>{$row['user_pass']}</td>";
       
        echo "<td><a href='admin_user_edit.php?id={$row['user_name']}'>修改</a></td>";
        echo "<td><a href='admin_user_del.php?id={$row['user_name']}'>删除</a></td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>