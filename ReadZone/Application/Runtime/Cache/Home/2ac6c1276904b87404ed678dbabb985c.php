<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" media="screen" href="/ReadZone/Public/style/style.css"  />
	<link rel="stylesheet" type="text/css" href="/ReadZone/Public/style/board.css">
	<script src="/ReadZone/Public/style/jquery.min.js"></script> 
	<script src="/ReadZone/Public/style/post.js"></script>
	<title>ReadZone阅读网</title>		
	<style type="text/css">
		img.wp-smiley,
		img.emoji {
			display: inline !important;
			border: none !important;
			box-shadow: none !important;
			height: 1em !important;
			width: 1em !important;
			margin: 0 .07em !important;
			vertical-align: -0.1em !important;
			background: none !important;
			padding: 0 !important;
		}
	</style>
<!-- 跳出 -->
<script type="text/javascript">if (top.location != self.location) { top.location=self.location }</script>
</head>
<body class="single single-post postid-42805 single-format-standard">
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
<div class="wrapper">
	<div class="content">
        <div class="meta">
			<h1 class="meta-tit"><?php echo ($arts["title"]); ?></h1>
			<p class="meta-info">发表：<a href="/ReadZone"><?php echo ($catename); ?></a> &nbsp;&nbsp; 发表日期：<?php echo (date('Y-m-d',$arts["time"])); ?> &nbsp;&nbsp; </p>
		</div>

<!-- 广告代码2 -->
<div class="entry">
	<p><img class="aligncenter size-full wp-image-42806" src="/ReadZone<?php echo ($arts["pic"]); ?>"  width="630" height="399" srcset="" sizes="(max-width: 630px) 100vw, 630px" /></p>
	<?php echo htmlspecialchars_decode($arts['content']);?>
</div>

<div>
<?php if($prevs): ?><strong>上一篇：</strong>
<a class="prev-post icon-right" href="/ReadZone/Home/Article/index/id/<?php echo ($prevs["id"]); ?>">
<?php echo ($prevs["title"]); ?></a>
<?php else: ?>
<strong>上一篇：没有了</strong><?php endif; ?>
</div>

<div style="margin:10px 0;">
<?php if($nexts): ?><strong>下一篇：</strong>
<a class="next-post" href="/ReadZone/Home/Article/index/id/<?php echo ($nexts["id"]); ?>">
<?php echo ($nexts["title"]); ?></a> 
<?php else: ?>
<strong>下一篇：没有了</strong><?php endif; ?>
</div>

<!-- 分享代码 -->
<div class="baidufenxiang" style="overflow:auto;"><!-- Baidu Button BEGIN -->
	<div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare">
		<a class="bds_bdhome"></a>
		<a class="bds_renren"></a>
		<a class="bds_kaixin001"></a>
		<a class="bds_douban"></a>
		<a class="bds_youdao"></a>
		<a class="bds_sqq"></a>
		<a class="bds_hi"></a>
		<a class="bds_baidu"></a>
		<a class="bds_qq"></a>
		<a class="bds_tqq"></a>
		<a class="bds_tsina"></a>
		<a class="bds_qzone"></a>
		<a class="bds_mshare"></a>
		<span class="bds_more"></span>
		<a class="shareCount"></a>
	</div>
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=53164" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script>
<!-- Baidu Button END -->
</div>

<!-- 广告代码1 -->

<!-- 百度推荐 -->
<div style="margin-left: -12px; margin-bottom: -3px;">
<script>document.write(unescape('%3Cdiv id="hm_t_61751"%3E%3C/div%3E%3Cscript charset="utf-8" src="http://crs.baidu.com/t.js?siteId=99c2c06a529fc4c8787deb597141fe76&planId=61751&async=0&referer=') + encodeURIComponent(document.referrer) + '&title=' + encodeURIComponent(document.title) + '&rnd=' + (+new Date) + unescape('"%3E%3C/script%3E'));</script>
</div>

<div class="message-board" style="margin-top:20px;">
    	 <div class="message-hold">
    	 	<h3>评论区(<span>10</span>)</h3>
    	 	<div class="reply">
    	 		<div class="userimg">
    	 			<img src="/ReadZone/Public/images/userpic.png">
    	 		</div>
    	 		<div class="replyhold">
    	 			<h3>一行白鹭上青天<span>通过iphone7</span></h3>
    	 			<div class="replyword">
    	 				<p>溜得一匹！</p>
    	 			</div>
    	 			<div class="clicktab">
    	 				<span>2016-09-25 16:28 </span>
    	 				<a href="javascript:;" class="replyshow">回复</a>
    	 				<a href="javascript:;" class="replyhide">收起</a>
    	 				<a href="javascript:;" >送礼</a>
    	 			</div>
    	 			<div class="replyit">
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
	    	 				         <span>2016-09-25 16:28</span>
	    	 				    </div>
	                         </div>
	    	 			</div>
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
	    	 				<input type="text" placeholder="写下你的回复..."></input>
	    	 				<input type="button" value="回复"></input>
	    	 			</div>
    	 			</div>
    	 		</div>
    	 	</div>
    	 	<div class="reply">
    	 		<div class="userimg">
    	 			<img src="/ReadZone/Public/images/userpic.png">
    	 		</div>
    	 		<div class="replyhold">
    	 			<h3>一行白鹭上青天<span>通过iphone7</span></h3>
    	 			<div class="replyword">
    	 				<p>溜得一匹！</p>
    	 			</div>
    	 			<div class="clicktab">
    	 				<span>2016-09-25 16:28 </span>
    	 				<a href="javascript:;" class="replyshow">回复</a>
    	 				<a href="javascript:;" class="replyhide">收起</a>
    	 				<a href="javascript:;" >送礼</a>
    	 			</div>
    	 			<div class="replyit">
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
	    	 				<input type="text" placeholder="写下你的回复..."></input>
	    	 				<input type="button" value="回复"></input>
	    	 			</div>
    	 			</div>
    	 		</div>
    	 	</div>
    	 	<div class="reply">
    	 		<div class="userimg">
    	 			<img src="/ReadZone/Public/images/userpic.png">
    	 		</div>
    	 		<div class="replyhold">
    	 			<h3>一行白鹭上青天<span>通过iphone7</span></h3>
    	 			<div class="replyword">
    	 				<p>溜得一匹！</p>
    	 			</div>
    	 			<div class="clicktab">
    	 				<span>2016-09-25 16:28 </span>
    	 				<a href="javascript:;" class="replyshow">回复</a>
    	 				<a href="javascript:;" class="replyhide">收起</a>
    	 				<a href="javascript:;" >送礼</a>
    	 			</div>
    	 			<div class="replyit">
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
	    	 				<input type="text" placeholder="写下你的回复..."></input>
	    	 				<input type="button" value="回复"></input>
	    	 			</div>
    	 			</div>
    	 		</div>
    	 	</div>
    	 	<!-- 分页 -->
    	 	<div class="paging">

    	 	</div>
    	 	<div class="writeit">
    	 	    <h3>我要评论</h3>
    	 		<input type="text"></input>
    	 		<input type="submit" value="发表"></input>
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
<!--主体尾部-->
<div class="footer">
	<div class="inner">
		<div class="manage">
			<a target="_blank" href="">站内导航</a> 	
        </div>		
		<div class="copyright">
			<a href="">ReadZone阅读网</a>，版权所有！ &copy; 2016 <img src="" /> <a rel="nofollow" target="_blank" href="">吉公网安备XXXXXXXXXXXXXXXXXX号</a> <a rel="nofollow" target="_blank" href="">吉ICP备XXXXXXXXX号-X</a>
		</div>
	</div>
</div>


<script type="text/javascript" src="/ReadZone/Public/style/reed.js"></script>
<script>
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';        
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>
</body>
</html>