<?php
class OrderAction extends Action {
	public function order() {
		session("arr", I('arr'));
		$this -> display();
	}

	//获取订单数据
	public function getData() {
		$uid = $_SESSION['uid'];
		$totalC = 0;
		$allW = 0;
		$products = M("product");
		$shopping = M("shopping");
		$arr = explode(",", $_SESSION['arr']);
		foreach ($arr as $k => $v) {
			$where['uid'] = $uid;
			$where['pid'] = $v;
			$res = $shopping -> where($where) -> find();
			$res1 = $products -> where("id=" . $v) -> find();
			$sureArr[$k]['num'] = $res['num'];
			$sureArr[$k]['data'] = $res1;
			$sureArr[$k]['totalM'] = $res['num'] * $res1['Price'];
			$sureArr[$k]['totalW'] = $res['num'] * $res1['weight'];
			$totalC += $sureArr[$k]['totalM'];
			$allW += $sureArr[$k]['totalW'];
		}
		$data['data'] = $sureArr;
		$data['totalC'] = $totalC;
		$data['allW'] = $allW;
		$this -> ajaxReturn($data);
	}

	//添加收货地址
	public function addAddress() {
		$arr['uid'] = $_SESSION['uid'];
		$arr['username'] = I("username");
		$arr['address'] = I("address");
		$arr['detail'] = I("detail");
		$arr['tel'] = I("tel");
		$arr['phone'] = I("phone");
		$address = M("address");
		$list = $address -> add($arr);
		$this -> ajaxReturn($list);
	}

	//获取地址
	public function getAddress() {
		$address = M("address");
		$arr['uid'] = $_SESSION['uid'];
		$list = $address -> where($arr) -> select();
		$this -> ajaxReturn($list);
	}

	//删除地址
	public function delAddress() {
		$address = M("address");
		$arr['id'] = I("id");
		$list = $address -> where($arr) -> delete();
		$this -> ajaxReturn($list);
	}

	//添加订单
	public function addDin() {
		$order = M("order");
		$address = M("address");
		$arr1['uid'] = $_SESSION['uid'];
		$arr1['isMoren'] = "true";
		$res = $address -> where($arr1) -> find();
		if($res){
			$arr['uid'] = $_SESSION['uid'];
			$arr['detail'] = $_POST['str'];
			$arr['addressId'] = $res['id'];
			$arr['totalC'] = $_POST['totalC'];
			$arr['totalW'] = $_POST['totalW'];
			$arr['ymoney'] = $_POST['ymoney'];
			$arr['addTime'] = time();
			$arr['orderNum'] = $_SESSION['uid'] . time();
			$list = $order -> add($arr);
			$one = $order -> where($arr) -> find();
			$this -> ajaxReturn($one);
		}else{
			$info['info'] = 1;
			$this->ajaxReturn($info);
		}
		
	}

	//设置默认地址
	public function setMoren() {
		$address = M("address");
		$arr1['uid'] = $_SESSION['uid'];
		$arr['id'] = I("id");
		$list = $address -> where($arr1) -> select();
		foreach ($list as $k => $v) {
			$arr2['id'] = $v['id'];
			$arr3['isMoren'] = "false";
			$list2 = $address -> where($arr2) -> save($arr3);
		}
		$arr4['isMoren'] = "true";
		$list3 = $address -> where($arr) -> save($arr4);
		if($list3){
			$info['info'] = "设置成功";
			$info['status'] = 1;
		}else{
			$info['info'] = "设置失败";
			$info['status'] = 2;
		}
		$this -> ajaxReturn($info);
	}

	//提交成功删除购物车数据
	public function delProduct() {
		$str = I('str');
		$shopping = M("shopping");
		$newarr = explode(';', $str, -1);
		foreach ($newarr as $k => $v) {
			$arr[] = explode('/', $v);
		}
		for ($i = 0; $i < count($arr); $i++) {
			// pid = $arr[$i][0];
			$where['pid'] = $arr[$i][0];
			$res = $shopping -> where($where) -> delete();
		}
		$this -> ajaxReturn($res);
	}

}
?>