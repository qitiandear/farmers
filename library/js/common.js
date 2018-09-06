//应用上下文
var APP_CONTEXT="/jnrcb";
//统一资源应用上下文
//var UNI_RES_APP_CONTEXT="http://32.114.153.181:8080";
var UNI_RES_APP_CONTEXT="";
//江南银行站点定义

var SITEID_JNRCB=2;//江南农商

var domainfolder = {
		"2" : "jnrcb"	
};
function Searchword(){
	var keyword = $("#txt_search").val();
	  if(keyword=="") 
	  {
	  	alert("请输入关键字")
  		return false;
  	  }
	  if(keyword=="请输入关键字") 
	  {
  		  alert("请输入关键字")
		  return false;
  	  }
	  
	  var reg = /^[a-zA-Z0-9\u4e00-\u9fa5()\s]{1,}$/;      
	  var r = keyword.match(reg);    
	  if(r==null)
	  {  
		  alert("含非法字符，请重新输入！");
		  return false;
	  }
}
/**
 * 清楚搜索输入框中的文字
 * @param obj
 * @return
 */
function cleanWord(obj){
	if(obj.value=='请输入关键字'){
		obj.value='';
		obj.style.color="#000";
	}else{
		obj.style.color="#000";
	}
}


/**
 * 获取html请求URL参数
 * @param paraName
 * @return
 */
function getUrlPara(paraName){  
	var strHref =  location.href; 
	var intPos = strHref.indexOf("?");  
	var strRight = strHref.substr(intPos + 1);  
	var arrTmp = strRight.split("&");  
	for(var i = 0; i < arrTmp.length; i++){
		var arrTemp = arrTmp[i].split("="); 
		if(arrTemp[0].toUpperCase() == paraName.toUpperCase())
		return arrTemp[1].replace("#", "");  
	}
		return "";  
}


/**
 * 获取栏目链接地址
 * 
 * @param hasContent 是否有内容，true-外部链接地址
 * @param channelTxt外部链接地址
 * @param channelPath 访问路径
 * @param menuLevel 菜单级别，1-一级菜单，2-二级菜单
 * @param SITEID 站点id
 * @returns {String}
 */
  
//搜索框
  function searchSubmit()
  {  
	  var keyword = $("#txt_search").val();
	  if(keyword=="") 
	  {
  		return;
  	  }
	  if(keyword=="请输入关键字") 
	  {
  		  alert("请输入关键字")
		  return;
  	  }
	  
	  var reg = /^[a-zA-Z0-9\u4e00-\u9fa5()\s]{1,}$/;      
	  var r = keyword.match(reg);    
	  if(r==null)
	  {  
		  alert("含非法字符，请重新输入！");
		  return;
	  }
	  
  	document.getElementById("tips").innerHTML ="加载中...";
  	$.ajax({
  		url : "/jnrcb/searchChannel",
  		type : 'post',
  		dataType : 'json',
  		data : {'searchText':keyword,'siteId':SITEID_JNRCB},
  		success : function(json) {
  			if (json != null && json != undefined) {
  				drawSearchData(json);
  			}
  		},
  		error : function() {
  		}
  	});
  
    document.getElementById("tipsparent").style.display="block";
  	document.getElementById("tips").style.display="block";
  }

  function drawSearchData(json) {
    var $parent=$("#tips");
  	$parent.empty();
  	var $dom=$("<li style=\"line-height:20px;color:#6d6d6d;\"><span><a href='\#\'></a></span></li>");
  	if(json.length==0)
  	{
  		$("#tips").append("<li style='line-height:20px; color:#6d6d6d;'><span>无搜索结果</span></li>");
  	}
  	else
  	{
  		for(var i=0;i<json.length;i++){
  			var c=$dom.clone();
  			var one=json[i].searchChannel;	
  			c.find("a").html("▪ "+one.channelName);
  			var ids = json[i].ids;	//菜单级别
  			if(ids.length==1) {
  				//一级菜单不能点，暂不做处理
  			}	
  			else if(ids.length==2){
  				$.ajax({
  			  		url : "/jnrcb/queryfirstChild",
  			  		type : 'post',
  			     	async: false,
  			  		dataType : 'json',
  			  		data : {'channelId':one.channelId,'siteId':SITEID_JNRCB},
  			  		success : function(json) {
  			  			if (json != null && json != undefined) {
  			  				var firstChild = json.channelInfo.subChannelId;
  			  			    c.find("a").attr("href",getChannelLinkUrl(one.hasContent,one.channelTxt,one.channelPath,SITEID_JNRCB,one.channelId,one.isRelate,one.relateChannelId,ids[0],firstChild));
  			  			}
  			  		},
  			  		error : function() {
  			  		}
  			  	});	
  			} 
              else if(ids.length==3){
              	c.find("a").attr("href",getChannelLinkUrl(one.hasContent,one.channelTxt,one.channelPath,SITEID_JNRCB,ids[1],one.isRelate,one.relateChannelId,ids[0],one.channelId));
  			} 
              else if(ids.length==4){
              	c.find("a").attr("href",getContentLinkUrl(one.hasContent,one.channelTxt,one.channelPath,SITEID_JNRCB,ids[2],one.isRelate,one.relateChannelId,ids[1],ids[0],one.channelId));
  			} 
  	  	    $parent.append(c);
  		}
  	}
  }
  
  var focusValue=false;
  //隐藏搜索框
  function hideTips()
  {
	  if(focusValue==false)
		{
		     document.getElementById("tipsparent").style.display="none";
		     document.getElementById("tips").style.display="none";
		}
    
  }
  
 function getFocusValue()
  {
	  if(focusValue==false){
		  focusValue=true;
      }
	  else{
		  focusValue=false;
		  $("#txt_search").focus();
	  }
  }
  
  //获取系统时间
  function getSysTime()
  {
  	var now = new Date();
  	var year = now.getFullYear();
  	var month = now.getMonth()+1;
  	if(month<10) month='0'+month;
  	var date = now.getDate();
  	if(date<10) date='0'+date;
  	var time = now.toLocaleTimeString();
  	return year+"-"+month+"-"+date+" "+time;
  	
  }
 
  
 /* 20150525*/ 
  //访问二级页面
  function getChannelLinkUrl(hasContent,channelTxt,channelPath,SITEID,channelId,isRelate,relateChannelId,subChannelId,thirdChannelId){
	  var linkUrlReal="";	
	  if(hasContent=="0" && isRelate =="0"){
		  linkUrlReal=APP_CONTEXT+"/zh_CN/"+domainfolder[SITEID]+"/"+"secondLevelPage.html?channelId="+channelId+"&subChannelId="+subChannelId+"&thirdChannelId="+thirdChannelId;
	  }
	  else if(hasContent=="1"){
		  linkUrlReal = channelTxt;
	  }
	  else if(isRelate=="1"){
		  linkUrlReal = getSpecialChannelLinkUrl(hasContent,channelTxt,SITEID,channelId,isRelate,relateChannelId);
	  }
	  return linkUrlReal;	
  }
  
//访问内容页面
  function getContentLinkUrl(hasContent,channelTxt,channelPath,SITEID,channelId,isRelate,relateChannelId,subChannelId,thirdChannelId,forthChannelId){
	   var linkUrlReal="";	 
	    if(hasContent=="0" && isRelate =="0"){
		    linkUrlReal=APP_CONTEXT+"/zh_CN/"+domainfolder[SITEID]+"/"+"thirdLevelPage.html?channelId="+channelId+"&subChannelId="+subChannelId+"&thirdChannelId="+thirdChannelId+"&forthChannelId="+forthChannelId;		
	    }
	    else if(hasContent=="1"){
			linkUrlReal = channelTxt;
		}
	    else if(isRelate=="1"){
	        //return;
	    	linkUrlReal = getSpecialChannelLinkUrl(hasContent,channelTxt,SITEID,forthChannelId,isRelate,relateChannelId);
		}
		return linkUrlReal;	
   }
  
//快捷链接  
  function getSpecialChannelLinkUrl(hasContent,channelTxt,SITEID,channelId,isRelate,relateChannelId){
		var linkUrlReal="";
		var url="";
		if(hasContent=="1"){ //是外部链接
			linkUrlReal=channelTxt;
		}else if(isRelate=="1") { //链接到其他菜单
			var relateChannelId = relateChannelId;
			var array=new Array();
		    array = relateChannelId.split(",");		    	
			
		    //根据数组长度琥获取url
		    if(array.length==1)  //链接到一级菜单
		    {
		    	return;   
		    }
		    
		    if(array.length==2)   //链接到二级菜单
		    {
		    	var firstChild = null;
		    	$.ajax({
			  		url : "/jnrcb/queryfirstChild",
			  		type : 'post',
			     	async: false,
			  		dataType : 'json',
			  		data : {'channelId':array[1],'siteId':SITEID_JNRCB},
			  		success : function(json) {
			  			if (json != null && json != undefined) {
			  				firstChild = json.channelInfo.subChannelId;
			  			}
			  		},
			  		error : function() {
			  		}
			  	});		
		    	linkUrlReal=APP_CONTEXT+"/zh_CN/"+domainfolder[SITEID]+"/"+"secondLevelPage.html?channelId="+array[0]+"&subChannelId="+array[1]+"&thirdChannelId="+firstChild;    	
		    }
		    else if(array.length==3)   //链接到三级菜单
		    {
		    	linkUrlReal=APP_CONTEXT+"/zh_CN/"+domainfolder[SITEID]+"/"+"secondLevelPage.html?channelId="+array[0]+"&subChannelId="+array[1]+"&thirdChannelId="+array[2];
		    }
		    else if(array.length==4)   //链接到四级菜单
		    {	    	
		    	linkUrlReal=APP_CONTEXT+"/zh_CN/"+domainfolder[SITEID]+"/"+"thirdLevelPage.html?channelId="+array[0]+"&subChannelId="+array[1]+"&thirdChannelId="+array[2]+"&forthChannelId="+array[3];			    	
		    }
		}else if(hasContent=="0" && isRelate=="0") //链接到特殊页面
		 {
			linkUrlReal="#";
	     }
		return linkUrlReal;		
	}
  
  function getSys(url){
	  window.open(url);
	  var uac = window.navigator.userAgent;
	  if(uac.indexOf("Windows NT 5.1")>-1 || uac.indexOf("Windows NT 5.2")>-1){
		  alert("尊敬的客户：\n      为避免潜在的网络安全威胁，根据微软根证书成员计划策略，国际认证机构将对基于SHA1算法的域名证书停止支持。\n我行即将于2016年12月底，启动pub.jnbank.cc/pweb/、pro.jnbank.cc/eweb/ 域名证书升级工作。\n      由于Windows XP （SP1/SP2 版本）、Windows 2000等微软早期操作系统版本不支持新SHA256升级算法，届时使用以\n上操作系统的客户将不能正常访问我行个人网银、企业网银、电子商务（B2C、B2B）等电子银行业务。\n为确保您能更好地使用我行电子银行服务，请尽快升级操作系统。\n      如需帮助，请拨打我行客户服务热线：96005。");
	  }

  }
