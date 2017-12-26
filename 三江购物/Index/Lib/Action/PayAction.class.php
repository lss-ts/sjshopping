<?php
class PayAction extends Action{
	public function pay(){
		$order = M("order");
		$address = M("address");
		$arr['uid'] = $_SESSION['uid'];
		$list = $order->where($arr)->order("addTime desc")->find();
		$arr1['id'] = $list['addressId'];
		$res = $address->where($arr1)->find();
		$list['data'] = $res;
		$this->assign("data",$list);
		$this->display();
	}
	public function msgPay(){
		$order = M("order");
		$address = M("address");
		$arr['uid'] = $_SESSION['uid'];
		$arr['id'] = $_GET['id'];
		$list = $order->where($arr)->find();
		$arr1['id'] = $list['addressId'];
		$res = $address->where($arr1)->find();
		$list['data'] = $res;
		$this->assign("data",$list);
		$this->display("pay");
	}
	public function changeStatus(){
		$order = M('order');
		$arr['id'] = I("id");
		$arr1['pay'] = 1;
		$arr1['status'] = 0;
		$list = $order->where($arr)->save($arr1);
		if($list){
			$info['info'] = "支付成功";
			$info['status'] = 1;
		}else{
			$info['info'] = "支付失败";
			$info['status'] = 2;
		}
		$this->ajaxReturn($info);
	}
}
?>