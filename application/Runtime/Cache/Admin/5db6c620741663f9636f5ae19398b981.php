<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>晋中开发区农村商业银行</title>
<link href="/public/admincss/admin.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/library/js/jquery.min.js"></script>

<script src="/library/js/guanli.js"></script>
<script type="text/javascript" src="/library/js/checkf.func.js"></script>
<script type="text/javascript" src="/library/js/jquery.js"></script>
</head>
<body>
<div class="formHeader"> <span class="title">修改密码</span> <a href="javascript:location.reload();" class="reload">刷新</a> </div>
<form name="form" id="form" method="post" action="/admin.php/User/savepwd.html" onsubmit="return cfm_upadmin();">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formTable">
        <tbody>
        <tr>
            <td height="40" align="right" width="100px">旧密码：</td>
            <td>
                <input name="oldpwd" type="text" id="oldpwd"  onblur="checkpwd()" class="input">
                <span class="maroon" id="userTd">*</span>
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td height="40" align="right">新密码：</td>
            <td><input name="password" type="password" id="password"  class="input">
                <span class="maroon">*</span></td>
            <td>&nbsp;</td>
        </tr>
      
       <tr>
            <td height="40" align="right">确认密码：</td>
            <td><input name="pwd" type="password" id="repassword"  class="input">
                <span class="maroon">*</span></td>
            <td>&nbsp;</td>
        </tr>    
     
    </tbody></table>
    <div class="formSubBtn">
        <input type="submit" class="submit" value="修改">
        <input type="button" class="back" value="返回" onclick="history.go(-1);">
        
    </div>
</form>
    <script>
               //ajax 无刷新校验用户名
      function checkpwd(){
        //获取被校验的用户名信息
        var nm = document.getElementById("oldpwd").value;
        if(nm != ""){
        //ajax 抓取到用户名传递给服务器端的校验
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if(xhr.readyState==4){
                document.getElementById('userTd').innerHTML= xhr.responseText;
            }
        }
        //tp框架使用模式：分组、控制器/操作方法
        xhr.open('get','/admin.php/User/checkPwd/password/'+nm);
        xhr.send(null);
    }
    }
    </script>
</body></html>