<?php
class RegisterAction extends Action{
	public function register(){
		$this->display();
	}
	//验证用户名或密码是否正确；
	public function addUser(){
    		$arr["username"] = I("username");
		$arr["pwd"] = md5(I("pwd"));
		$arr["phone"] = I("phone");
		$users = M("users");
		$list = $users->add($arr);
		if($list){
			$info['info'] = "注册成功";
			$info['status'] = 1;
		}else{
			$info['info'] = "注册失败";
			$info['status'] = 2;
		}
		$this->ajaxReturn($info);
	}
	//验证码；
	public function verify(){
	    import('ORG.Util.Image');
	    Image::buildImageVerify();
	}
//	public function checkVerify(){
//		$verify = I("verData");
//		$verify = md5($verify);
//		if($_SESSION['verify'] != $verify) {
//		   $data['info'] = "验证码错误";
//			$data['status'] = 3;
//		}else{
//			$data['info'] = "验证码正确";
//			$data['status'] = 2;
//		}
//		$this->ajaxReturn($data);
//	}	
}
?>