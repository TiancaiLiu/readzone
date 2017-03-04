<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/ReadZone/Application/Admin/Public/Css/common.css"/>
    <link rel="stylesheet" type="text/css" href="http://localhost/ReadZone/Application/Admin/Public/Css/main.css"/>
    <script type="text/javascript" src="http://localhost/ReadZone/Application/Admin/Public/Js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="http://localhost/ReadZone/Application/Admin/Public/Ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="http://localhost/ReadZone/Application/Admin/Public/Ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" src="http://localhost/ReadZone/Application/Admin/Public/Ueditor/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript">
        UE.getEditor('content',{initialFrameWidth:1500,initialFrameHeight:400,});
    </script>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="/ReadZone/Admin/Index/index">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/ReadZone/Admin/Article/lst">文章管理</a><span class="crumb-step">&gt;</span><span>修改文章</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/ReadZone/Admin/Article/edit" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo ($article_s["id"]); ?>">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>文章名称：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="50" value="<?php echo ($article_s["title"]); ?>" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>文章描述：</th>
                                <td>
                                    <textarea style="width:400px; height:100px;" name="desc"><?php echo ($article_s["desc"]); ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>缩略图：</th>
                                <td>
                                    <input id="pic" name="pic" size="50" value="" type="file">
                                    <?php if($article_s['pic'] != ''): ?><img src="/ReadZone<?php echo ($article_s["pic"]); ?>" height="30">
                                    <?php else: ?>
                                    暂无缩略图<?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>所属栏目：</th>
                                <td>
                                    <select name="cateid">
                                        <option value="">请选择分类</option>
                                        <?php if(is_array($cateres)): $i = 0; $__LIST__ = $cateres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option <?php if($vo['id'] == $article_s['cateid']): ?>selected="selected"<?php endif; ?> value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["catename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>内容：</th>
                                <td>
                                    <textarea  id="content" name="content"><?php echo ($article_s["content"]); ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>