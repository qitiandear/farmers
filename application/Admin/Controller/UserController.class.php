<?php
namespace Admin\Controller;
use Think\Upload;//导入上传类
use Think\Page;//导入分页
class UserController extends BaseController 
{
	//密码验证
	public  function checkPwd()
	{
		$password = $_GET['password'];
		$userId = $_SESSION['user']['userId'];

			$info = M("admin")->where("password='".md5($password)."' and userId={$userId}")->find();
		
			if($info == NULL){
				echo "<span style='color:red;'>旧密码错误<span>";
			}else{
				echo "<span style='color:green;'>旧密码正确</span>";
			}
	}
	//添加用户测试用户名
	public function checkNM()
	{
		$userName = $_GET['userName'];
			
			$info = M("admin")->where("username='{$userName}'")->find();
	
			if($info == NULL){
				echo "<span style='color:green;'>用户名可以使用<span>";
			}else{
				echo "<span style='color:red;'>用户名已存在</span>";
			}
	}
	//重置密码
	public function reseter(){
		$this->display();
	}
	public function savepwd()
	{
		$password = $_POST['oldpwd'];
		if($password){

			$userId = $_SESSION['user']['userId'];
			$rst = M("admin")->where("userId = {$userId}")->find();
			if($rst['password']==md5($password)){
				
			$sql = "update admin set password='".md5($_POST['password'])."' where userId = {$userId}";
			$art = M()->execute($sql);
			if($art){
				$this->success("修改密码成功",__ROOT__."/admin.php/User/reseter.html");
					exit;
			}else{
				$this->success("修改密码失败",__ROOT__."/admin.php/User/reseter.html");
					exit;
			}
			
		}else
		{
			$this->success("密码错误,修改失败",__ROOT__."/admin.php/User/reseter.html");
			exit;
		}
		}else{
			$this->success("修改密码失败",__ROOT__."/admin.php/User/reseter.html");
			exit;
		}
	}
	//批量删除
	public function deleteAll($userId)
	{	
		$userId = $_GET['userId'];
		$word = explode('.',$userId);

		for($i = 0;$i<count($word);$i++){
			$str .= "or userId=". $word[$i]." ";
			
		}
		$str = substr($str, 2);
		
		//修改表 state=9
		$arr = M()->execute("delete  from admin  where $str");
		
			if($arr>0){
			$this->success("删除管理员成功",__ROOT__."/admin.php/User/lister.html");
			exit;
		}else{
			$this->success("删除管理员失败",__ROOT__."/admin.php/User/lister.html");
			exit;
		}
	}
	//单个删除管理
	public function delete($userId)
	{
		$userId = $_GET['userId'];
		if($userId!=$_SESSION['user']['userId']){
			if($userId){
			$rst = M("admin")->where("userId = {$userId}")->delete();
			if($rst){
			$this->success("删除管理员成功",__ROOT__."/admin.php/User/lister");
				exit;
		}else{
				$this->success("删除管理员失败",__ROOT__."/admin.php/User/lister");
				exit;
		}
		}
	}else{
		$this->success("删除管理员失败",__ROOT__."/admin.php/User/lister");
				exit;
	}
		
	}
	//修改用户名
	public function save($userId)
	{
		$userId = $_GET['userId'];
		$userName = $_POST['userName'];
		$qxId = implode(",",$_POST['ids']);
		if($userId){
			$data['userName'] = $userName;
			$data['qxId'] = $qxId;
			$rst = M('admin')->where('userId='.$userId)->save($data);
			if($rst){
				$this->success("修改管理员成功",__ROOT__."/admin.php/User/lister");
					exit;
			}else{
				$this->success("修改管理员失败",__ROOT__."/admin.php/User/lister");
					exit;
			}
		}
	}
	//添加后台用户
	public function add()
	{
		if($_POST){

		$userName = $_POST['userName'];
		$info = M("admin")->where("username='{$userName}'")->find();
	
			if($info == NULL){
				
			
		$password = md5($_POST['password']);
		$qxId = implode(",",$_POST['ids']);
		$sql = "insert into admin(userName,password,qxId) values ('{$userName}','{$password}','{$qxId}')";
		
		$rst = M()->execute($sql);
		if($rst){
			$this->success("添加管理员成功",__ROOT__."/admin.php/User/index");
				exit;
		}else{
				$this->success("添加管理员失败",__ROOT__."/admin.php/User/index");
				exit;
		}
		
	  }else{
				$this->success("用户名已存在",__ROOT__."/admin.php/User/index");
				exit;
		}
	}
		$this->display();
	}
	public function index()
	{
		$arr = getTypeEll();
		$this->assign("arr",$arr);

		$this->display();
	}
	public function lister(){
		$user = M("admin")->where("state < 9")->select();
		$this->assign("user",$user);
		$this->display();
	}
	public function update($userId)
	{
		$arr2 = getTypeEll();
		$this->assign("arr2",$arr2);
		$userId = $_GET['userId'];
		if($userId){
			$arr = M("admin")->where("userId = {$userId}")->find();
			$this->assign("arr",$arr);
			$this->display();
		}
	}
}
