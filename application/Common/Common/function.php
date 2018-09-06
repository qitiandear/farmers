<?php 
//二级栏目划分
function getTypeEll(){
     $type = M("type")->where("fid=0 and state< 9")->select();
     
        foreach ($type as $k => $v) {
       $arr[] =  M("type")->where("fid={$v['typeId']} and state< 9")->select();
        }
        return $arr;
}
//前台header部分
function getTypeAll(){
        $type = M("type")->where("fid=0 and state< 9")->select();
        foreach ($type as $k => $v) {
$type[$k]['typeer'] =  M("type")->where("fid={$v['typeId']} and state< 9")->select();
           
            foreach ($type[$k]['typeer'] as $key => $value) {
             $type[$k]['typeer'][$key]['typesan'] =  M("type")->where("fid={$value['typeId']} and state< 9")->select();
           
            }
            
        }
        return $type;
}
 //ip屏蔽

function getIP() {  
    return $_SERVER['REMOTE_ADDR'];  
}

function check_ip(){  
    $ALLOWED_IP=array('10.97.145.*','10.97.146.*','10.97.147.*','10.97.148.*','127.0.0.1','192.168.130.2');  
    $IP=getIP(); 
    
    $check_ip_arr= explode('.',$IP);//要检测的ip拆分成数组  
    #限制IP  
    if(!in_array($IP,$ALLOWED_IP)) {  
        foreach ($ALLOWED_IP as $val){  
            if(strpos($val,'*')!==false){//发现有*号替代符  
                 $arr=array();//  
                 $arr=explode('.', $val);  
                 $bl=true;//用于记录循环检测中是否有匹配成功的  
                 for($i=0;$i<4;$i++){  
                    if($arr[$i]!='*'){//不等于*  就要进来检测，如果为*符号替代符就不检查  
                        if($arr[$i]!=$check_ip_arr[$i]){  
                            $bl=false;  
                            break;//终止检查本个ip 继续检查下一个ip  
                        }  
                    }  
                 }//end for   
                 if($bl){//如果是true则找到有一个匹配成功的就返回  
                    return;  
                    die;  
                 }  
            }  
        }//end foreach  
        header("location:".__APP__."/News/error.html"); 

        die;  
    }  
    
} 

function getTypeByArr($fid=0,$indentNum=0){
	$arr = M("type")->where("fid=$fid and state< 9")->select();

	static $reArr = array();
	//产生缩进字符串
	$indentStr = str_repeat("——", $indentNum);
	$indentNum++;
	foreach ($arr as $v){
		$reArr[] = array('typeId'=>$v['typeId'],'typeName'=>$indentStr.$v['typeName']);
		getTypeByArr($v['typeId'],$indentNum);
	}
	return $reArr;
}

function getTypes($fid=0){
        static $reArr = array();
        $navtype = M("type")->where("fid=$fid")->select();
        foreach ($navtype as $k => $v) {
            $reArr[] = M("type")->where("fid={$v["typeId"]}")->select(); 
        }
        return $reArr;
}