<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>晋中开发区农村商业银行</title>
	<link href="/public/css/style.css" rel="stylesheet" type="text/css" />
	<link href="/public/css/flexslider.css" rel="stylesheet" type="text/css" />
	<script src="/library/js/jquery-1.11.0.min.js" charset="utf-8"></script>
	<script src="/library/js/slider.js" type="text/javascript" ></script>
	<script src="/library/js/jcarousellite.min.js" language="javascript"></script>
	<script src="/library/js/common.js" charset="utf-8"></script>
	<style type="text/css">
		.flex-direction-nav .flex-prev {display:none;}
	</style>
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
	<div class="ch_zankai">
		<!-- 滚动图标 -->
		<div>
			<div class="left_arrow" id="prev" style="float:left; margin-left:15px;">
				<img src="/public/images/left_arrow.jpg" width="26" height="141" style="cursor:pointer;">
			</div>
			<div class="xp_xj" id="jcNewProduct"> 
				<ul id="kjcd">
					<li><a href="/index.php/Listtype/index/typeId/10"><img src="/public/images/4140.png"  height="59px" width="68px"><br />银行卡</a></li>
					<li><a href="/index.php/Listtype/index/typeId/17"><img src="/public/images/licai1.png"  width="68px"><br />理财产品</a></li>
					<li><a href="/index.php/Listtype/index/typeId/21"><img src="/public/images/jinshu1.png"  height="59px" width="68px"><br />贵金属</a></li>
					<li><a href="/index.php/Listtype/index/typeId/33"><img src="/public/images/gerendaikuan1.png"  height="59px" width="68px"><br />个人贷款</a></li>
					<li><a href="/index.php/Listtype/index/typeId/43"><img src="/public/images/4073.png"  height="59px" width="68px"><br />存款业务</a></li>
					<li><a href="/index.php/Listtype/index/typeId/56"><img src="/public/images/jiesuan1.png"  height="59px" width="68px"><br />结算业务</a></li>
					<li><a href="/index.php/Listtype/index/typeId/63"><img src="/public/images/4075.png"  height="59px" width="68px"><br />公司贷款</a></li>
					<li><a href="/index.php/Listtype/index/typeId/71"><img src="/public/images/4146.png"  height="59px" width="68px"><br />掌上银行</a></li>
					<li><a href="/index.php/Listtype/index/typeId/75"><img src="/public/images/4144.png"  height="59px" width="68px"><br />网上银行</a></li>
					<li><a href="/index.php/Listtype/index/typeId/80"><img src="/public/images/zizhu1.png"  height="59px" width="68px"><br />自助银行</a></li>
					<li><a href="/index.php/Listtype/index/typeId/88"><img src="/public/images/4099.png"  height="59px" width="68px"><br />同业财富</a></li>
					<li><a href="/index.php/Listtype/index/typeId/105"><img src="/public/images/4142.png"  height="59px" width="68px"><br />信用卡</a></li>
					<li><a href="/index.php/Listtype/index/typeId/116"><img src="/public/images/youhui1.png"  height="59px" width="68px"><br />优惠活动</a></li>
					<li><a href="/index.php/Listtype/index/typeId/115"><img src="/public/images/tehui1.png"  height="59px" width="68px"><br />特惠商户</a></li>
					
				</ul>
			</div>
			<div class="right_arrow" id="next"><img src="/public/images/right_arrow.jpg" width="26" height="141" style="cursor:pointer;"></div>
		</div>
		<!-- 四列主要内容 -->
		<div class="kjyi">
			<ul>
				<li><h4>优惠活动</h4>
					<div id="yhhd">
					<?php if(is_array($yhhd)): $i = 0; $__LIST__ = $yhhd;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="/index.php/News/index/articleId/<?php echo ($v["articleId"]); ?>" title="<?php echo ($v["title"]); ?>">▪ <?php echo (msubstr($v["title"],0,15)); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<div class="input_z" id="yhhdMore"><a href="/index.php/Listtype/index/typeId/116">更多>> </a><div>
				</li>
				<li><h4>最新公告</h4>
					<div id="zxgg">
					<?php if(is_array($zxgg)): $i = 0; $__LIST__ = $zxgg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="/index.php/News/index/articleId/<?php echo ($v["articleId"]); ?>" title="<?php echo ($v["title"]); ?>">▪ <?php echo (msubstr($v["title"],0,15)); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
					

					</div>
					<div class="input_z" id="zxggMore"><a href="/index.php/Listtype/index/typeId/130">更多>> </a><div>
				</li>
				<li><h4>农商快讯</h4>
					<div id="gsxw">
					<?php if(is_array($nskx)): $i = 0; $__LIST__ = $nskx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="/index.php/News/index/articleId/<?php echo ($v["articleId"]); ?>" title="<?php echo ($v["title"]); ?>">▪ <?php echo (msubstr($v["title"],0,15)); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<div class="input_z" id="gsxwMore"><a href="/index.php/Listtype/index/typeId/131">更多>> </a><div>
				</li>
				<li class="vb hy"><h4>客户服务</h4>
					<div id="khfw">
					<?php if(is_array($khfw)): $i = 0; $__LIST__ = $khfw;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="/index.php/Listtype/index/typeId/<?php echo ($v["typeId"]); ?>"><?php echo (msubstr($v["typeName"],0,15)); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>


					

					</div>
				</li>
	 		</ul>
	 	</div>
	 	<div class="clear"></div>
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