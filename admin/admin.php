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

    if (isset($_POST['act'])) {
        # 请求是否包括act参数

        // 引入数据库连接类
        include_once "../php/connect.php";
        // 实例化数据库连接
        $connectDBS = new connectDataBase();

        $act = $connectDBS->test_input($_POST['act']);
        switch ($act) {
            case 'getPosts':
                # 获取表白

                break;
            case 'deletePosts':
                # 删除某条表白
                $id = $connectDBS->test_input($_POST['id']);
                $sql = "DELETE FROM `saylove_2017_posts` WHERE `id` = $id";
                echo mysqli_query($connectDBS->link, $sql);
                break;
            case 'getComment':
                # 获取某条表白的评论

                break;
            case 'deleteComment':
                # 删除某条评论
                $id = $connectDBS->test_input($_POST['id']);
                $sql = "DELETE FROM `saylove_2017_commtents` WHERE `id` = $id";
                echo mysqli_query($connectDBS->link, $sql);
                break;
            case 'editLikes':
                # 修改点赞数
                $id = $connectDBS->test_input($_POST['id']);
                $targetNum = $connectDBS->test_input($_POST['targetNum']);
                $sql = "UPDATE `saylove_2017_posts` SET `love` = $targetNum WHERE `id` = $id";
                echo mysqli_query($connectDBS->link, $sql);
                break;
            case 'getGuessHistory':
                # 获取某条表白的猜名字历史记录
                $id = $connectDBS->test_input($_POST['id']);
                $sql = "SELECT * FROM `saylove_2017_guess` WHERE `posts_id` = $id";
                // 遍历输出结果

                break;
            case 'editContent':
                # 修改表白内容
                $id = $connectDBS->test_input($_POST['id']);
                $contents = $connectDBS->test_input($_POST['contents']);
                $sql = "UPDATE `saylove_2017_posts` SET `contents` = '$contents' WHERE `id` = $id";
                echo mysqli_query($connectDBS->link, $sql);
                break;
            case 'resendEmail':
                # 重新发送邮件
                include_once '../php/email.php';
                $send = new sendEmail();
                // $send->sendOut($connectDBS->link, $say->uid, $email);

                break;
            default:
                # code...
                break;
        }
    }else {
        echo "wrong";
    }