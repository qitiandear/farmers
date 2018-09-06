<?php
namespace Admin\Controller;
use Think\Upload;//导入上传类
use Think\Page;//导入分页
class NewsController extends BaseController 
{
	//五一理财
	public function char()
	{
		$str = $arr = M("chars")->where("charId=1")->find();
		$this->assign("str",$str);
		$this->display();
	}
	public function savechar()
	{
		$number = $_POST['number'];
		$strs = $_POST['strs'];
		$sql = "update chars set number='{$number}',strs='{$strs}' where charId=1";
		
		$ret = M()->execute($sql);
		if($ret){
			$this->success("修改成功",__ROOT__."/admin.php/News/char.html");
			exit;
			}else{
				$this->success("修改失败",__ROOT__."/admin.php/News/char.html");
			exit;
			}
	}
	public function checkType($typeId)
	{
		$typeId = $_GET['typeId'];
		if($typeId){
			$arr = M("type")->where("fid={$typeId}")->select();
			if($arr){
				$str = '<select name="typeId">';
				foreach ($arr as $key => $val) {
					$str.='<option value="'.$val['typeId'].'">'.$val['typeName'].'</option>';
				}
				$str .='</select>';
				echo $str;
			}
		}
	}
	//修改文章
	public function save($articleId){
		if (!empty($_POST['typeId'])) {
			$articleId = $_GET['articleId'];

			if($articleId){
				$title = $_POST['title'];
				$content = $_POST['content'];
				$tid = $_POST['typeId'];
				$date = $_POST['date'];
				$sql = "update articles set title='{$title}',content='{$content}',date='{$date}',typeId='{$tid}' where articleId={$articleId}";
				
				$rst = M()->execute($sql);
				if($rst){
				$this->success("修改文章成功",__ROOT__."/admin.php/News/lister.html");
				exit;
				}else{
					$this->success("修改文章失败",__ROOT__."/admin.php/News/update/articleId/{$articleId}");
				exit;
				}
			}
		}else{
			$articleId = $_GET['articleId'];

			if($articleId){
				$title = $_POST['title'];
				$content = $_POST['content'];

				$date = $_POST['date'];
				$sql = "update articles set title='{$title}',content='{$content}',date='{$date}' where articleId={$articleId}";
				
				$rst = M()->execute($sql);
				if($rst){
				$this->success("修改文章成功",__ROOT__."/admin.php/News/lister.html");
				exit;
				}else{
					$this->success("修改文章失败",__ROOT__."/admin.php/News/update/articleId/{$articleId}");
				exit;
				}
			}
		}
		

	}
	//修改文章页面
	public function update($articleId){
		$qxId = $_SESSION['user']['qxId'];

		 $newsType = explode(",", $qxId);
	
		 foreach ($newsType as $k=>$v){
				$arr1[] = M('type')->where(array('typeId'=>$v))->select();

			}

			foreach ($arr1 as $key => $value) {
					
					foreach ($value as $k => $val) {
						$sql = "select typeId,CONCAT('--',typeName) as typeName from type where fid = {$val['typeId']}";
						
					$arrAll[] = M()->query($sql);
				
					}
				}
				
				/*var_dump($arr);exit;*/
			$this->assign("arrAll",$arrAll);
			$this->assign("arr1",$arr1);
		$articleId = $_GET['articleId'];
		if($articleId){
			$arr = M("articles")->where("articleId = {$articleId}")->find();
			$this->assign("arr",$arr);

		}
		$this->display();
	}
	//批量删除
	public function deleteAll(){
			//接收id
		$id=$_GET['articleId'];
		
		$word = explode('.',$id);

		for($i = 0;$i<count($word);$i++){
			$str .= "or articleId=". $word[$i]." ";
			
		}
		$str = substr($str, 2);

		//修改表 state=9
		$sql = "delete from articles  where $str";

		$arr = M()->execute($sql);
		
		if($arr>0){
			$this->success("批量删除文章成功",__ROOT__."/admin.php/News/lister.html");
			exit;
		}else{
			$this->success("批量删除文章失败",__ROOT__."/admin.php/News/lister.html");
			exit;
		}
	}
	//删除文章
	public function delete($articleId){
		$articleId = $_GET['articleId'];
		if($articleId){
			$result = M("articles")->where("articleId = {$articleId}")->delete();
			if($result){
				$this->success("删除文章成功",__ROOT__."/admin.php/News/lister");
				exit;
			}else{
				$this->success("删除文章失败",__ROOT__."/admin.php/News/lister");
				exit;
			}
		}else{
			$this->success("删除文章失败",__ROOT__."/admin.php/News/lister");
				exit;
		}

	}
	public function addnews(){
	
		/*$Type = getTypeByArr();
		$this->assign("Type",$Type);
		*/
	 	$qxId = $_SESSION['user']['qxId'];

		 $newsType = explode(",", $qxId);
	
		 foreach ($newsType as $k=>$v){
				$arr[] = M('type')->where(array('typeId'=>$v))->select();

			}

			foreach ($arr as $key => $value) {
					
					foreach ($value as $k => $val) {
						$sql = "select typeId,CONCAT('--',typeName) as typeName from type where fid = {$val['typeId']}";
						
					$arrAll[] = M()->query($sql);
				
					}
				}
				
				/*var_dump($arr);exit;*/
			$this->assign("arrAll",$arrAll);
			$this->assign("arr",$arr);
		$this->display();
	}
	public function lister(){
		$qxId = $_SESSION['user']['qxId'];
		$tqsql = "select * from type where fid in ($qxId)";
		$tp = M()->query($tqsql);
		$this->assign("tp",$tp);
		if (isset($_GET['title'])&&empty($_GET['title'])) {
			if($_SESSION['user']['role']==1){
			//获得总记录数
				$tid = $_GET['tid'];
				$map['state'] = array('lt',9);
				$map['typeId'] = $tid;
				$totalRow = M("articles")->where($map)->count();
				
				//实例化分页类
				$page = new Page($totalRow,10);	
			
				$sql ="select * from articles a join type t where t.typeId=a.typeId and a.typeId=$tid order by a.articleId desc limit {$page->firstRow},{$page->listRows}";
				$newsInfo = M()->query($sql);
			}else{
				$tid = $_GET['tid'];
				$sql = "select a.*,t.* from articles a  join type t on a.typeId=t.typeId and a.typeId=$tid where t.fid in(".trim($_SESSION['user']['qxId'],',').") order by a.articleId desc";
				$sqlRow = M()->query($sql);
				$totalRow = count($sqlRow);
				$page = new Page($totalRow,10);	
				$sql1 ="select a.*,t.* from articles a  join type t on a.typeId=t.typeId where t.fid in(".trim($_SESSION['user']['qxId'],',').") order by a.articleId desc limit {$page->firstRow},{$page->listRows}";
				$newsInfo = M()->query($sql1);
			
			}
		}else if(isset($_GET['title'])&&!empty($_GET['title'])){
			if($_SESSION['user']['role']==1){
			//获得总记录数
				$title = trim($_GET['title']);
				$tid = $_GET['tid'];
				$map['state'] = array('lt',9);
				$map['typeId'] = $title;
				$map['typeId'] = $tid;
				$totalRow = M("articles")->where($map)->count();
				
				//实例化分页类
				$page = new Page($totalRow,10);	
			
				$sql ="select * from articles a join type t where t.typeId=a.typeId and a.typeId=$tid and a.title='$title' order by a.articleId desc limit {$page->firstRow},{$page->listRows}";
				$newsInfo = M()->query($sql);
			}else{
				$title = trim($_GET['title']);
				$tid = $_GET['tid'];
				$sql = "select a.*,t.* from articles a  join type t on a.typeId=t.typeId and a.typeId=$tid and a.title='$title' where t.fid in(".trim($_SESSION['user']['qxId'],',').") order by a.articleId desc";
				$sqlRow = M()->query($sql);
				$totalRow = count($sqlRow);
				$page = new Page($totalRow,10);	
				$sql1 ="select a.*,t.* from articles a  join type t on a.typeId=t.typeId where t.fid in(".trim($_SESSION['user']['qxId'],',').") order by a.articleId desc limit {$page->firstRow},{$page->listRows}";
				$newsInfo = M()->query($sql1);
			
			}
		}else{
			if($_SESSION['user']['role']==1){
			//获得总记录数
				$tid = M("type")->where('status=9')->field('id,name')->limit(1)->select();
				$totalRow = M("articles")->where("state<9")->count();

				//实例化分页类
				$page = new Page($totalRow,10);	
			
				$sql ="select * from articles a join type t where t.typeId=a.typeId order by a.articleId desc limit {$page->firstRow},{$page->listRows}";
				$newsInfo = M()->query($sql);
			}else{
				$tid = M("type")->where('status=9')->field('id,name')->limit(1)->select();
				$sql = "select a.*,t.* from articles a  join type t on a.typeId=t.typeId where t.fid in(".trim($_SESSION['user']['qxId'],',').") order by a.articleId desc";
				$sqlRow = M()->query($sql);
				$totalRow = count($sqlRow);
				$page = new Page($totalRow,10);	
				$sql1 ="select a.*,t.* from articles a  join type t on a.typeId=t.typeId where t.fid in(".trim($_SESSION['user']['qxId'],',').") order by a.articleId desc limit {$page->firstRow},{$page->listRows}";
				$newsInfo = M()->query($sql1);
			
			}
		}
		
		/*$newsInfo = M("articles")->where("state<9")->join("type on type.typeId=articles.typeId")->order("articles.articleId desc")->limit($page->firstRow,$page->listRows)->select();*/
			
			$this->assign("pageList",$page->show());//分页栏
			$this->assign("newsInfo",$newsInfo);
			$this->assign("tid",$tid);
			
		$this->display();
	}
	//添加功能
	public function addnew(){


			//获取表单提交的数据
			$content = $_POST['content'];//文章正文
			$title = $_POST['title'];//文章标题
			$typeId = $_POST['typeId'];
			
			$date = $_POST['date'];//文章时间
			
			$userId = $_SESSION['user']['userId'];//用户ID
		/*	echo $content."<br/>";
			echo $title."<br/>";
			echo $typeId."<br/>";
			echo $date."<br/>";
			echo $userId."<br/>";
			exit;*/
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
				$result = M()->execute("insert into articles(content,title,typeId,userId,imagepath,date) value  ('{$content}','{$title}','{$typeId}','{$userId}','newspicture/{$Path['savename']}','{$date}')");		 
			}else if ($imagepath==NULL)
			{
				$result = M()->execute("insert into articles(content,title,typeId,userId,date) value  ('{$content}','{$title}','{$typeId}','{$userId}','{$date}')");
			}
			
			if($result > 0)
			{
			
				$this->success("添加文章成功",__ROOT__."/admin.php/News/addnews");
				exit;
			}else
			{
				$this->success("添加文章失败",__ROOT__."/admin.php/News/addnews");
				exit;
			}
	}
}