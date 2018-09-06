<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>晋中开发区农村商业银行</title>
<link href="/public/admincss/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/library/js/jquery.js"></script>
<script type="text/javascript">
$(function(){	
	//顶部导航切换
	$(".nav li a").click(function(){
		$(".nav li a.selected").removeClass("selected")
		$(this).addClass("selected");
	})	
})	
</script>


</head>

<body style="background:url(/public/images/88.png) #046fab no-repeat center 0px;">

    <div class="topleft">
    <a href="main.html" target="_parent"><img src="/public/images/toplogo.png" title="系统首页" /></a>
    </div>
        
    <!-- <ul class="nav">
    <li><a href="default.html" target="rightFrame" class="selected"><img src="/public/images/icon01.png" title="工作台" /><h2>工作台</h2></a></li>
    <li><a href="imgtable.html" target="rightFrame"><img src="/public/images/icon02.png" title="模型管理" /><h2>模型管理</h2></a></li>
    <li><a href="imglist.html"  target="rightFrame"><img src="/public/images/icon03.png" title="模块设计" /><h2>模块设计</h2></a></li>
    <li><a href="tools.html"  target="rightFrame"><img src="/public/images/icon04.png" title="常用工具" /><h2>常用工具</h2></a></li>
    <li><a href="computer.html" target="rightFrame"><img src="/public/images/icon05.png" title="文件管理" /><h2>文件管理</h2></a></li>
    <li><a href="tab.html"  target="rightFrame"><img src="/public/images/icon06.png" title="系统设置" /><h2>系统设置</h2></a></li>
    </ul> -->
            
    <div class="topright">    
    <ul style="margin-top: 20px; " >
    <li><span style="font-size: 24px;"><?php echo ($_SESSION['user']['userName']); ?></span></li>
    <li><a href="/admin.php/Login/quit.html" target="_parent" style="font-size: 24px;">退出</a></li>
    </ul>
     
      
    
    </div>
</body>
</html>