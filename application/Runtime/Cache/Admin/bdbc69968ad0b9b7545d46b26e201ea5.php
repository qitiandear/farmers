<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>晋中开发区农村商业银行</title>
<link href="/public/admincss/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/library/js/jquery.js"></script>

<script type="text/javascript">
$(function(){	
	//导航切换
	$(".menuson li").click(function(){
		$(".menuson li.active").removeClass("active")
		$(this).addClass("active");
	});
	
	$('.title').click(function(){
		var $ul = $(this).next('ul');
		$('dd').find('ul').slideUp();
		if($ul.is(':visible')){
			$(this).next('ul').slideUp();
		}else{
			$(this).next('ul').slideDown();
		}
	});
})	
</script>


</head>

<body style="background:#f0f9fd;">
	<div class="lefttop"><span></span>通讯录</div>
    
    <dl class="leftmenu">
        
    <dd>
    <div class="title">
    <span><img src="/public/images/leftico01.png" alt="" /></span>管理信息
    </div>
    	<ul class="menuson">
        <li class="active"><cite></cite><a href="index.html" target="rightFrame">首页</a><i></i></li>
        <li ><cite></cite><a href="/admin.php/News/addnews.html" target="rightFrame">添加文章</a><i></i></li>
        <li><cite></cite><a href="/admin.php/News/lister.html" target="rightFrame">文章列表</a><i></i></li>
     <!--    <li><cite></cite><a href="/admin.php/Type/addType.html" target="rightFrame">添加栏目</a><i></i></li>
     <li><cite></cite><a href="/admin.php/Type/listerType.html" target="rightFrame">栏目列表</a><i></i></li>
      -->
        </ul>    
    </dd>
        
    
    <dd>
    <div class="title">
    <span><img src="/public/images/leftico02.png" /></span>管理员设置
    </div>
    <ul class="menuson">
       <!--  <li><cite></cite><a href="/admin.php/User/index.html" target="rightFrame">添加管理员</a><i></i></li>
       <li><cite></cite><a href="/admin.php/User/lister.html" target="rightFrame">管理员列表</a><i></i></li> -->
        <li><cite></cite><a href="/admin.php/User/reseter.html" target="rightFrame">重置密码</a><i></i></li>
        </ul>     
    </dd> 
    
    
<!--     <dd><div class="title"><span><img src="/public/images/leftico03.png" /></span>轮播图</div>
     <ul class="menuson">
     <li><cite></cite><a href="/admin.php/Img/index.html" target="rightFrame">上传图片</a><i></i></li>
     <li><cite></cite><a href="/admin.php/Img/lister.html" target="rightFrame">图片列表</a><i></i></li>
     
     
     </ul>    
     </dd> -->  
   
    <!-- 
   <dd><div class="title"><span><img src="/public/images/leftico04.png" /></span>日期管理</div>
   <ul class="menuson">
       <li><cite></cite><a href="#">自定义</a><i></i></li>
       <li><cite></cite><a href="#">常用资料</a><i></i></li>
       <li><cite></cite><a href="#">信息列表</a><i></i></li>
       <li><cite></cite><a href="#">其他</a><i></i></li>
   </ul>
   
   </dd>  -->  
    
    </dl>
</body>
</html>