<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/ReadZone/Application/Admin/Public/Css/common.css"/>
    <link rel="stylesheet" type="text/css" href="http://localhost/ReadZone/Application/Admin/Public/Css/main.css"/>
    <script type="text/javascript" src="http://localhost/ReadZone/Application/Admin/Public/Js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="/ReadZone/Admin/Index/index">ReadZone后台管理</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">管理员:<?php echo $_SESSION['username'] ?></a></li>
                <li><a href="/ReadZone/Admin/Admin/edit/id/<?php echo $_SESSION['id']?>">修改密码</a></li>
                <li><a href="/ReadZone/Admin/Admin/logout">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
     <div class="sidebar-wrap">
    <div class="sidebar-title">
        <h1>菜单</h1>
     </div>
    <div class="sidebar-content">
        <ul class="sidebar-list">
            <li>
                <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                <ul class="sub-menu">
                    <li><a href="/ReadZone/Admin/Article/lst"><i class="icon-font">&#xe005;</i>文章管理</a></li>
                    <li><a href="/ReadZone/Admin/Cate/lst"><i class="icon-font">&#xe006;</i>文章分类管理</a></li>
                    <li><a href="/ReadZone/Admin/Admin/lst"><i class="icon-font">&#xe003;</i>管理员管理</a></li>
                    <li><a href="/ReadZone/Admin/Message/lst"><i class="icon-font">&#xe004;</i>留言管理</a></li>
                    <li><a href="design.html"><i class="icon-font">&#xe012;</i>评论管理</a></li>
                    <li><a href="/ReadZone/Admin/Link/lst"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                <ul class="sub-menu">
                    <li><a href="system.html"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                    <li><a href="system.html"><i class="icon-font">&#xe037;</i>清理缓存</a></li>
                    <li><a href="system.html"><i class="icon-font">&#xe046;</i>数据备份</a></li>
                    <li><a href="system.html"><i class="icon-font">&#xe045;</i>数据还原</a></li>
                </ul>
            </li>
        </ul>
    </div>
 </div>


<!-- <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="/ReadZone/Admin/Article/lst"><i class="icon-font">&#xe005;</i>文章管理</a></li>
                        <li><a href="/ReadZone/Admin/Cate/lst"><i class="icon-font">&#xe006;</i>分类管理</a></li>
                        <li><a href="/ReadZone/Admin/Link/lst"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                        <li><a href="/ReadZone/Admin/Admin/lst"><i class="icon-font">&#xe008;</i>管理员管理</a></li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </div> -->
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/ReadZone/Admin/Index/index">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">文章管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/ReadZone/Admin/Article/search" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="70">文章搜索:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" action="" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="/ReadZone/Admin/Article/add"><i class="icon-font"></i>新增文章</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th width="4%" >ID</th>
                            <th>文章标题</th>
                            <th width="14%" >缩略图</th>
                            <th width="8%" >所属栏目</th>
                            <th width="10%">操作</th>
                        </tr>
                        <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
                                <td width="4%"><?php echo ($v["id"]); ?></td>
                                <td title=""><a target="_blank" href="#" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a>
                                </td>
                                <td>
                                <?php if($v['pic'] != ''): ?><img src="/ReadZone<?php echo ($v["pic"]); ?>" height="35">
                                <?php else: ?>
                                    暂无缩略图<?php endif; ?>
                                </td>
                                <td><?php echo ($v["catename"]); ?></td>
                                <td>
                                    <a class="link-update" href="/ReadZone/Admin/Article/edit/id/<?php echo ($v["id"]); ?>"><i class="icon-font">&#xe045;</i> 修改</a>
                                    <a class="link-del" onclick="return confirm('确定要删除该文章吗？？？');" href="/ReadZone/Admin/Article/del/id/<?php echo ($v["id"]); ?>"><i class="icon-font">&#xe037;</i> 删除</a>
                                </td>
                            </tr><?php endforeach; endif; ?>
                    </table>
                    <div class="list-page"><?php echo ($page); ?></div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>