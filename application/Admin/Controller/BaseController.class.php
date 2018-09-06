<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller{
	public function _initialize(){
		
		//用户是否登录
		if(!isset($_SESSION['user'])){
			//跳转
			$this->redirect("__ROOT__/admin.php/Login/login");
			
		}
		
	}
	
}