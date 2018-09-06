<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>晋中开发区农村商业银行</title>
  <link href="/public/css/style.css" rel="stylesheet" type="text/css" />
  <link href="/public/css/flexslider.css" rel="stylesheet" type="text/css" />

  <script src="/library/js/jquery-1.11.0.min.js" charset="utf-8"></script>
  <script src="/library/js/slider.js" type="text/javascript" ></script>
  <script src="/library/js/common.js" charset="utf-8"></script>
 
</head>
<body>
<div class="kuang">
  <!-- 头部 -->
    
  <div class="top_bg">
    <!-- logo一行 -->
    <div class="logo_top">
      <!-- 左边logo -->
      <div style="float:left;width:auto;">
      <a class="left" href="/index.php/"><img src="/public/images/toplogo.png" /></a>
      </div>
      <!-- 右边搜索框 -->
      <form action="/index.php/Search/index.html" method="get" onsubmit="return Searchword()">
      <div class="top_right">
   
        <!-- 搜索框 -->
        <div class="search float_right">
          <input type="text" class="inpt_a" placeholder="请输入关键字" name="keyword" id="txt_search" />
          <div>
        
            <input type="submit" class="subBg" value="" />
            <!-- <img src="/public/images/sousuo.png" style=""> --> 
           
          </div>
        </div>
      </div>
</form>
      <div class="clear"></div>

    </div>
    <!-- nav -->
    <div id="nav">
      <ul class="c" id="menuList">
        <li><span class="v"><a href="/index.php" class="">首 页</a></span> </li>
        <!-- 个人金融 -->
        <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li> <span class="v"><a href="#"><?php echo ($v["typeName"]); ?></a></span>
          <!-- 个人金融下拉 -->
          

          <div class="kind_menu">

 <?php if(is_array($v["typeer"])): $i = 0; $__LIST__ = $v["typeer"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><span class="nav1">
           
              <h2><a href="/index.php/Listtype/index/typeId/<?php echo ($vv["typesan"]["0"]["typeId"]); ?>"><?php echo ($vv["typeName"]); ?></a></h2>
             
              <div>
              <?php if(is_array($vv["typesan"])): $i = 0; $__LIST__ = $vv["typesan"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($i % 2 );++$i; if($vvv["linkUrl"] != NULL): ?><a href="<?php echo ($vvv["linkUrl"]); ?>"><?php echo ($vvv["typeName"]); ?></a>

             <?php else: ?>

                <a href="/index.php/Listtype/index/typeId/<?php echo ($vvv["typeId"]); ?>"><?php echo ($vvv["typeName"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
              </div>
             
             <!--  <div class="yincang">
               <a class="gengduo" style="color:#fcc37d">更多+</a>
               <div style="display:none">
                 <a href="">信合通VIP卡</a>
                 <a href=>信合通圆梦卡</a>
                 <a href="">信合通红领巾卡</a>
               </div>
             </div> -->
            </span><?php endforeach; endif; else: echo "" ;endif; ?>
          </div>
          
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
  </div>
  <!-- banner -->
  <div class="banner01 slidePanel">
    <ul class="slides" id="gdtp">
    <?php if(is_array($homeimg)): $i = 0; $__LIST__ = $homeimg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href='#'><img width="961" height="259" src='/public/<?php echo ($v["imagepath"]); ?>' /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
    <!-- 中间部分 -->
    <div class="chon">
        <p id="navigation">当前位置：<span><?php echo ($typeone["typeName"]); ?></span> &gt; <span>&nbsp;<a href=""><?php echo ($typeer["typeName"]); ?></a></span> &gt; <span class="col_sred">&nbsp;<a href=""><?php echo ($typesan["typeName"]); ?></a></span></p>
          
        <div class="cowr"><b class="txt_16 col_sred"><?php echo ($typesan["typeName"]); ?></b></div>
        <div class="nev_ch">
            <div class="nev_a">
        <ul id="thirdList">
        <?php if(is_array($listNews)): $k = 0; $__LIST__ = $listNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k; if($new['typeId']==$v['typeId']): ?><li class="hui_ba"><a href="/index.php/Listtype/index/typeId/<?php echo ($v["typeId"]); ?>"><?php echo ($v["typeName"]); ?></a></li>
          <?php else: ?>
          <li ><a href="/index.php/Listtype/index/typeId/<?php echo ($v["typeId"]); ?>"><?php echo ($v["typeName"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
            <div class="nev_b">         
                <div class="navigationSub">
                    <div>
                        <h1 class="f1" id="proName"><?php echo ($new["title"]); ?></h1>
                    </div>
                    <div class="float_right" style="padding-top:5px;"><span id="releaseDate"></span></div>
                </div>
                           
                <div class="sub_content" id="contentDetail">
                    <!-- 产品定义 -->
                    <div class="areaDesc">
                    <?php if($new["imagepath"] != NULL): ?><img src="/public/<?php echo ($new["imagepath"]); ?>" alt="" /><?php endif; ?>
                      <?php echo ($new["content"]); ?>
                      
                </div>         
            </div>
        </div>       
    </div>



  <!-- 底部 -->
  <div class="foot">
		<div class="dw_b">
		 	<div id="ymdbl"><a href="/index.php/Listtype/index/typeId/124" >关于农商行</a>&nbsp;|&nbsp;<a href="/index.php/Listtype/index/typeId/131" >农商快讯</a>&nbsp;|&nbsp;<a href="javascript:viod(0)" >媒体关注</a>&nbsp;|&nbsp;<a href="/index.php/Listtype/index/typeId/133" >服务公示</a>&nbsp;|&nbsp;<a href="/index.php/Listtype/index/typeId/140" >联系我们</a>&nbsp;|&nbsp;<a href="/admin.php">进入后台</a>
		 	</div>
		 	<p class="left txt_12 col_6 marl15" >版权所有@晋中开发区农村商业银行&nbsp; &nbsp; 晋ICP备18003828号</p>
		 	<p class="left txt_12 col_6 marl15"  padding-left: 10px >基金代销业务资格   批准文号/资格证书编号&nbsp; &nbsp;00000121</p>    
			<div class="clear"></div> 
		</div>
		<a href="#"><img style="width:300px;" class="right marr30" src="/public/images/bottomL.png"></a>
		<div class="clear"></div> 
	</div>
  <div class="clear"></div>
</div>
<script type="text/javascript" src="/library/js/davihha.js"></script>
<!-- <div align="center">

  <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1258289861'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1258289861%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));
  </script>

</div> -->

</body>
</html>