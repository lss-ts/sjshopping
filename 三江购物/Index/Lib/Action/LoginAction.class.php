<?php
class LoginAction extends Action{
	public function login(){
		$this->display();
	}
	public function check(){
    		$arr["username"] = I("username");
		$arr["pwd"] = md5(I("pwd"));
		$users = M("users");
		$list = $users->where($arr)->find();
		if($list){
			$info['info'] = "用户名密码正确";
			$info['status'] = 1;
			session("username",I("username"));
			session("uid",$list['id']);
		}else{
			$info['info'] = "用户名或密码错误";
			$info['status'] = 2;
		}
		$this->ajaxReturn($info);
	}
}
?>