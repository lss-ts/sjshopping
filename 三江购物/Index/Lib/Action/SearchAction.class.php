<?php
class SearchAction extends Action {
    public function search(){
    		session("productType",I("productType"));
		$this->display("search");
    }
	//加入购物车
	public function addData(){
		if(empty(session('uid'))){
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
	
	function getlist(){
		if(empty(I("productType"))){
			$productType=$_SESSION['productType'];
		}else{
			$productType=I("productType");
		}
		$product=M("product");
		$arr["productType"]=$productType;
		$list=$product->order("id desc")->where($arr)->select();
		 $this->ajaxReturn($list); 	
	}
	
	function getData(){
		
		$product=M("product");
		$arr["productType"]=$_SESSION['productType'];
		$list=$product->order("Price asc")->where($arr)->select();
		$this->ajaxReturn($list);
	}
	
	function getSales(){
		$product=M("product");
		$arr["productType"]=$_SESSION['productType'];
		$list=$product->order("Sales desc")->where($arr)->select();
		$this->ajaxReturn($list);
	}
	
	function getPrice(){
//		$productType=I("productType");
		$moneyone=$_POST['moneyone'];
		$moneytwo=$_POST['moneytwo'];
		$product=M("product");
		$data['Price'] = array(array('gt',$moneyone),array('lt',$moneytwo)) ;
		$data["productType"]=$_SESSION['productType'];
		$list=$product->order("Price asc")->where($data)->select();
		$this->ajaxReturn($list);
		
	}
	
	public function getCate(){
		$table = M('product');
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
	    				$obj = (object)[floorTitle=> $v2 ,data=> $newarr];
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
	    				$obj = (object)[floorTitle=> $v1 , data=> $newarr];
	    				$newdata[]=$obj;

	    			}
	    			$this->ajaxReturn($newdata);
	    		}
		}
		
	public function getproductType(){
		$productType=$_POST("productType");
		$product=M("product");
		$data["productType"]=$productType;
		$list=$product->where($data)->select();
		$this->ajaxReturn($productType);
	}
	
}
?>