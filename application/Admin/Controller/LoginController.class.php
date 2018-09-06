<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
	public function login(){
		$this->display();
	}
	public function check(){
		 
		//判断用户名密码是否正确
		$re = M("admin")->where("username='".$_POST['username']."' and password='".md5($_POST['password'])."'")->find();
		//创建会话变量
		if($re){
			$_SESSION['user'] = $re;
			if($_SESSION['user']['role']==1){
				$this->redirect("__ROOT__/admin.php/Index/main");
			}else if($_SESSION['user']['role']==0){
				$this->redirect("__ROOT__/admin.php/Admin/main");
			}
			
		}else{
			$this->redirect("__ROOT__/admin.php/Login/login");
		}
	}	
	public function quit(){
		$_SESSION = array();
		session_unset();
		session_destroy();

		setcookie(session_name(),'',time()-3600);
		$this->success("退出成功",__ROOT__."/admin.php/Login/login");	
	}

	public function char()
	{
		$arr = M("chars")->where("charId=1")->find();
		$str = $arr['number'];
		$strs = $arr['strs'];
		
		$this->assign("str",$str);
		$this->assign("strs",$strs);
		$this->display();
	}
}