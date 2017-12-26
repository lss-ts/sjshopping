<?php
class IndexAction extends Action {
    // 后台主页
    public function index(){
    	if(!empty($_SESSION['sjgw_admin_username'])){
    		$this->assign('username',$_SESSION['sjgw_admin_username']);
    		$this->display();
    	}else{
    		$this->display('login');
    	}
    }
    // 登录
    public function admin(){
    	// 实例化表名
    	$table = M('admin');
    	//接收传递过来的数据
    	$arr['username']= $_POST['username'];
    	$arr['pwd']= md5($_POST['pwd']);
    	// 实例化表名
    	// 查找数据库
    	$one = $table->where($arr)->find();
        // var_dump($one);
        // die;
    	if($one){
    		//保存session
    		session('sjgw_admin_username',$one['username']);
    		session('sjgw_admin_uid',$one['id']);
            $info['info']='登录成功';
            $info['status']=1;
    		$this->ajaxReturn($info);
    	}else{
    		$info['info']='用户名或者密码错误';
            $info['status']=2;
            $this->ajaxReturn($info);
    	}
    }
    // 退出登录
    public function del(){
    	if(!empty($_SESSION['sjgw_admin_username'])){
    		session('sjgw_admin_username',null);
    		session('sjgw_admin_uid',null);
    		$info['status']=1;
    		$this->ajaxReturn($info);
    	}else{
    		$this->display('login');
    	}
		
    }
    // 获取管理员列表
    public function getAdminData(){
    	if(!empty($_SESSION['sjgw_admin_username'])){
    		if(empty($_POST)){
    			$table = M('admin');
	    		$lists = $table->select();
	    		if($lists){
	    			$this->ajaxReturn($lists);
	    		}
    		}else{
    			// 实例化表名
    			$table = M('admin');
    			foreach ($_POST as $key => $value) {
    				$arr[$key] = $value;
    			}
	    		$lists = $table->where($arr)->select();
	    		if($lists){
	    			$info['data']=$lists;
	    			$info['status']=1;
	    			$this->ajaxReturn($info);
	    		}else{
	    			$info['status']=2;
            		$this->ajaxReturn($info);
	    		}
    		}
    		
    	}else{
    		$this->display('login');
    	}
		
    }
    // 获取用户
    public function getUserData(){
        if(!empty($_SESSION['sjgw_admin_username'])){
            $table = M('users');
            $lists = $table->select();
            $arr['isvip'] =0;
            $lists = $table->where($arr)->select();
            if($lists){
                foreach ($lists as $key => &$value) {
                    if($value['isvip']==1){
                        $value['isvip']="是";
                    }else{
                        $value['isvip']="否"; 
                    }
                    if($value['status']==1){
                        $value['status']="正常";
                    }else if($value['status']==2){
                        $value['status']="禁用"; 
                    }

                }
                $this->ajaxReturn($lists);
            }else{
                // 没有查找到数据
                $info['status']=2;
                $this->ajaxReturn($info); 
            }
        }else{
            $this->display('login');
        }
        
    }
    // 获取用户
    public function getvipUserData(){
        if(!empty($_SESSION['sjgw_admin_username'])){
            $table = M('users');
            $arr['isvip'] =1;
            $lists = $table->where($arr)->select();
            if($lists){
                foreach ($lists as $key => &$value) {
                    if($value['isvip']==1){
                        $value['isvip']="是";
                    }else{
                        $value['isvip']="否"; 
                    }
                    if($value['status']==1){
                        $value['status']="正常";
                    }else if($value['status']==2){
                        $value['status']="禁用"; 
                    }

                }
                $this->ajaxReturn($lists);
            }else{
                // 没有查找到数据
                $info['status']=2;
                $this->ajaxReturn($info); 
            }
        }else{
            $this->display('login');
        }
        
    }
    // 改变用户状态
    public function changeUser(){
        if(!empty($_SESSION['sjgw_admin_username'])){
            $users = M('users');
            $admin = M('admin');
            $arr['pwd'] = md5($_POST['mypwd']);
            $arr['id'] = $_SESSION['sjgw_admin_uid'];
            $one =$admin->where($arr)->find();
            if($one){
                // 密码输入正确--->改变用户状态
                $newarr['id'] = $_POST['id'];
                $data['status'] = $_POST['type'];
                $res = $users->where($newarr)->save($data);
                $one2 = $users->where($newarr)->find();
               if($one2['isvip']==1){
                    $one2['isvip']="是";
                }else{
                    $one2['isvip']="否"; 
                }
                if($one2['status']==1){
                    $one2['status']="正常";
                }else if($one2['status']==2){
                    $one2['status']="禁用"; 
                }
                if($res){
                    $info['status']=1;
                    $info['data'] = $one2;
                    $this->ajaxReturn($info); 
                }else{
                    $info['status']=3;
                    $this->ajaxReturn($info); 
                }
            }else{
               // 密码输入错误
                $info['status']=2;
                $this->ajaxReturn($info); 
            }
        }else{
            $this->display('login');
        }
    }
    // 添加商品
    public function addProduct(){
    	if(!empty($_SESSION['sjgw_admin_username'])){
    		// 实例化表名
    		$table=M('product');
    		// print_r($table);die;
    		$res = $table->add($_POST);
    		if($res){
    			$info['status']=1;
    			$this->ajaxReturn($info);
    		}else{
    			$info['status']=2;
        		$this->ajaxReturn($info);
    		}
    		
    	}else{
    		$this->display('login');
    	}
    }
    // 更新商品
    public function updataProduct(){
    	if(!empty($_SESSION['sjgw_admin_username'])){
    		// 实例化表名
    		$table=M('product');
    		// print_r($_POST);die;
    		$arr['id'] = $_POST['id'];
    		$res = $table->where($arr)->save($_POST);
    		if($res){
    			$info['status']=1;
                $info['data'] = $table->where($arr)->find();
    			$this->ajaxReturn($info);
    		}else{
    			$info['status']=2;
        		$this->ajaxReturn($info);
    		}
    		
    	}else{
    		$this->display('login');
    	}
    }
    // 下架
    public function soldout(){
        if(!empty($_SESSION['sjgw_admin_username'])){
            // 实例化表名
            $table=M('product');
            // print_r($_POST);die;
            $arr['id'] = $_POST['id'];
            $soldout['isSoldout'] = '0';
            $res = $table->where($arr)->save($soldout);
            if($res){
                $info['status']=1;
                $this->ajaxReturn($info);
            }else{
                $info['status']=2;
                $this->ajaxReturn($info);
            }
            
        }else{
            $this->display('login');
        }
    }
    // 上架
    public function putaway(){
        if(!empty($_SESSION['sjgw_admin_username'])){
            // 实例化表名
            $table=M('product');
            // print_r($_POST);die;
            $arr['id'] = $_POST['id'];
            $soldout['isSoldout'] = '1';
            $res = $table->where($arr)->save($soldout);
            if($res){
                $info['status']=1;
                $info['data'] = $table->where($arr)->find();
                $this->ajaxReturn($info);
            }else{
                $info['status']=2;
                $this->ajaxReturn($info);
            }
            
        }else{
            $this->display('login');
        }
    }
    // 获取商品列表
    public function getProductData(){
    	if(!empty($_SESSION['sjgw_admin_username'])){
            // $this->ajaxReturn($_POST);
    		if(empty($_POST)||$_POST['issoldout']==0){
                if(empty($_POST)){
                    $arr['isSoldout']=1;
                }else{
                    $arr['isSoldout']=0;
                }
                // $arr['isSoldout'] = 0;
    			$table = M('product');
	    		$lists = $table->where($arr)->select();
                // $this->ajaxReturn($lists);
	    		if($lists){
	    			$data=[];
	    			$arr=[];
	    			foreach ($lists as $k => $v) {
	    				$arr[$v['floorTitle']]= $v['floorTitle'];
	    			}
	    			// print_r($arr);die;
	    			foreach ($arr as $k2 => $v2) {
	    				$newarr=[];
	    				foreach ($lists as $k => $v) {
	    					if($v['floorTitle']==$v2){
	    						$newarr[]=$v;
	    					}
	    				}
	    				$obj = (object)[floorTitle=> $v2 ,data=> $newarr];
	    				$data[]=$obj;
	    			}
	    			$this->ajaxReturn($data);
	    		}else{
                    $info['status']=2;
                    $this->ajaxReturn($info);
                }
    		}else{
    			// 实例化表名
    			$table = M('product');
    			foreach ($_POST as $key => $value) {
    				$arr[$key] = $value;
    			}
	    		$lists = $table->where($arr)->select();
	    		if($lists){
	    			$info['data']=$lists;
	    			$info['status']=1;
	    			$this->ajaxReturn($info);
	    		}else{
	    			$info['status']=2;
            		$this->ajaxReturn($info);
	    		}
    		}	
    	}else{
    		$this->display('login');
    	}
    }
    // 获取大类推广图
    public function getProductBigImgData(){
        if(!empty($_SESSION['sjgw_admin_username'])){
            
            $table = M('img');
            $lists = $table->select();
            if($lists){
                $info['data'] = $lists;
                $info['status']=1;
                $this->ajaxReturn($info);
            }else{
                $info['status']=2;
                $this->ajaxReturn($info);
            }
        }else{
            $this->display('login');
        }
    }
    public function updataproductBigImg(){
        if(!empty($_SESSION['sjgw_admin_username'])){
            
            $table = M('img');
            $where['id'] = $_POST['id'];

            $list = $table->where($where)->save($_POST);
            if($list){
                $info['data'] = $table->where($where)->find();
                $info['status']=1;
                $this->ajaxReturn($info);
            }else{
                $info['status']=2;
                $this->ajaxReturn($info);
            }
        }else{
            $this->display('login');
        }
    }
    // changeStock
    public function changeStock(){
        if(!empty($_SESSION['sjgw_admin_username'])){
            // 实例化表名
            $product = M('product');
            $arr['id'] = $_POST['id'];
            $stock['stock'] = $_POST['stock'];
            $res = $product->where($arr)->save($stock);
            if($res){
                $info['status']=1;
                $info['data'] = $product->where($arr)->find();
                $this->ajaxReturn($info);
            }else{
                $info['status']=2;
                $this->ajaxReturn($info);
            }
        }else{
            $this->display("login");
        }
    }
    // changeRecommend
    public function changeRecommend(){
        if(!empty($_SESSION['sjgw_admin_username'])){
            // 实例化表名
            $product = M('product');
            $arr['id'] = $_POST['id'];
            $newarr['recommend'] = $_POST['recommend'];
            $res = $product->where($arr)->save($newarr);
            if($res){
                $info['status']=1;
                $info['data'] = $product->where($arr)->find();
                $this->ajaxReturn($info);
            }else{
                $info['status']=2;
                $this->ajaxReturn($info);
            }
        }else{
            $this->display("login");
        }
    }
    // 添加商店
    public function addShop(){
        if(!empty($_SESSION['sjgw_admin_username'])){
            // 实例化表名
            $shop=M('shop');
            $region=M('region');
            // region=松江区&street=九干路&community=丽德创业园&shopname=蓝鸥&shopaddress=蓝鸥科技&shoptel=12345678911
            $shoparr['shopname'] = $_POST['shopname'];
            $shoparr['shopaddress'] = $_POST['shopaddress'];
            $shoparr['shoptel'] = $_POST['shoptel'];
            $regionarr['region'] = $_POST['region'];
            $regionarr['street'] = $_POST['street'];
            $regionarr['community'] = $_POST['community'];
            $shopres = $shop->add($shoparr);
            // $this->ajaxReturn($shopres);
            if($shopres){
                $one = $shop->where($shoparr)->find();
                $regionarr['shopid']=$one['id'];
                $regionres=$region->add($regionarr);
            }
            if($regionres && $shopres){
                $info['status']=1;
                $this->ajaxReturn($info);
            }else{
                $info['status']=2;
                $this->ajaxReturn($info);
            }    
        }else{
            $this->display('login');
        }
    }
    // 获取商店列表
    public function getShopData(){
        if(!empty($_SESSION['sjgw_admin_username'])){
            $shop=M('shop');
            $region=M('region');
            $shops = $shop->select();
            $regions = $region->select();
            if($shops&&$regions){
                foreach ($regions as $k1 => $v1) {
                    foreach ($shops as $k2 => $v2) {
                        if($v2['id']==$v1['shopid']){
                            $regions[$k1]['data']= $v2 ;
                            break;
                        }
                    }
                }
                $data=[];
                $arr=[];
                foreach ($regions as $key => $value) {
                    $arr[$value['region']]=$value['region'];
                }
                foreach ($arr as $k => $v) {
                   $newarr = [];
                   foreach ($regions as $key => $value) {
                      if($value['region']==$v){
                        $newarr[] = $value;
                      }
                   }
                   $data[]=array(data=>$newarr,region=>$v);
                }
                $this->ajaxReturn($data);
            }
        }else{
            $this->display('login');
        }
    }
    // 商店变更
    public function shopUpdata(){
        if(!empty($_SESSION['sjgw_admin_username'])){
            $shop=M('shop');// id
            $region=M('region');//shopid
            // id=4&region=松江区&street=九干路&community=九干路&shopname=蓝鸥科技&shopaddress=蓝鸥科技&shoptel=15258681586
            $id = $_POST['id'];
            $regions = [];
            $newshop=[];
            if(!empty($_POST['region'])){
                $regions['region']=$_POST['region'];
            }
            if(!empty($_POST['street'])){
                $regions['street']=$_POST['street'];
            }
            if(!empty($_POST['community'])){
                $regions['community']=$_POST['community'];
            }
            if(!empty($_POST['shopname'])){
                $newshop['shopname']=$_POST['shopname'];
            }
            if(!empty($_POST['shopaddress'])){
                $newshop['shopaddress']=$_POST['shopaddress'];
            }
            if(!empty($_POST['shoptel'])){
                $newshop['shoptel']=$_POST['shoptel'];
            }
            if(count($regions)>0){
                //有修改 区域 街道 社区信息
                $res=$region->where("shopid={$id}")->save($regions);
            }
            if(count($newshop)>0){
                //有修改 名字 地址 电话
                $res2=$shop->where("id={$id}")->save($newshop);
            }
            if($res||$res2){
                $info['status']=1;
                $this->ajaxReturn($info);
            }else if(count($newshop)==0&&count($regions)==0){
                $info['status']=0;
                $this->ajaxReturn($info);
            }else{
                $info['status']=2;
                $this->ajaxReturn($info);
            }
        }else{
            $this->display('login');
        }
    }
    // 添加管理员
    public function addadmin(){
        if(!empty($_SESSION['sjgw_admin_username'])){
            // 实例化表名
            $admin=M('admin');
            $_POST['pwd']=md5($_POST['pwd']);
            $res = $admin->add($_POST);
            if($res){
                $info['status']=1;
                $info['data'] = $admin->where($_POST)->find();
                $this->ajaxReturn($info);
            }else{
                $info['status']=0;
                $this->ajaxReturn($info);
            }
        }else{
            $this->display('login');
        }
    }
    // 管理员修改密码
    public function changemypwd(){
        if(!empty($_SESSION['sjgw_admin_username'])){
            // 实例化表名
            $admin=M('admin');
            // session('sjgw_admin_uid',$one['id']);
            $id = $_SESSION['sjgw_admin_uid'];
            $newarr['pwd'] = md5($_POST['newpwd']);
            $arr['id'] = $id;
            $arr['pwd'] = md5($_POST['oldpwd']);
            $one = $admin->where($arr)->find();
            if($one){
                // 旧密码输入正确--->改成新密码
                $res = $admin->where("id={$id}")->save($newarr);
                $info['status']=1;
                $this->ajaxReturn($info);
            }else{
                $info['status']=0;
                $this->ajaxReturn($info);
            }

        }else{
            $this->display('login');
        }
    }
    // 获取订单信息
    // 获取管理员列表
    public function getOrderData(){
        if(!empty($_SESSION['sjgw_admin_username'])){
            $order = M('order');
            $product = M("product");
            $address=M("address");
            // 查询已付款并且订单未完成的信息
            $pay['pay']=1;
            $pay['status']=array('like',[0,1],'OR');;
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
                // 收货人信息
                $where["id"]=$value['addressId'];
                $orderlist[$key]["message"]=$address->where($where)->find();
                if($orderlist[$key]["status"]==0){
                    $orderlist[$key]["status"]="未发货";
                }else if($orderlist[$key]["status"]==1){
                    $orderlist[$key]["status"]="已发货";
                }else if($orderlist[$key]["status"]==2){
                    $orderlist[$key]["status"]="订单已完成";
                }else if($orderlist[$key]["status"]==-1){
                    $orderlist[$key]["status"]="已取消"; 
                }else{
                    $orderlist[$key]["status"]="订单异常"; 
                }
            }
             $this->ajaxReturn($orderlist);
        }else{
            $this->display('login');
        }
    }
    // 改变订单状态
    public function changeOrderstatus(){
        if(!empty($_SESSION['sjgw_admin_username'])){
            // 实例化表名
            $order = M('order');
            $where['id']=$_POST['id'];
            $arr['status']=$_POST["status"];
            $res = $order->where($where)->save($arr);
            if($res){
                $info['status']=1;
                $this->ajaxReturn($info);
            }else{
                $info['status']=2;
                $this->ajaxReturn($info);
            }
        }else{
            $this->display('login');
        }
    }
    // 获取已完成的订单
    public function getOkOrderData(){
        if(!empty($_SESSION['sjgw_admin_username'])){
            $order = M('order');
            // 查询已完成订单的信息
            $pay['pay']=1;
            $pay['status']=2;
            // 查找已经付款的订单
            $orderlist = $order->where($pay)->order("addTime desc")->select();
            if($orderlist){
                $this->ajaxReturn($orderlist);
            }else{
                $info['status']=2;
                $this->ajaxReturn($info);
            }
        }else{
            $this->display('login');
        }
    }
    // 查询订单
    public function searchMyorder(){
        if(!empty($_SESSION['sjgw_admin_username'])){
            $pay["orderNum"] = $_POST["orderNum"];
            $order = M('order');
            $product = M("product");
            $address=M("address");
            $orderlist = $order->where($pay)->select();
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
                // 收货人信息
                $where["id"]=$value['addressId'];
                $orderlist[$key]["message"]=$address->where($where)->find();
                if($orderlist[$key]["status"]==0){
                    $orderlist[$key]["status"]="未发货";
                }else if($orderlist[$key]["status"]==1){
                    $orderlist[$key]["status"]="已发货";
                }else if($orderlist[$key]["status"]==2){
                    $orderlist[$key]["status"]="订单已完成";
                }else if($orderlist[$key]["status"]==-1){
                    $orderlist[$key]["status"]="已取消"; 
                }else{
                    $orderlist[$key]["status"]="订单异常"; 
                }
            }
            if($orderlist){
                $this->ajaxReturn($orderlist);
            }else{
                $info['status']=2;
                $this->ajaxReturn($info);
            }
        }else{
            $this->display('login');
        }
    }
}


