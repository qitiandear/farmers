<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0068)http://127.0.0.1:8080/MyWind/admin/infoclass_add.php?infotype=0&id=3 -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>晋中开发区农村商业银行</title>
<link href="/public/admincss/admin.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/library/js/jquery.min.js"></script>


<script type="text/javascript" src="/library/js/checkf.func.js"></script>
</head>
<body>
<div class="formHeader"> <span class="title">修改栏目</span> <a href="javascript:location.reload();" class="reload">刷新</a> </div>
<form name="form" id="form" method="post" action="/admin.php/Type/save/typeId/<?php echo ($arr["typeId"]); ?>.html" onsubmit="return cfm_infoclass();">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formTable">
        <tbody>
      
        <tr>
            <td height="40" align="right">栏目名称：</td>
            <td><input name="typeName" type="text" id="classname"   value="<?php echo ($arr["typeName"]); ?>" class="input">
                <span class="maroon">*</span></td>
            <td>&nbsp;</td>
        </tr>
      
      
        <tr>
            <td height="40" align="right">跳转链接：</td>
            <td><input type="text" name="linkUrl" id="linkurl" value="<?php echo ($arr["linkUrl"]); ?>" placeholder="http://www.baidu.com" class="input"></td>
            <td>&nbsp;</td>
        </tr>
    
     
    </tbody></table>
    <div class="formSubBtn">
        <input type="submit" class="submit" value="修改">
        <input type="button" class="back" value="返回" onclick="history.go(-1);">
        
    </div>
</form>

</body></html>