<?php
namespace Home\Controller;
use Think\Page;//导入分页
class SearchController extends BaseController
{
	public function index()
	{
			$homeimg  = M("imgpath")->where("state<9")->order("id desc")->limit(0,4)->select();
		$this->assign("homeimg",$homeimg);
		$keyword=I('get.keyword');
		$str=trim($keyword);
		$str=strip_tags($keyword);
		$str=stripslashes($keyword);
		$str=addslashes($keyword);
		$str=rawurldecode($keyword);
		$str=quotemeta($keyword);
		$str=htmlspecialchars($keyword);
		$keyword=preg_replace("/\+|\*|\`|\/|\-|\$|\#|\^|\!|\@|\%|\&|\~|\^|\[|\]|\'|\"/", "", $str);//去除特殊符号+*`/-$#^~!@#$%&[]'"
		if($keyword){
		$sql = "select * from articles where content like '%{$keyword}%'";
		
		$Info = M()->query($sql);
		$totalRow = count($Info);
		$page = new Page($totalRow,10);
		$newsInfo = M('articles')->where("content like '%{$keyword}%'")->order("articles.articleId desc")->limit($page->firstRow,$page->listRows)->select();
		
		$arr = getTypeAll();
		$this->assign("newsInfo",$newsInfo);
			$this->assign("pageList",$page->show());//分页栏
		$this->assign("arr",$arr);
		$this->display();
	}
	}
}