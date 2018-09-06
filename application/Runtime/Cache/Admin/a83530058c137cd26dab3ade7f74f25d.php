<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>晋中开发区农村商业银行</title>
  <style>
  body{
    background-image:url('/public/images/320.jpg');
    background-attachment: fixed;
    background-repeat: no-repeat;
    
}


</style>
	 <script type="text/javascript" src="/library/kindeditor/kindeditor.js"></script>
   <script type="text/javascript" src="/library/js/jquery.min.js"></script>
   <link href="/public/admincss/admin.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">
      var editor;
      KindEditor.ready(function(e){
          editor = e.create("[name=content]",{
              width:"1000px",
              height:"400px",
            cssData:'body{font-family:"微软雅黑";font-size:"14px"}'

          });
      });
      //表单验证
      function checkAdd()
      {
    	  if(document.frm.title.value == "")
          {
              alert("请输入文章标题！");
              document.frm.title.focus();
              return false;
          }
    	  else if(editor.html() == "")
          {
              alert("请输入文章内容！");
              editor.focus();
              return false;
          }
      }
    </script>
</head>
<body>
<div class="formHeader"> <span class="title">修改文章</span> <a href="javascript:location.reload();" class="reload">刷新</a> </div>
	<form name="frm" method="post" action="/admin.php/News/save/articleId/<?php echo ($arr["articleId"]); ?>.html" enctype="multipart/form-data" onsubmit="return checkAdd()">
        <table class="addNewsTb" bgcolor="#DCDCDC" border="0" align="center" width="70%">
          <tr>
            <td width="100">文章标题：</td>
            <td><input type="text" name="title" value="<?php echo ($arr["title"]); ?>" size="50"></td>
          </tr>
          <tr>
            <td>文章类型：</td>
            <td>
              <select name="tyId" id="seleHuo">
              <option value=""  >请选择</option>
                <?php if(is_array($arr1)): $i = 0; $__LIST__ = $arr1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if(is_array($v)): $i = 0; $__LIST__ = $v;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vv["typeId"]); ?>"  ><?php echo ($vv["typeName"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
              </select>
              <select name="typeId" id="userTd">
                <option value=""  >请选择</option>
              </select>
            </td>
          </tr>
          <script type="text/javascript">
            $("#seleHuo").live('change', function() {
              var typeId = $(this).val();
              if(typeId != ""){
                //ajax 抓取到用户名传递给服务器端的校验
              var xhr = new XMLHttpRequest();
              xhr.onreadystatechange = function(){
               if(xhr.readyState==4){
              document.getElementById('userTd').innerHTML= xhr.responseText;
               }
              }
                //tp框架使用模式：分组、控制器/操作方法
               xhr.open('get','/admin.php/News/checkType/typeId/'+typeId);
                  xhr.send(null);
              }

            });
            /*onclick="huoqu($this.val);"*/
          </script>
      
          <tr>
            <td>文章日期：</td>
            <td><input type="date" name="date" value="<?php echo ($arr["date"]); ?>" size="50"></td>
          </tr>
           
  
          <tr>
            <td colspan="2"><textarea name="content"><?php echo ($arr["content"]); ?></textarea></td>
          </tr>
          <tr>
            <td colspan="2" align="center">
              <input type="submit" value="修改" class="btn2">
              &nbsp;&nbsp;&nbsp;
              <input type="reset" value="取消" class="btn2">
            </td>
          </tr>
        </table>
        </form>
<script>
  function huoqu(typeId){
    alert(typeId);
    if(typeId != ""){
    //ajax 抓取到用户名传递给服务器端的校验
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
      if(xhr.readyState==4){
        document.getElementById('userTd').innerHTML= xhr.responseText;
      }
    }
    //tp框架使用模式：分组、控制器/操作方法
    xhr.open('get','/admin.php/News/checkType/typeId/'+typeId);
    xhr.send(null);
  }
  }
</script>
</body>
</html>