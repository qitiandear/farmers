<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>晋中开发区农村商业银行</title>
<link href="/public/admincss/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/library/js/jquery.js"></script>
<script src="/library/js/cloud.js" type="text/javascript"></script>

<script language="javascript">
	$(function(){
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
	$(window).resize(function(){  
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
    })  
});  
 funciton 
</script> 

</head>

<body style="background-color:#1c77ac; background-image:url(/public/images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">



    <div id="mainBody">
      <div id="cloud1" class="cloud"></div>
      <div id="cloud2" class="cloud"></div>
    </div>  


<div class="logintop">    
    <span>欢迎登录后台管理界面平台</span>    
    <ul>
    <li><a href="/index.php">回首页</a></li>
    
    </ul>    
    </div>
    
    <div class="loginbody">
    
    <span class="systemlogo"></span> 
       
    <div class="loginbox">
    <form action="/admin.php/Login/check.html" method="post" onsubmit="return checkAdd()">
    <ul>
    <li><input name="username" type="text" class="loginuser" placeholder="用户名" id="username"/></li>
    <li><input name="password" type="password" class="loginuser" placeholder="密码" id="password"/></li>
    <li><input  type="submit" class="loginbtn" value="登录"   />

    </li>
    </ul>
    </form>
    
    </div>
    
    </div>
    
    
    
    <div class="loginbm">版权所有  山西菲达科技有限公司</div>
</body>
</html>