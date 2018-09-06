<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0048)http://127.0.0.1:8080/MyWind/admin/infoclass.php -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>晋中开发区农村商业银行</title>
<link href="/public/admincss/admin.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/library/js/guanli.js"></script>
<style>
      .pagelist {padding:10px 0; text-align:center;}
.pagelist span,.pagelist a{ border-radius:3px; border:1px solid #dfdfdf;display:inline-block; padding:5px 12px;}
.pagelist a{ margin:0 3px;}
.pagelist span.current{ background:#09F; color:#FFF; border-color:#09F; margin:0 2px;}
.pagelist a:hover{background:#09F; color:#FFF; border-color:#09F; }
.pagelist label{ padding-left:15px; color:#999;}
.pagelist label b{color:red; font-weight:normal; margin:0 3px;}
.tqform{margin-left: 400px;}
.intext{float: left;box-sizing: border-box;height: 30px;width: 300px;outline:none;padding-left: 10px;border:1px solid #999;border-right: 0;}
.seop{float: left;height: 30px;outline:none;border:1px solid #999;}
.insub{border:0;float: left;height: 30px;width: 60px;background: #0068b7;color: #fff;cursor: pointer;}
</style>
</head>
<body>
<div class="topToolbar"> <span class="title">文章管理</span> <a href="javascript:location.reload();" class="reload">刷新</a>
    <form action="/admin.php/News/lister.html" class="tqform">
      <input type="text" class="intext" name="title" placeholder="请输入标题" />
      <select name="tid" id="" class="seop">
        <?php if(is_array($tp)): $k = 0; $__LIST__ = $tp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k; if(($v["typeId"]) == $tid): ?><option value="<?php echo ($v["typeId"]); ?>" selected><?php echo ($v["typeName"]); ?></option>
            <?php else: ?>
            <option value="<?php echo ($v["typeId"]); ?>"  ><?php echo ($v["typeName"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
      </select>
      <input type="submit" value="搜索" class="insub"/>
    </form>
</div>
<form name="form" id="form" method="post" action="">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="dataTable">
        <tbody><tr align="left" class="head">
            <td width="5%" height="36" class="firstCol"><input type="checkbox" name="checkid" onclick="selectAll(this.checked);"></td>
            <td width="23%">文章编号</td>
            <td width="20%">文章标题</td>
           <td width="20%">文章类型</td>
           <td width="20%">发布时间</td>
            <td width="12%" class="endCol">操作</td>
        </tr>
    </tbody></table>
        <div rel="rowpid_0">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="dataTable">
           

        <?php if(is_array($newsInfo)): $k = 0; $__LIST__ = $newsInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><tr align="left" class="dataTr">
                <td width="5%" height="36" class="firstCol"><input type="checkbox" name="ids[]"
                 id="<?php echo ($v["articleId"]); ?>" value="<?php echo ($v["articleId"]); ?>"></td>
                <td width="23%"><?php echo ($k); ?>                    <input type="hidden" name="id[]" id="id[]" value="<?php echo ($v["typeId"]); ?>"></td>
                <td width="20%"><?php echo ($v["title"]); ?></td>
           <td width="20%"><?php echo ($v["typeName"]); ?></td>
           <td width="20%"><?php echo ($v["date"]); ?></td>
            
                
                <td width="12%" class="action endCol">  <span><a href="/admin.php/News/update/articleId/<?php echo ($v["articleId"]); ?>">修改</a></span> | <span class="nb">
                <a href="#" onclick="typeDel(<?php echo ($v["articleId"]); ?>)">删除</a></span></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          
        </table>
    </div>
    
      <div class="pagelist"><?php echo ($pageList); ?> </div>  
        
    </form>
<div class="bottomToolbar"> <span class="selArea"><span>选择：</span> <a href="javascript:selectAll()">全部</a> -  <a href="javascript:fselectAll();">反选</a> - <a href="javascript:determine();">删除</a>　</span> <a href="/admin.php/News/addnews.html" class="dataBtn">添加文章</a> </div>



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
  
      if(confirm("是否进行文章批量删除？")){
        // document.getElementById("taken_").innerHTML = "<span style='color:green;'>已还书</span>";
         window.location = '/admin.php/News/deleteAll/articleId/'+vals;
        }
    }
function typeDel(articleId){
    
    if (confirm("是否删除该文章？")) {
            window.location = "/admin.php/News/delete/articleId/"+articleId;
        }
    }
</script>
</body></html>