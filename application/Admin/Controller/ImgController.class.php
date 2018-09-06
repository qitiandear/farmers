<?php
namespace Admin\Controller;
use Think\Upload;//导入上传类
use Think\Page;//导入分页
class ImgController extends BaseController 
{
		public function index(){
			$this->display();
			
		}
		public function add()
		{
			$imagepath = "";//文章图片
			 
			//上传图片
			$upload=new \Think\Upload();
			//设置
			$upload->mimes=array('image/png','image/gif','image/jpeg');
			$upload->autoSub=false;
			//设置保存路径的根目录
		    $upload->rootPath = "./";
		    //保存路径
		    $upload->savePath = "public/newspicture/";
			$upload->saveName=array('uniqid');
			
			 //上传文件
		    $myFile = $_FILES["myFile"];
		    $Path = $upload->uploadOne($myFile);
			if ($Path) {
				$result = M()->execute("insert into imgpath(imagepath) value  ('newspicture/{$Path['savename']}')");
				if($result > 0)	{
					$this->success("添加轮播图成功",__ROOT__."/admin.php/Img/index");
				exit;
			}else{
					$this->success("添加轮播图失败",__ROOT__."/admin.php/Img/index");
				exit;
			}
		}else{
			$this->success("添加轮播图失败",__ROOT__."/admin.php/Img/index");
				exit;
		}

	}
	//图片列表
	public function lister()
	{
		$totalRow = M("imgpath")->where("state<9")->count();

			//实例化分页类
		$page = new Page($totalRow,5);	
		$imgpath = M("imgpath")->where("state<9")->order("id desc")->limit($page->firstRow,$page->listRows)->select();
		$this->assign("imgpath",$imgpath);
			$this->assign("pageList",$page->show());//分页栏
		$this->display();
	}
	//单个删除
	public function delete(){
		$id = $_GET['id'];
		if($id){
			$rst = M("imgpath")->where("id={$id}")->delete();
			if($rst){
				$this->success("删除轮播图成功",__ROOT__."/admin.php/Img/lister");
				exit;
			}else{
				$this->success("删除轮播图失败",__ROOT__."/admin.php/Img/lister");
				exit;
			}
		}else{
			$this->success("删除轮播图失败",__ROOT__."/admin.php/Img/lister");
				exit;
		}
	}
	//批量删除
	public function deleteAll()
	{
		$id = $_GET['Id'];
		if($id){
		$word = explode('.',$id);
		for ($i=0; $i <count($word) ; $i++) { 
			$str .= "or id=". $word[$i]." ";
		}
		
		$str = substr($str, 2);
		$sql = "delete from imgpath where $str";
		$arr = M()->execute($sql);
		if($arr){
			$this->success("批量删除轮播图成功",__ROOT__."/admin.php/Img/lister");
				exit;
		}else{
			$this->success("批量删除轮播图失败",__ROOT__."/admin.php/Img/lister");
				exit;
		}
	}else{
		$this->success("批量删除轮播图失败",__ROOT__."/admin.php/Img/lister");
				exit;
	}
		 
	}
}