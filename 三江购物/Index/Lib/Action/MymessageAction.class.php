<?php
class MymessageAction extends Action {
	public function mymessage() {
		$this -> display();
	}
	//获取个人信息
	public function getUserData(){
		$uid = $_SESSION['uid'];
		$users = M("users");
		$arr['id'] = $uid;
		$res = $users->where($arr)->find();
		$this->ajaxReturn($res);
	}
	//加入收藏
	public function addData() {
		if(empty(session('uid'))){
			$info['info'] = "用户名为空";
			$info['status'] = 4;
		}else{
			$id = I('id');
			$collection = M("collection");
			$arr['uid'] = session("uid");
			$arr['pid'] = $id;
			$list1 = $collection -> where($arr) -> find();
			if ($list1) {
				$info['info'] = "已收藏";
				$info['status'] = 2;
			} else {
				$list = $collection -> add($arr);
				if ($list) {
					$info['info'] = "收藏成功";
					$info['status'] = 1;
				} else {
					$info['info'] = "收藏失败";
					$info['status'] = 3;
				}
			}
		}
		$this -> ajaxReturn($info);
	}
	public function getCollectionData() {
		$collection = M("collection");
		$product = M("product");
		$arr['uid'] = session("uid");
		$list = $collection->where($arr)->select();
		foreach($list as $k=>$v){
			$arr1['id'] = $v['pid'];
			$one = $product->where($arr1)->find();
			$data[]=$one;
		}
		$this->ajaxReturn($data);
	}
	public function del() {
		$collection = M("collection");
		$arr['uid'] = session("uid");
		$id = $_POST['id'];
		$arr['pid'] = $id;
		$list = $collection->where($arr)->delete();
		$this->ajaxReturn($list);
	}
	//加入购物车
	public function addShopping(){
		$uid = session('uid');
		$pid = I("id");
		$num = 1;
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
		$this->ajaxReturn($info);
	}
	//获取订单数据
	public function getOrderData(){
		$uid = $_SESSION['uid'];
		$order = M('order');
        $product = M("product");
        $address=M("address");
        // 查询已付款并且订单未完成的信息
        $pay['uid'] = $uid;
        $pay['status']=array('like',[-1,0,1],'OR');;
        // 查找已经付款的订单
        $orderlist = $order->where($pay)->order("addTime desc")->select();
        foreach ($orderlist as $key => $value) {
            $data=[];
            $arr=[];
            // 2/2;22/1;8/1;
            $str = $value['detail'];
            $newarr = explode(';',$str,-1);
            foreach ($newarr as $k => $v) {
                $arr[] = explode('/',$v);
            } 
            for ( $i=0 ; $i <count($arr) ; $i++) { 
                // pid = $arr[$i][0];
                $where['id']=$arr[$i][0];
                $one["data"] = $product->where($where)->find();
                $one["num"] =$arr[$i][1];
                $data[] = $one;
            }
            $orderlist[$key]["detail"]=$data;
            $orderlist[$key]["addTime"]=date('Y-m-d h:i:s',$orderlist[$key]['addTime']);
            $orderlist[$key]["message"]=$address->where($where)->find();
        }
        $this->ajaxReturn($orderlist);
	}
	//搜索订单数据
	public function getNowData(){
		$uid = $_SESSION['uid'];
		$order = M('order');
        $product = M("product");
        $address=M("address");
        // 查询已付款并且订单未完成的信息
        $pay['orderNum'] = $_POST['orderNum'];
        $pay['uid'] = $uid;
        $pay['status']=array('like',[-1,0,1],'OR');;
        // 查找已经付款的订单
        $orderlist = $order->where($pay)->order("addTime desc")->select();
        foreach ($orderlist as $key => $value) {
            $data=[];
            $arr=[];
            // 2/2;22/1;8/1;
            $str = $value['detail'];
            $newarr = explode(';',$str,-1);
            foreach ($newarr as $k => $v) {
                $arr[] = explode('/',$v);
            } 
            for ( $i=0 ; $i <count($arr) ; $i++) { 
                // pid = $arr[$i][0];
                $where['id']=$arr[$i][0];
                $one["data"] = $product->where($where)->find();
                $one["num"] =$arr[$i][1];
                $data[] = $one;
            }
            $orderlist[$key]["detail"]=$data;
            $orderlist[$key]["addTime"]=date('Y-m-d h:i:s',$orderlist[$key]['addTime']);
            $orderlist[$key]["message"]=$address->where($where)->find();
        }
        $this->ajaxReturn($orderlist);
	}
	//取消订单
	public function cancelOrder(){
		$orderNum = I('orderNum');
		$arr['orderNum'] = $orderNum;
		$order = M("order");
		$now['status'] = -1;
		$res = $order->where($arr)->save($now);
		$this->ajaxReturn($res);
	}
}
?>