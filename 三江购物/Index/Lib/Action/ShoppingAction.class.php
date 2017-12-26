<?php
class ShoppingAction extends Action{
	public function shopping(){
		$this->display();
	}
	public function pay(){
		$this->display();
	}
	//加入购物车
	public function addData(){
		if(empty(session('uid'))){
			$info['info'] = "用户名为空";
			$info['status'] = 3;
		}else{
			$uid = session('uid');
			$pid = session('pid');
			$num = I("num");
			$arr['uid'] = $uid;
			$arr['pid'] = $pid;
			$shopping = M("shopping");
			$res = $shopping->where("pid=".$pid)->find();
			if($res){
				//如果购物车已经存在该商品，商品数量加1
				$number = $res['num'];
				$sureNum = $number+1;
				$arr['num'] = $sureNum;
				$res1 = $shopping->where("pid=".$pid)->save($arr);
			}
			else{
				//如果购物车不存在该商品，在购物车添加该商品
				$arr['num'] = $num;
				$res1 = $shopping->add($arr);
			}
			if($res1){
				$info['info'] = "添加成功";
				$info['status'] = 1;
			}else{
				$info['info'] = "添加失败";
				$info['status'] = 2;
			}
		}
		$this->ajaxReturn($info);
	}
	//获取购物车数据
	public function getData(){
		$uid = session('uid');
		$arr['uid'] = $uid;
		$shopping = M("shopping");
		$list = $shopping->where($arr)->select();
		$products = M("product");
		foreach ($list as $k=>$v){
			$res = $products->where("id=".$v['pid'])->find();
			$list[$k]['data'] = $res;
		}
		$this->ajaxReturn($list);
	}
	//减
	public function minusNum(){
		$id = I("pid");
		$shopping = M("shopping");
		$res = $shopping->where("pid=".$id)->find();
		$num = $res['num'];
		$sureNum = $num-1;
		if($sureNum==1){
			$sureNum=1;
		}
		if($sureNum>=1){
			$arr['num'] = $sureNum;
			$res1 = $shopping->where("pid=".$id)->save($arr);
			if($res1){
				$this->ajaxReturn("修改成功");
			}
		}
	}
	//增
	public function plusNum(){
		$id = I("pid");
		$shopping = M("shopping");
		$res = $shopping->where("pid=".$id)->find();
		$num = $res['num'];
		$sureNum = $num+1;
		$arr['num'] = $sureNum;
		$res1 = $shopping->where("pid=".$id)->save($arr);
		if($res1){
			$this->ajaxReturn("修改成功");
		}
	}
	//删除一条
	public function del(){
		$id = I("pid");
		$shopping = M("shopping");
		$res = $shopping->where("pid=".$id)->delete();
		if($res){
			$this->ajaxReturn("删除成功");
		}
	}
}
?>