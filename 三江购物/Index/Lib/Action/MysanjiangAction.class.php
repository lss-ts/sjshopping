<?php 
class MysanjiangAction extends Action{
	public function index(){
		$this->display("mysafe");

	}
	public function getUserData(){
		if($_SESSION['username']){
			// 
			$table = M("users");
			$where['id']=$_SESSION["uid"];
			$one = $table->where($where)->find();
			if($one){
				$one['phone'] = preg_replace('/(\d{3})\d{5}(\d{3})/', '$1*****$2', $one["phone"]);
				$one['pwd'] ="";
				$this->ajaxReturn($one);
			}else{
				// 去登录页面
			}
		}else{
			// 去登录页面
		}
	}
	public function changePwd(){
		if($_SESSION['username']){
			// 
			$table = M("users");
			$where['id']=$_SESSION["uid"];
			$arr['pwd'] = md5($_POST['pwd']);
			$one = $table->where($where)->save($arr);
			if($one){
				$info['status']=1;
				$this->ajaxReturn($info);
			}else{
				$info['status']=2;
				$this->ajaxReturn($info);
			}
		}else{
			// 去登录页面
		}
	}
	public function verify(){
    	import('ORG.Util.Image');
    	Image::buildImageVerify();
    }
    public function verify2(){
    	import('ORG.Util.Image');
    	Image::buildImageVerify();
    }
    public function checkverify(){
    	$verify = md5(I('val'));
    	if($_SESSION['verify'] == $verify) {
		   $data['info']='验证码正确';
		   $data['status']=1;
		}else{
			$data['info']='验证码错误';
		   $data['status']=2;
		}
		$this->ajaxreturn($data);
    }
    public function checkverify2(){
    	$verify = md5(I('val'));
    	if($_SESSION['verify'] == $verify) {
		   $data['info']='验证码正确';
		   $data['status']=1;
		}else{
			$data['info']='验证码错误';
		   $data['status']=2;
		}
		$this->ajaxreturn($data);
    }

}
 ?>