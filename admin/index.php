<?php
    session_start();
    if (isset($_SESSION['login']) && $_SESSION['login'] > 0) {
        # 如果存在登录记录则进入后台。注意：因为Cookie被微信禁用，导致$_SESSION，所以用微信登录是无法打开后台的。
        
    }else {
        # 使用脚本重定向回到登录界面
        $url="login.php";
        echo "<script language=\"javascript\">";
        echo "location.href=\"$url\"";
        echo "</script>";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>表白墙后台管理</title>
</head>
<body>
    <p>建设中...</p>
</body>
</html>