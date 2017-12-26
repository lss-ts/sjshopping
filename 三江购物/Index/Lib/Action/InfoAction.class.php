<?php
class InfoAction extends Action{
	public function info(){
		$arr['id'] = I('id');
		session("pid",I('id'));
		$product = M('product');
		$lists = $product->where($arr)->select();
		$this->assign("data",$lists);
		$this->display();
	}
	//获取热销好货数据
	public function getHotData(){
		$arr['id'] = $_SESSION['pid'];
		$product = M('product');
		$list = $product->where($arr)->select();
		$arr1['productType'] = $list[0]['productType'];
		$lists = $product->where($arr1)->order("sales DESC")->limit(0,5)->select();
		$this->ajaxReturn($lists);
	}
	public function getData(){
		$arr['id'] = $_SESSION['pid'];
		$product = M('product');
		$list = $product->where($arr)->select();
		$arr1['productType'] = $list[0]['productType'];
		$lists = $product->where($arr1)->limit(5)->select();
		shuffle($lists);
		$this->ajaxReturn($lists);
	}
	public function getRightData(){
		$arr['id'] = $_SESSION['pid'];
		$product = M('product');
		$list = $product->where($arr)->select();
		$arr1['productType'] = $list[0]['productType'];
		$lists = $product->where($arr1)->limit(3)->select();
		shuffle($lists);
		$this->ajaxReturn($lists);
	}
}
?>