<?php
namespace Home\Controller;

class NewsController extends BaseController 
{
	public function index(){
			$homeimg  = M("imgpath")->where("state<9")->order("id desc")->limit(0,4)->select();
		$this->assign("homeimg",$homeimg);
		$arr = getTypeAll();
		$articleId = $_GET['articleId']?$_GET['articleId']:'';
		if($articleId){
			$new = M("articles")->where("articleId={$articleId}")->find();
			//类型名称
			$typesan = M("type")->where("typeId = {$new['typeId']}")->find();
			$typeer = M("type")->where("typeId = {$typesan['fid']}")->find();
			$typeone = M("type")->where("typeId = {$typeer['fid']}")->find();
			//类型列表
			$listNews = M("type")->where("fid = {$typeer['typeId']}")->select();//属于fid的所有类型
			$this->assign("listNews",$listNews);
			$this->assign("new",$new);
			$this->assign("typesan",$typesan);

			$this->assign("typeer",$typeer);
			$this->assign("typeone",$typeone);
		}
		

		$this->assign("arr",$arr);
		$this->display();
	}
/*	public function char()
	{
		$arr = M("chars")->where("charId=1")->find();
		$str = $arr['number'];

		$this->assign("str",$str);
		$this->display();
	}*/
}