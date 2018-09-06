<?php
namespace Home\Controller;

class IndexController extends BaseController 
{
	public function index(){
		
		$arr = getTypeAll();
		
		$this->assign("arr",$arr);
		$homeimg  = M("imgpath")->where("state<9")->order("id desc")->limit(0,4)->select();
		
		$this->assign("homeimg",$homeimg);
		//优惠活动
		$yhhd = M("articles")->where("typeId = 116")->order("articleId desc")->limit("0,3")->select();
		//最新公告
		$zxgg = M("articles")->where("typeId = 130")->order("articleId desc")->limit("0,3")->select();
		//农商快讯
		$nskx =M("articles")->where("typeId = 131")->order("articleId desc")->limit("0,3")->select();
		//客户服务
		$khfw = M("type")->where("fid = 132")->order("typeId desc")->limit("0,8")->select();
		$this->assign("yhhd",$yhhd);
		$this->assign("zxgg",$zxgg);
		$this->assign("nskx",$nskx);
		$this->assign("khfw",$khfw);
		$this->display();
	}
}