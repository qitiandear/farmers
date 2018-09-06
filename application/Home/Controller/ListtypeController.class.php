<?php
namespace Home\Controller;
use Think\Page;//导入分页
class ListtypeController extends BaseController
{
	public function index()
	{
		$arr = getTypeAll();
		$typeId = $_GET['typeId']?$_GET['typeId']:10;//接受id
		$typesan   = M("type")->where("typeId={$typeId}")->find();//查找三级对应类型名称
		$typeer    = M("type")->where("typeId={$typesan['fid']}")->find();//查找二级对应类型名称
		$typeone    = M("type")->where("typeId={$typeer['fid']}")->find();//查找一级对应类型名称
		$listNews = M("type")->where("fid = {$typeer['typeId']}")->select();//属于fid的所有类型
		//typeId去查询文章
		$counts = M("articles")->where("typeId={$typeId}")->count();
		if($counts == 1){
			$rst = M("articles")->where("typeId={$typeId}")->find();
			$articleId =  $rst['articleId'];
			$this->redirect("/News/index/articleId/{$articleId}");
			exit;
		}else if($counts > 1){
			
			$totalRow = M("articles")->where("typeId = {$typeId}")->count();
			$page = new Page($totalRow,10);
			$rst = M("articles")->where("typeId = {$typeId}")->order("articleId desc")->limit($page->firstRow,$page->listRows)->select();
				$this->assign("pageList",$page->show());//分页栏
			$this->assign("rst",$rst);
		}else if($counts == 0){
			$this->success("该类型暂时没有内容",__APP__);
			exit;
		}
		
	$homeimg  = M("imgpath")->where("state<9")->order("id desc")->limit(0,4)->select();
		$this->assign("homeimg",$homeimg);
		$this->assign("listNews",$listNews);
		$this->assign("typesan",$typesan);
		$this->assign("typeer",$typeer);
		$this->assign("typeone",$typeone);
		$this->assign("typeId",$typeId);
		$this->assign("arr",$arr);

		$this->display();
	}
}