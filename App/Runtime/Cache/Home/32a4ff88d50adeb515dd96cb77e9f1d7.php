<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>微博系统--登录</title>
    <script type="text/javascript" src="/weibo/Public/Home/js/jquery.js"></script>
    <script type="text/javascript" src="/weibo/Public/Home/js/jquery.ui.js"></script>
    <script type="text/javascript" src="/weibo/Public/Home/js/jquery.validate.js"></script>
    <script type="text/javascript" src="/weibo/Public/Home/js/jquery.form.js"></script>
    <script type="text/javascript" src="/weibo/Public/Home/js/login.js"></script>
    <link rel="stylesheet" href="/weibo/Public/Home/css/jquery.ui.css">
    <link rel="stylesheet" href="/weibo/Public/Home/css/login.css">
    <script type="text/javascript">
        var ThinkPHP = {
            'IMG' : '/weibo/Public/<?php echo MODULE_NAME;?>/img',
            'MODULE' : '/weibo/index.php/Home',
        }
    </script>
</head>
<body>

<div id="header"></div>


<div id="main">
    <form action="" id="login">
        <input type="text" name="user" placeholder="用户名">
        <input type="password" name="password" placeholder="密码">
        <input type="submit" name="submit" value="登录">
        <div class="bottom">
            <a href="javascript:void(0)" id="reg_link">注册新用户</a>
            <a href="javascript:void(0)">忘记密码？</a>
        </div>
    </form>

</div>


<div id="footer"></div>
<p class="footer_text">&copy;2009-2014 瓢城 Web 俱乐部. Powered by ThinkPHP.</p>



    <form  id="register" >
        <ol class="reg_error">

        </ol>
        <p>
            <label for="username">账号：</label>
            <input type="text" name="username" class="text" id="username" placeholder="昵称，不小于两位！">
            <span class="star">*</span>
        </p>
        <p>
            <label for="password">密码：</label>
            <input type="password" name="password" class="text" id="password" placeholder="密码，不小于6位！">
            <span class="star">*</span>
        </p>
        <p>
            <label for="repassword">密码：</label>
            <input type="password" name="repassword" class="text" id="repassword" placeholder="再次输入密码！">
            <span class="star">*</span>
        </p>
        <p>
            <label for="email">邮箱：</label>
            <input type="text" name="email" class="text" id="email" placeholder="电子邮箱，用于找回密码！">
            <span class="star">*</span>
        </p>
    </form>



</body>
</html>