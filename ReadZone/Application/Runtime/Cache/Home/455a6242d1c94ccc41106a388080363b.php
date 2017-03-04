<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>留言板</title>
	<link rel="stylesheet" type="text/css" media="screen" href="/ReadZone/Public/style/style.css"/>
	<link rel="stylesheet" type="text/css" href="/ReadZone/Public/style/board.css">
    <link rel="stylesheet" type="text/css" href="/ReadZone/Application/Admin/Public/Css/common.css">
</head>
<body>
    	<!-- 遮罩层 -->
    <div id="coverpage"></div>
    <!-- 导航栏 -->
	<div class="topbar">
		<div class="inner">
			<h1 class="logo"><a href="/ReadZone/Home/Index/index" title="">ReadZone</a></h1>
			<ul class="nav">
                <?php if(is_array($cateres)): foreach($cateres as $key=>$v): ?><li <?php if($current == $v['id']): ?>class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-180"<?php endif; ?> >
                    <a href="/ReadZone/Home/Cate/index/id/<?php echo ($v["id"]); ?>"><?php echo ($v["catename"]); ?></a>
                </li><?php endforeach; endif; ?>
			</ul>
	        <ul class="nav topmenu">
				<li id="menu-item-12460" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-12460"><a href="/ReadZone/Home/Message/index">留言板</a></li>
			</ul>
			<div class="loadview">
                <?php if($_SESSION['nickname'] == ''): ?><a href="javascript:;" id="load">登录</a>
				    <a href="javascript:;" id="login">注册</a>
                <?php else: ?>
                    <span style="color:#fff;">欢迎您：</span><a href="#" style="color:#bebebe;text-decoration: none;" id="load"><?php echo $_SESSION['nickname'];?></a>
                    <a href="/ReadZone/Home/Common/logout" id="login">退出</a><?php endif; ?>
		    </div>
		</div>
    </div>
    
    <!-- 登陆界面 -->
    <div class="loadhold">
        <form action="/ReadZone/Home/Index/loginfun" method="post">
            <h3>账户登陆</h3>
            <div class="linelimit">
                <span>账户:</span><input type="text" name="username"></input>
            </div>
            <div class="linelimit">
                <span>密码:</span><input type="password" name="password"></input>
            </div>
            <div class="linelimit">
                <input class="btn btn-primary btn6 mr10" type="submit" value="登陆"></input>
            </div>
            <span id="closeload">&times;</span>
        </form>
    </div>
    <!-- 注册界面 -->
    <div class="loginhold">
        <form action="/ReadZone/Home/Index/add" method="post">
            <h3>用户注册</h3>
            <div class="linelimit">
                <span>账户:</span><input type="text" id="username" name="username">
            </div>
            <div class="linelimit">
                <span>密码:</span><input type="password"  id="password" name="password">
            </div>
            <div class="linelimit">
                <span>重复密码:</span><input type="password" id="repassword" name="repassword">
            </div>
            <div class="linelimit">
                <span>设置昵称:</span><input type="text" id="nickname" name="nickname">
            </div>
            <div class="linelimit">
                <span>上传头像:</span>
                 <input id="pic" name="pic" size="50" value="" type="file">
            </div>       
            <div class="linelimit">
                <span>验证码:</span>
                <input type="text" style="width:40%;float:left;">
                <div class="yanzheng">
                </div>
            </div>
            <div class="linelimit">
                <input class="btn btn-primary btn6 mr10" type="submit" value="注册">
            </div>
            <span id="closelogin">&times;</span>
        </form>
    </div>
    <!-- 留言界面 -->
    <div class="wrapper">
       <div class="content">
        <div class="message-board">
         <h3>留言板</h3>
         <!-- 留白 -->
         <div class="wardhold">
             <img src="/ReadZone/Public/images/psu.jpg">
         </div>
         <!-- 留言板 -->
         <div class="message-hold">
            <h3>留言(<span><?php echo ($count); ?></span>)</h3>
            <?php if(is_array($list)): foreach($list as $key=>$v): ?><div class="reply">
                    <div class="userimg">
                        <img src="/ReadZone/Public/images/userpic.png">
                    </div>
                    <div class="replyhold">
                        <h3><?php echo ($v["nickname"]); ?><span>通过iphone7</span></h3>
                        <div class="replyword">
                            <p><?php echo ($v["content"]); ?></p>
                        </div>
                        <div class="clicktab">
                            <span><?php echo (date("Y-m-d H:i:s",$v["time"])); ?></span>
                            <!-- <a href="javascript:;" class="replyshow">回复</a>
                            <a href="javascript:;" class="replyhide">收起</a>
                            <a href="javascript:;" >送礼</a> -->
                        </div>
                        <!-- <div class="replyit">
                                <div class="replyithold">
                                     <div class="userimg">
                                        <img src="/ReadZone/Public/images/userpic.png">
                                     </div>
                                     <div class="replyhold">
                                        <h3>一行白鹭上青天<span>通过iphone7</span></h3>
                                        <div class="replyitword">
                                            <p>溜得一匹！</p>
                                        </div>
                                        <div class="clicktab">
                                             <span>2016-09-25 16:28 </span>
                                        </div>
                                     </div>
                                </div>                        
                            <div class="written">
                                <form action="/ReadZone/Home/Message/reply" method="post">
                                    <input type="text" placeholder="写下你的回复..." name="content" id="content">
                                    <input type="hidden" name="pid" value="<?php echo ($v["id"]); ?>">
                                    <input type="submit" value="回复" class="btn btn-primary btn6 mr10">
                                </form>
                            </div>
                        </div> -->
                    </div>
                </div><?php endforeach; endif; ?>
            <!-- 分页 -->
            <div class="paging"><?php echo ($page); ?></div>
            <div class="writeit">
                <h3>我要留言</h3>
                <form action="/ReadZone/Home/Message/add" method="post">
                    <input type="text" name="content" id="content">
                    <input type="hidden" name="pid" value="0">
                    <input class="btn btn-primary btn6 mr10" type="submit" value="发表">
                </form>
            </div>
         </div>
        </div>
       </div>
    <!--主体右侧-->
<div class="sidebar">
	<ul class="mypages">
		<li><a rel="nofollow" target="_blank" class="my-a my-tqq" href="http://t.qq.com"><span><strong>腾讯微博</strong></span>腾讯微博 &raquo;</a></li>
		<li><a rel="nofollow" target="_blank" class="my-a my-weibo" href="http://weibo.com"><span><strong>新浪微博</strong></span>新浪微博 &raquo;</a></li>
		<li><a rel="nofollow" target="_blank" class="my-a my-feed" href="http://mail.qq.com"><span><strong>订阅本站</strong></span>订阅本站 &raquo;</a></li>
		<li><a rel="nofollow" target="_blank" class="my-a my-theme" href="http://qzone.qq.com"><span><strong>腾讯博客</strong></span>腾讯博客 &raquo;</a></li>
	</ul>
	<div class="widget widget_categories"><h3 class="widget-tit">文章分类</h3>		
		<ul>
			<?php if(is_array($cateres)): foreach($cateres as $key=>$v): ?><li class="cat-item cat-item-18">
					<a href="/ReadZone/Home/Cate/index/id/<?php echo ($v["id"]); ?>"><?php echo ($v["catename"]); ?></a>
				</li><?php endforeach; endif; ?>
		</ul>
	</div>
	
	<div class="widget widget_recent_entries">		
     	<h3 class="widget-tit">最新发表</h3>		
        <ul>
        	<?php if(is_array($article)): foreach($article as $key=>$v): ?><li>
				<a href="/ReadZone/Home/Article/index/id/<?php echo ($v["id"]); ?>"><?php echo ($v["title"]); ?></a>
			</li><?php endforeach; endif; ?>
		</ul>
	</div>		
  	<div class="widget widget_links"><h3 class="widget-tit">友情链接</h3>
		<ul class='xoxo blogroll'>
			<?php if(is_array($linkres)): foreach($linkres as $key=>$v): ?><li><a href="<?php echo ($v["url"]); ?>" rel="friend" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?>
		 </ul>
  	</div>
 </div>
    </div>
    
    <script type="text/javascript" src="/ReadZone/Public/style/reed.js"></script>
</body>
</html>