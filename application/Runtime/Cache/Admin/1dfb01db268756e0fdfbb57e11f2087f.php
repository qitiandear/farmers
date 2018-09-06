<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0048)http://127.0.0.1:8080/MyWind/admin/infoclass.php -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>晋中开发区农村商业银行</title>
<link href="/public/admincss/admin.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/library/js/guanli.js"></script>

</head>
<body>
<div class="topToolbar"> <span class="title">用户管理</span> <a href="javascript:location.reload();" class="reload">刷新</a></div>

    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="dataTable">
        <tbody><tr align="left" class="head">
            <td width="5%" height="36" class="firstCol"><input type="checkbox" name="checkid" onclick="selectAll(this.checked);"></td>
            <td width="3%">ID</td>
            <td width="40%">栏目名称</td>
           
            <td width="32%" class="endCol">操作</td>
        </tr>
    </tbody></table>
        <div rel="rowpid_0">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="dataTable">
           

        <?php if(is_array($user)): $k = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><tr align="left" class="dataTr">
                <td width="5%" height="36" class="firstCol"><input type="checkbox" name="ids[]"
                 id="<?php echo ($v["userId"]); ?>" value="<?php echo ($v["userId"]); ?>"></td>
                <td width="3%"><?php echo ($k); ?>                    <input type="hidden" name="id[]" id="id[]" value="<?php echo ($v["userId"]); ?>"></td>

                <td width="40%">
                <span class="minusSign" id="rowid_1"><?php echo ($v["userName"]); ?></span></td>
                
                <td width="32%" class="action endCol">  <span><a href="/admin.php/User/update/userId/<?php echo ($v["userId"]); ?>">修改</a></span> | <span class="nb">
                <a href="#" onclick="typeDel(<?php echo ($v["userId"]); ?>)">删除</a></span></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
    </div>
    
        
        
    
<div class="bottomToolbar"> <span class="selArea"><span>选择：</span> <a href="javascript:selectAll()">全部</a> -  <a href="javascript:fselectAll();">反选</a> - <a href="javascript:determine();">删除</a>　</span> <a href="/admin.php/User/index" class="dataBtn">添加管理员</a> </div>
<div class="page">
    <div class="pageText"><?php echo ($pageList); ?></div>
</div>


<script>
    function determine(){
         var valArr = new Array; 
    for(var i=0;i<iobj.length;i++){
      //判断每一个iobj[i]的checked属性
      if(iobj[i].checked==true){
        var id = iobj[i].value; 
        valArr.push(id);
      }
    }
    var vals = valArr.join('.');//转换为逗号隔开的字符串
    console.log(vals);
  
      if(confirm("是否进行批量删除")){
        // document.getElementById("taken_").innerHTML = "<span style='color:green;'>已还书</span>";
         window.location = '/admin.php/User/deleteAll/userId/'+vals;
        }
    }
function typeDel(userId){
    
    if (confirm("是否删除该管理员")) {
            window.location = "/admin.php/User/delete/userId/"+userId;
        }
    }
</script>
</body></html>