<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
		$this->display();
    }
	public function hsp(){
		$this->display();
	}
	public function sjyx(){
		$this->display();
	}
	public function quit(){
		session(null);
		$this->ajaxReturn("退出成功");
	}
	public function isLogin(){
		if(empty($_SESSION['username'])){
			$info['info'] = "用户不存在";
			$info['status'] = 2;
		}else{
			$info['info'] = $_SESSION['username'];
			$info['status'] = 1;
		}
		$this->ajaxReturn($info);
	}
	//获取热销好货数据
	public function getHotData(){
		$products = M("product");
		$list = $products->order("sales DESC")->limit(0,9)->select();
		shuffle($list);
		$this->ajaxReturn($list);
	}
	public function getOtherData(){
		$products = M("product");
		$list = $products->order("sales DESC")->limit(9,9)->select();
		shuffle($list);
		$this->ajaxReturn($list);
	}
	//加入购物车
	public function addData(){
		if(empty(session("uid"))){
			$info['info'] = "用户名为空";
			$info['status'] = 3;
		}else{
			$uid = session('uid');
			$pid = I('pid');
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
				$arr['num'] = 1;
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
	public function getData(){
		$table = M('product');
		$img = M('img');
	    		$lists = $table->select();
	    		if($lists){
	    			$data=[];
	    			$newdata=[];
	    			$arr1=[];
	    			$arr2=[];
	    			// 大类别
	    			foreach ($lists as $k => $v) {
	    				$arr1[$v['floorTitle']]= $v['floorTitle'];
	    			}
	    			// 产生count($arr1)个数组
	    			foreach ($lists as $key => $value) {
	    				$arr2[$value['productType']] = [
	    					'productType'=>$value['productType'],
	    					'floorTitle'=>$value['floorTitle']
	    				];
	    			}

	    			foreach ($arr2 as $k2 => $v2) {
	    				$newarr=[];
	    				foreach ($lists as $k => $v) {
	    					if($v['floorTitle']==$v2['floorTitle']&&$v['productType']==$v2['productType']&&count($newarr)<8){
	    						$newarr[]=$v;
	    					}
	    				}
	    				$obj = (object)[floorTitle=> $v2 ,leftImg=>$v2,rightTopImg=>$v2,rightBottomImg=>$v2,data=> $newarr];
	    				$data[]=$obj;
	    			}
	    			// echo"<pre>";
	    			foreach ($arr1 as $k1 => $v1) {
	    				$newarr=[];
	    				foreach ($data as $k => $v) {
	    					$varr = (array)$v;
	    					// print_r($varr);
	    					if($varr['floorTitle']['floorTitle']==$v1){
	    						
	    						$varr['productType']=$varr['floorTitle']['productType'];
	    						unset($varr['floorTitle']);
	    						$newarr[]=$varr;
	    					}
	    					
	    				}
					$where['floorTitle'] = $v1;
					$one = $img->where($where)->find();
	    				$obj = (object)[floorTitle=> $v1 ,img=>$one, data=> $newarr];
	    				$newdata[]=$obj;

	    			}
	    			$this->ajaxReturn($newdata);
	    		}
	}
	//获取购物车数据
	public function getShoppingData(){
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
	//删除
	public function del(){
		$id = I("pid");
		$shopping = M("shopping");
		$res = $shopping->where("pid=".$id)->delete();
		if($res){
			$this->ajaxReturn("删除成功");
		}
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
}
