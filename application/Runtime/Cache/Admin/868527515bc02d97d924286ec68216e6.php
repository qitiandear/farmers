<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0068)http://127.0.0.1:8080/MyWind/admin/infoclass_add.php?infotype=0&id=3 -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>晋中开发区农村商业银行</title>
<link href="/public/admincss/admin.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/library/js/jquery.min.js"></script>

<script src="/library/js/guanli.js"></script>
<script type="text/javascript" src="/library/js/checkf.func.js"></script>
</head>
<body>
<div class="formHeader"> <span class="title">修改管理员</span> <a href="javascript:location.reload();" class="reload">刷新</a> </div>
<form name="form" id="form" method="post" action="/admin.php/User/save/userId/<?php echo ($arr["userId"]); ?>.html" onsubmit="return cfm_infoclass();">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formTable">
        <tbody>
        <tr>
            <td height="40" align="right" width="100px">用户名：</td>
            <td>
                <input name="userName" type="text" id="classname"  value="<?php echo ($arr["userName"]); ?>" class="input">
                <span class="maroon">*</span>
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td height="40" align="right">权限划分：</td>
            <td width="80%" style="line-height: 30px; font-size: 15px;">
             <?php if(is_array($arr2)): $i = 0; $__LIST__ = $arr2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if(is_array($v)): $i = 0; $__LIST__ = $v;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i; if(in_array(($vv["typeId"]), is_array($arr["qxId"])?$arr["qxId"]:explode(',',$arr["qxId"]))): ?><input type="checkbox"  name="ids[]" id="<?php echo ($v["id"]); ?>" value="<?php echo ($vv["typeId"]); ?>" checked/>&nbsp;<span style="display:inline-block;min-width: 80px;"><?php echo ($vv["typeName"]); ?></span>&nbsp;
                <?php else: ?>
                <input type="checkbox"  name="ids[]" id="<?php echo ($v["id"]); ?>" value="<?php echo ($vv["typeId"]); ?>"/>&nbsp;<span style="display:inline-block;min-width: 80px;"><?php echo ($vv["typeName"]); ?></span>&nbsp;<?php endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
            <span style="float: right;margin-right: 50px;" >
                <a href="javascript:selectAll()">全选</a>&nbsp;|&nbsp;<a href="javascript:fselectAll()">反选</a>&nbsp;</span>
            </td>
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
        var nm = document.getElementById("username").value;
        if(nm != ""){
        //ajax 抓取到用户名传递给服务器端的校验
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if(xhr.readyState==4){
                document.getElementById('userTd').innerHTML= xhr.responseText;
            }
        }
        //tp框架使用模式：分组、控制器/操作方法
        xhr.open('get','/admin.php/User/checkNM/userName/'+nm);
        xhr.send(null);
    }
    }
</script>
</body></html>