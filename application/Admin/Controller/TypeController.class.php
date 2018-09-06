<?php
namespace Admin\Controller;
use Think\Page;//导入分页
class TypeController extends BaseController 
{
	//批量删除
	public function deleteAll()
	{
			//接收id
		$id=$_GET['typeId'];
		
		$word = explode('.',$id);

		for($i = 0;$i<count($word);$i++){
			$str .= "or typeId=". $word[$i]." ";
			
		}
		$str = substr($str, 2);

		//修改表 state=9
		$arr = M()->execute("delete from type  where $str");
		
		if($arr>0){
			$this->success("删除栏目成功",__ROOT__."/admin.php/Type/listerType.html");
			exit;
		}else{
			$this->success("删除栏目失败",__ROOT__."/admin.php/Type/listerType.html");
			exit;
		}
	}
	//删除栏目
	public function delete()
	{
		$typeId=$_GET['typeId'];
		$arr = M("type")->where("typeId={$typeId}")->delete();
		if($arr){
			$this->success("删除栏目成功",__ROOT__."/admin.php/Type/listerType");
				exit;
		}else{
			$this->success("删除栏目成功",__ROOT__."/admin.php/Type/listerType");
				exit;
		}

	}
	//修改栏目
	public function save(){
		$typeId = $_GET['typeId'];
		
		$typeName = $_POST['typeName'];
		$linkUrl = $_POST['linkUrl'];
		
		
		$rst = M()->execute("update type set typeName='{$typeName}',linkUrl='{$linkUrl}' where typeId='{$typeId}'");
		if($rst){
			$this->success("修改栏目成功",__ROOT__."/admin.php/Type/update/typeId/$typeId");
				exit;
		}else{
			$this->success("修改栏目失败",__ROOT__."/admin.php/Type/update/typeId/$typeId");
				exit;
		}
	}
	//修改页面
	public function update(){
		$typeId = $_GET['typeId'];
		$arr = M("type")->where("typeId={$typeId}")->find();
		$this->assign("arr",$arr);
		$this->display();
	}
	public function addType(){
		
		$Type = getTypeByArr();
		$this->assign("Type",$Type);
	
		$this->display();
	}
	public function listerType(){
		$Type = getTypeByArr();
		
		$this->assign("Type",$Type);
		$this->display();
	}
	public function add(){
		$typeName = $_POST['typeName'];
		$linkUrl = $_POST['linkUrl'];
		

		$fid = $_POST['typeId'];
	$sql = "insert into type(typeName,linkUrl,fid) values ('{$typeName}','{$linkUrl}','{$fid}')";

		$result = M()->execute($sql);
		if($result){
			$this->success("添加栏目成功",__ROOT__."/admin.php/Type/addType");
				exit;
		}else{
			$this->success("添加栏目失败",__ROOT__."/admin.php/Type/addType");
				exit;
		}
	}
}