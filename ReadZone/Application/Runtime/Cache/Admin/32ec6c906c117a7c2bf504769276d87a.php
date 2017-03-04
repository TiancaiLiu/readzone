<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ReadZone后台登录</title>
    <link href="http://localhost/ReadZone/Application/Admin/Public/Css/admin_login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="admin_login_wrap">
    <h1>ReadZone后台管理</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="/ReadZone/Admin/Login/index" method="post">
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="username" value="" id="user" size="35" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="password" value="" id="pwd" size="35" class="admin_input_style" />
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="登录" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>