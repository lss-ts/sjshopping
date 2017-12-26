<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理系统</title>
    <script type="text/javascript" src="__ROOT__/Sjgw/Common/js/angular.min.js"></script>
    <script type="text/javascript" src="__ROOT__/Sjgw/Common/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="__ROOT__/Sjgw/Common/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="__ROOT__/Sjgw/Common/css/adminindex.css">
</head>
<body ng-app="myapp" ng-controller="mycontroller">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class='container'>
        <div class="panel-heading">
            <a href="###/" class='title'>后台管理系统</a>
            <span class='title'>欢迎您,</span>
            <span class='title2'><?php echo ($username); ?></span>
            <span class='title3' ng-click="del()">退出</span>
            <span class='title3' ng-click="changemypwd()">修改密码</span>
        </div>
        <div class="changemypwdbox container">
        	<form class="form-horizontal" >
				<div class="form-group">
				    <div class="col-sm-12">
				      <input type="password" class="form-control" name="" ng-model="oldpwd" placeholder="旧密码">
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-12">
				      <input type="password" class="form-control" ng-model="newpwd" placeholder="新密码">
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-12">
				      <input type="password" class="form-control" ng-model="newpwd2" placeholder="新密码">
				    </div>
				</div>
		        <div class="form-group">
				    <div class="col-sm-6">
				      <input type="button"  class="btn btn-success" value="确定" ng-click="postnewpwd()">
				    </div>
				</div>
	    	</form>
        </div>
        <div class="changemypwdbox2 container">
        	<form class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-12 control-label">输入管理员密码</label>
				    <div class="col-sm-12">
				      <input type="password" class="form-control" name="" ng-model="mypwd" placeholder="管理员密码">
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-6">
				      <input type="button"  class="btn btn-success" value="确定" ng-click="changeUser()">
				    </div>
				</div>
	    	</form>
        </div>
        <div class="changemypwdbox3 container">
        	<form class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-12 control-label">新库存</label>
				    <div class="col-sm-12">
				      <input type="number" class="form-control" name="" ng-model="newstock" placeholder="新库存">
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-6">
				      <input type="button"  class="btn btn-success btn-xs" value="确定" ng-click="changeProductStock()" ng-disabled="newstock==''">
				      <input type="button"  class="btn btn-danger btn-xs" value="取消" ng-click="cancelchangeStock()">
				    </div>
				</div>
	    	</form>
        </div>
        <div class="changemypwdbox4 container">
        	<form class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-12 control-label">推荐内容</label>
				    <div class="col-sm-12">
				      <input type="text" class="form-control" name="" ng-model="newRecommend" placeholder="推荐内容">
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-6">
				      <input type="button"  class="btn btn-success btn-xs" value="确定" ng-click="changeProductRecommend()" ng-disabled="newRecommend==''">
				      <input type="button"  class="btn btn-danger btn-xs" value="取消" ng-click="cancelchangeRecommend()">
				    </div>
				</div>
	    	</form>
        </div>
    </div>
</nav>
<div class="box">
  	<div class="adminBar">
  		<div class='item'>
  			<p>管理员</p>
  			<ul class='nav-detail'>
  				<li class="navlist">管理员列表</li>
  				<li class="navlist">新增管理员</li>
  			</ul>
  		</div>
  		<div class='item'>
  			<p>门店</p>
  			<ul class='nav-detail'>
  				<li class="navlist">门店列表</li>
  				<li class="navlist">添加门店</li>
  			</ul>
  		</div>
  		<div class='item'>
  			<p>商品</p>
  			<ul class='nav-detail'>
  				<li class="navlist">商品列表</li>
  				<li class="navlist">添加商品</li>
  				<li class="navlist">下架商品</li>
  				<li class="navlist">商品大类推广图</li>
  			</ul>
  		</div>
  		<div class='item'>
  			<p>用户</p>
  			<ul class='nav-detail'>
  				<li class="navlist">普通用户</li>
  				<li class="navlist">vip会员用户</li>
  			</ul>
  		</div>
  		<div class='item'>
  			<p>订单</p>
  			<ul class='nav-detail active'>
  				<li class="navlist">未完成订单</li>
  				<li class="navlist">已完成订单</li>
  				<li class="navlist">查询订单</li>
  			</ul>
  		</div>
  	</div>
  	<!-- 管理员列表 -->
	<div class="adminBody">
	  	<div class='container containerbox'>
	  		<form class="form-inline">
			  	<select class="form-control " id="select">
				  <option value='username'>用户名</option>
				  <option value='email'>邮箱</option>
				  <option value='tel'>手机号码</option>
				</select>
			  	<div class="form-group">
			    	<div class="col-sm-10">
				    	<input type="text" class="form-control search-box"  placeholder="请输入" ng-model='inputValue'>
					</div>
			  	</div>
			  	<button type="button" class="btn btn-success" ng-click="searchadmin($event)">搜索</button>
			  	<button type="button" class="btn btn-info" ng-click="getAdminData()">显示所有</button>
			</form>
	  		<table  class="table table-bordered table-hover admin-table">
	  			<tr>
				  <th class='col-sm-2'>id</th>
				  <th class='col-sm-2'>用户名</th>
				  <th class='col-sm-2'>密码</th>
				  <th class='col-sm-2'>性别(0保密，1男，2女)</th>
				  <th class='col-sm-2'>手机号码</th>
				  <th class='col-sm-2'>电子邮箱</th>
				</tr>
				<tr ng-repeat="v in adminList">
					<td class='col-sm-2'>{{v.id}}</td>
					<td class='col-sm-2'>{{v.username}}</td>
					<td class='col-sm-2'>{{v.pwd}}</td>
					<td class='col-sm-2'>{{v.sex}}</td>
					<td class='col-sm-2'>{{v.tel}}</td>
					<td class='col-sm-2'>{{v.email}}</td>
				</tr>
	  		</table>
  		</div>
  	</div>
  	<!-- 新建管理员 -->
  	<div class="adminBody ">
	  	<div class='container containerbox'>
	  		<form class="form-horizontal" novalidate="novalidate" name="addadminform">
			  	<div class="form-group">
				    <label for="adminusername" class="col-sm-2 control-label">用户名</label>
				    <div class="col-sm-5">
				      <input type="text" class="form-control" id="adminusername" placeholder="用户名" ng-model="admin.username" name="adminusername" ng-required="true" >
				    </div>
				</div>
				<div class="form-group">
				    <label for="adminpwd" class="col-sm-2 control-label">密码</label>
				    <div class="col-sm-5">
				      <input type="password" class="form-control" id="adminpwd" placeholder="密码" ng-model="admin.pwd"  ng-required="true" name="adminpwd">
				    </div>
				</div>
				<div class="form-group">
				    <label for="adminpwd2" class="col-sm-2 control-label">再次输入密码</label>
				    <div class="col-sm-5">
				      <input type="password" class="form-control" id="adminpwd2" placeholder="密码" ng-model="adminpwd2" ng-required="true" name="adminpwd2">
				    </div>
				    <div class="col-sm-2 text-danger" ng-if="adminpwd2==underfined||admin.pwd==adminpwd2?false:true">
				    	密码不相同
				    </div>
				</div>
				<div class="form-group">
					<div class="col-sm-5 col-sm-offset-2">
						<label>
						    <input type="radio" name="Radios" ng-model="admin.sex" value="1" >
						   	男
						</label>
						<label>
						    <input type="radio" name="Radios" ng-model="admin.sex" value="2">
						    女
						</label>
						<label>
						    <input type="radio" name="Radios" ng-model="admin.sex" value="0" checked>
						    保密
						</label>	
					</div>				
				</div>
				<div class="form-group">
				    <label for="adminemail" class="col-sm-2 control-label">邮箱</label>
				    <div class="col-sm-5">
				      <input type="email" class="form-control" id="adminemail" placeholder="email" ng-model="admin.email" ng-required="true" name="adminemail">
				    </div>
				</div>
				<div class="form-group">
				    <label for="admintel" class="col-sm-2 control-label">电话</label>
				    <div class="col-sm-5">
				      <input type="text" class="form-control" id="admintel" placeholder="电话" ng-model="admin.tel" ng-required="true" name="admintel">
				    </div>
				</div>
				<div class="form-group">
			    	<div class="col-sm-offset-4 col-sm-5">
			      		<button type="button" class="btn btn-success"  ng-disabled="!addadminform.$valid ||adminpwd2==underfined||admin.pwd==adminpwd2?true:false" ng-click="addadmin()">提交</button>
			    	</div>
			  	</div>
			</form>
  		</div>
  	</div>
  	<!-- 门店信息 -->
  	<div class="adminBody ">
  		<div class='container containerbox' >
  			<form class="form-horizontal">
			  <div class="form-group">
			    <div class="col-sm-2">
			      	<select class="form-control col-sm-2" id="checkregion">
						<option value="-1">选择一个区域查看</option>
					  	<option ng-repeat="(key,value) in shopList" value="{{key}}">{{value.region}}</option>
					</select>
			    </div>
			  </div>
			</form>
			<div ng-repeat="value in shopList" class="shopList">
				<div class="col-sm-12" style='font-size: 30px;color:red'>{{value.region}}</div>
				<table  class="table table-bordered table-hover product-table">
		  			<tr>
					  <th class='col-sm-1'>街道</th>
					  <th class='col-sm-1'>社区</th>
					  <th class='col-sm-2'>商店名称</th>
					  <th class='col-sm-3'>商店地址</th>
					  <th class='col-sm-3'>商店电话</th>
					  <th class='col-sm-2'>操作</th>
					</tr>
					<tr ng-repeat="(k,v) in value.data">
						<td class='col-sm-1'>{{v.street}}</td>
						<td class='col-sm-1'>{{v.community}}</td>
						<td class='col-sm-2'>{{v.data.shopname}}</td>
						<td class='col-sm-3'>{{v.data.shopaddress}}</td>
						<td class='col-sm-3'>{{v.data.shoptel}}</td>
						<td class='col-sm-2'><button class="btn btn-info" type="button" ng-click="shopUpdata()" value="{{v.data.id}}">修改</button></td>
					</tr>
		  		</table>
	  		</div>
  		</div>
  		<div class="shopchange">
  			<div class="container containerbox2">
	  			<form class="form-horizontal" >
				  <div class="form-group">
				    <label for="region" class="col-sm-2 control-label">新区域</label>
				    <div class="col-sm-5">
				      <input type="text" class="form-control" id="region" placeholder="门店所属区域" ng-model="newshop.region" >
				    </div>
				  </div>
				   <div class="form-group">
				    <label for="street" class="col-sm-2 control-label">新街道</label>
				    <div class="col-sm-5">
				      <input type="text" class="form-control" id="street" placeholder="街道" ng-model="newshop.street" >
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="community" class="col-sm-2 control-label">新社区</label>
				    <div class="col-sm-5">
				      <input type="text" class="form-control" id="community" placeholder="社区" ng-model="newshop.community" >
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="name" class="col-sm-2 control-label">门店新名称</label>
				    <div class="col-sm-5">
				      <input type="text" class="form-control" id="name" placeholder="门店名称" ng-model="newshop.shopname" >
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="shopaddress" class="col-sm-2 control-label">门店新地址</label>
				    <div class="col-sm-5">
				      <input type="text" class="form-control" id="shopaddress" placeholder="门店地址" ng-model="newshop.shopaddress" >
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="shoptel" class="col-sm-2 control-label">门店新电话</label>
				    <div class="col-sm-5">
				      <input type="text" class="form-control" id="shoptel" placeholder="门店电话" ng-model="newshop.shoptel" >
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-5">
				      <button type="button" class="btn btn-success" ng-click="shopUpdataOK()">提交</button>
				      <button type="button" class="btn btn-danger" ng-click="cancelshopUpdata()">取消</button>
				    </div>
				  </div>
				</form>
	  		</div>
  		</div>
  	</div>
  	<!-- 添加门店 -->
  	<div class='adminBody'>
  		<div class="container containerbox">
  			<div class="panel-heading">
	            <h3 class="panel-title col-sm-offset-2 col-sm-10" style="font-size: 23px;margin-bottom: 30px;">添加门店信息</h3>
	        </div>
  			<form class="form-horizontal" novalidate="novalidate" name="addshopform">
			  <div class="form-group">
			    <label for="region" class="col-sm-2 control-label">门店所属区域</label>
			    <div class="col-sm-5">
			      <input type="text" class="form-control" id="region" placeholder="门店所属区域" ng-model="shop.region" name="region" ng-required="true" >
			    </div>
			    <div class="col-sm-4 text-danger form-control-static" ng-if="!addshopform.region.$valid">
                        门店所属区域必须填写（例如：海曙区）
                </div>
                <div class="col-sm-4 text-success form-control-static" ng-if="addshopform.region.$valid">
                    已填写区域为{{shop.region}};
                </div>
			  </div>
			   <div class="form-group">
			    <label for="street" class="col-sm-2 control-label">街道</label>
			    <div class="col-sm-5">
			      <input type="text" class="form-control" id="street" placeholder="街道" ng-model="shop.street" ng-required="true" name="street" >
			    </div>
			    <div class="col-sm-4 text-danger form-control-static" ng-if="!addshopform.street.$valid">
                    所在街道必须填写（例如：南门街道）
                </div>
                <div class="col-sm-4 text-success form-control-static" ng-if="addshopform.street.$valid">
                    已填写街道{{shop.street}}
                </div>
			  </div>
			  <div class="form-group">
			    <label for="community" class="col-sm-2 control-label">社区</label>
			    <div class="col-sm-5">
			      <input type="text" class="form-control" id="community" placeholder="社区" ng-model="shop.community" ng-required="true" name="community" >
			    </div>
			    <div class="col-sm-4 text-danger form-control-static" ng-if="!addshopform.community.$valid">
                    所在社区必须填写（例如：澄浪社区）
                </div>
                <div class="col-sm-4 text-success form-control-static" ng-if="addshopform.community.$valid">
                    已填写社区{{shop.community}}
                </div>
			  </div>
			  <div class="form-group">
			    <label for="name" class="col-sm-2 control-label">门店名称</label>
			    <div class="col-sm-5">
			      <input type="text" class="form-control" id="name" placeholder="门店名称" ng-model="shop.shopname" name="name" ng-required="true" >
			    </div>
			    <div class="col-sm-4 text-danger form-control-static" ng-if="!addshopform.name.$valid">
                     门店名称必须填写（例如：井亭家园店（邻里））
                </div>
                <div class="col-sm-4 text-success form-control-static" ng-if="addshopform.name.$valid">
                    门店名称为{{shop.shopname}}
                </div>
			  </div>
			  <div class="form-group">
			    <label for="shopaddress" class="col-sm-2 control-label">门店地址</label>
			    <div class="col-sm-5">
			      <input type="text" class="form-control" id="shopaddress" placeholder="门店地址" ng-model="shop.shopaddress" name="shopaddress" ng-required="true"  >
			    </div>
			    <div class="col-sm-4 text-danger form-control-static" ng-if="!addshopform.shopaddress.$valid">
                        门店地址必须填写（例如：宁波市海曙区集士港镇泽兰巷123、125、131、133号）
                </div>
                <div class="col-sm-4 text-success form-control-static" ng-if="addshopform.shopaddress.$valid">
                    门店地址为{{shop.shopaddress}}
                </div>
			  </div>
			  <div class="form-group">
			    <label for="shoptel" class="col-sm-2 control-label">门店电话</label>
			    <div class="col-sm-5">
			      
			      <input type="text" class="form-control" id="shoptel" placeholder="门店电话" ng-model="shop.shoptel" ng-required="true" name="shoptel" >
			    </div>
			    <div class="col-sm-4 text-danger form-control-static" ng-if="!addshopform.shoptel.$valid">
                        门店电话必须填写（例如：0574-87746532）
                </div>
                <div class="col-sm-4 text-success form-control-static" ng-if="addshopform.shoptel.$valid">
                    门店电话为{{shop.shoptel}}
                </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-4 col-sm-5">
			      <button type="button" class="btn btn-success"  ng-disabled="!addshopform.$valid" ng-click="addshop()">提交</button>
			      <button type="button" class="btn btn-danger" ng-click="addshopreset()" ng-disabled="addshopform.$pristine">重置</button>
			    </div>
			  </div>
			</form>
  		</div>
  	</div>
  	<!-- 商品列表 -->
  	<div class="adminBody ">
  		<div class='container containerbox' >
  			<form class="form-horizontal">
			  <div class="form-group">
			    <div class="col-sm-2">
			      	<select class="form-control col-sm-2" id="checkfloorTitle">
						<option value="-1">选择一个类别查看</option>
					  	<option ng-repeat="(key,value) in productList" value="{{key}}">{{value.floorTitle}}</option>
					</select>
			    </div>
			    <div class="col-sm-10">
			    	下架商品请点击下架；修改库存请点击更新库存->输入新库存数；其他修改请点击修改->输入需要修改的信息、不用修改的信息不用填。
			    </div>
			  </div>
			</form>
			<div ng-repeat="value in productList" class='productList'>
				<div class="col-sm-12" style='font-size: 30px;color:red'>{{value.floorTitle}}</div>
				<table  class="table table-bordered table-hover product-table">
		  			<tr>
					  <th class='col-sm-1'>小类别</th>
					  <th class='col-sm-2'>商品名称</th>
					  <th class='col-sm-2'>商品图片</th>
					  <th class='col-sm-1'>普通价格</th>
					  <th class='col-sm-1'>会员价格</th>
					  <th class='col-sm-1'>商品库存</th>
					  <th class='col-sm-1'>推荐</th>
					  <th class='col-sm-1'>是否下架</th>
					  <th class='col-sm-2'>操作</th>
					</tr>
					<tr ng-repeat="(k,v) in value.data">
						<td class='col-sm-1'>{{v.productType}}</td>
						<td class='col-sm-2'>{{v.productTitle}}</td>
						<td class='col-sm-2'><img src="{{v.productImg}}" class="img-thumbnail col-sm-8"></td>
						<td class='col-sm-1'>{{v.Price}}</td>
						<td class='col-sm-1'>{{v.vPrice}}</td>
						<td class='col-sm-1'>{{v.stock}}
							<div class="form-group">
							    <div class="col-sm-12 changeStock">
							    	<button class="btn btn-info btn-xs" type="button" ng-click="changeStock()" value="{{v.id}}" ng-disabled="ischangeStock">更新库存</button>
							    </div>
							</div>
						</td>
						<th class='col-sm-1'>{{v.recommend}}
							<div class="form-group">
							    <div class="col-sm-12 changeRecommend">
							    	<button class="btn btn-info btn-xs" type="button" ng-click="changeRecommend()" value="{{v.id}}" ng-disabled="ischangeRecommend">添加推荐内容</button>
							    </div>
							</div>
						</th>
						<th class='col-sm-1'>否</th>
						<td class='col-sm-2'><button class="btn btn-info" type="button" ng-click="productUpdata()" value="{{v.id}}">修改</button>
							<button class="btn btn-danger" type="button" ng-click="soldout()" value="{{v.id}}">下架</button>
						</td>
					</tr>
		  		</table>
	  		</div>
  		</div>
  		<div class="changebox">
  			<div class="container containerbox2">
	  			<form class="form-horizontal">
	  				 <div class="form-group">
					    <label for="productTitle" class="col-sm-3 control-label">商品名称</label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="productTitle" placeholder="商品名称" ng-model="updataproducts.productTitle" >
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="vPrice" class="col-sm-3 control-label">会员价格</label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="vPrice" placeholder="会员价格" ng-model="updataproducts.vPrice" >
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="Price" class="col-sm-3 control-label">普通价格</label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="Price" placeholder="普通价格" ng-model="
					      updataproducts.Price">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="productImg" class="col-sm-3 control-label">商品图片</label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="productImg" placeholder="商品图片" ng-model="updataproducts.productImg"  ng-required="true" >
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-3 col-sm-7">
					      <button type="button" class="btn btn-success" ng-click="updataproduct()">提交</button>
					      <button type="button" class="btn btn-danger" ng-click="cancelupdataProduct()">取消</button>
					    </div>
					  </div>
					  <div class="form-group">
					  		<div class="col-sm-offset-3 col-sm-7">
					  			<img src="{{updataproducts.productImg}}" class="img-thumbnail col-sm-6" alt="新图片预览">
					  		</div>
					  </div>
	  			</form>
	  		</div>
  		</div>
  	</div>
  	<!-- 添加商品 -->
  	<div class="adminBody">
	  	<div class='container containerbox'>
	  		<form class="form-horizontal"  novalidate="novalidate" name="myAddProductForm">
			  <div class="form-group">
			    <label for="floorTitle" class="col-sm-3 control-label">大类别</label>
			    <div class="col-sm-3">
			      <!-- <input type="text" class="form-control" id="floorTitle" placeholder="大类别" ng-model="product.floorTitle"> -->
			      	<select class="form-control" id="productselect">
					  <option>请选择一个大类别</option>
					  <option value="精品生鲜">精品生鲜</option>
					  <option value="粮油调味">粮油调味</option>
					  <option value="进口食品">进口食品</option>
					  <option value="休闲小食">休闲小食</option>
					  <option value="酒水冲饮">酒水冲饮</option>
					  <option value="母婴用品">母婴用品</option>
					  <option value="厨卫清洁">厨卫清洁</option>
					  <option value="美妆个护">美妆个护</option>
					  <option value="家居日用">家居日用</option>
					</select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="productType" class="col-sm-3 control-label">小类别</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" id="productType" placeholder="小类别"  ng-model="product.productType"  ng-required="true" >
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="productImg" class="col-sm-3 control-label">商品图片</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" id="productImg" placeholder="商品图片" ng-model="product.productImg"  ng-required="true" >
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="productTitle" class="col-sm-3 control-label">商品名称</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" id="productTitle" placeholder="商品名称" ng-model="product.productTitle"  ng-required="true" >
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="vPrice" class="col-sm-3 control-label">会员价格</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" id="vPrice" placeholder="会员价格单位￥" ng-model="product.vPrice"  ng-required="true" >
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="Price" class="col-sm-3 control-label">普通价格</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" id="Price" placeholder="普通价格单位￥" ng-model="product.Price"  ng-required="true" >
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="weight" class="col-sm-3 control-label">商品重量</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" id="weight" placeholder="商品重量单位kg" ng-model="product.weight"  ng-required="true">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="brand" class="col-sm-3 control-label">商品品牌</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" id="brand" placeholder="商品品牌（可以不填）" ng-model="product.brand">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="detail" class="col-sm-3 control-label">商品详情</label>
			    <div class="col-sm-7">
			      <textarea type="text" class="form-control" id="detail" placeholder="商品详情（如保质期、使用方法等,可以不填）" ng-model="product.detail" rows="3" ></textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="place" class="col-sm-3 control-label">商品产地</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" id="place" placeholder="商品产地（可以不填、默认为中国）" ng-model="product.place">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-3 col-sm-7">
			      <button type="button" class="btn btn-success" ng-click="addProduct()" ng-disabled="!myAddProductForm.$valid">提交</button>
			      <button type="button" class="btn btn-danger" ng-click="addProductreset()" ng-disabled="myAddProductForm.$pristine">重置</button>
			    </div>
			  </div>
			</form>
			<div class="col-sm-offset-3 col-sm-7">
				<img src="{{product.productImg}}" alt="商品图片预览" class="img-thumbnail col-sm-3">
			</div>
		</div>
  	</div> 
  	<!-- 下架商品 -->
  	<div class="adminBody">
  		<div class='container containerbox' ng-show="!soldOutProductList.length==0">
  			<form class="form-horizontal">
			  <div class="form-group">
			    <div class="col-sm-2">
			      	<select class="form-control col-sm-2" id="checkfloorTitle">
						<option value="-1">选择一个类别查看</option>
					  	<option ng-repeat="(key,value) in soldOutProductList" value="{{key}}">{{value.floorTitle}}</option>
					</select>
			    </div>
			  </div>
			</form>
			<div ng-repeat="value in soldOutProductList" class='productList'>
				<div class="col-sm-12" style='font-size: 30px;color:red'>{{value.floorTitle}}</div>
				<table  class="table table-bordered table-hover product-table">
		  			<tr>
					  <th class='col-sm-2'>小类别</th>
					  <th class='col-sm-3'>商品名称</th>
					  <th class='col-sm-2'>商品图片</th>
					  <th class='col-sm-1'>普通价格</th>
					  <th class='col-sm-1'>会员价格</th>
					  <th class='col-sm-1'>是否下架</th>
					  <th class='col-sm-2'>操作</th>
					</tr>
					<tr ng-repeat="(k,v) in value.data">
						<td class='col-sm-2'>{{v.productType}}</td>
						<td class='col-sm-3'>{{v.productTitle}}</td>
						<td class='col-sm-2'><img src="{{v.productImg}}" class="img-thumbnail col-sm-8"></td>
						<td class='col-sm-1'>{{v.Price}}</td>
						<td class='col-sm-1'>{{v.vPrice}}</td>
						<th class='col-sm-1'>是</th>
						<td class='col-sm-2'>
							<button class="btn btn-danger" type="button" ng-click="putaway()" value="{{v.id}}">重新上市</button>
						</td>
					</tr>
		  		</table>
	  		</div>
  		</div>
  		<div class='container containerbox' ng-show="
  		soldOutProductList.length==0">
  			当前没有下架商品
  		</div>
  	</div>
  	<!-- 商品大类推广图 -->
  	<div class="adminBody">
  		<div class='container containerbox'>
			<div>
				<table  class="table table-bordered table-hover product-table">
		  			<tr>
					  <th class='col-sm-1'>类别</th>
					  <th class='col-sm-3'>左边图</th>
					  <th class='col-sm-3'>右上图</th>
					  <th class='col-sm-3'>右下图</th>
					  <th class='col-sm-2'>操作</th>
					</tr>
					<tr ng-repeat="v in ProductBigImgList" >
						<td class='col-sm-1'>{{v.floorTitle}}</td>
						<td class='col-sm-3'>
							<img src="{{v.leftImg}}" class="img-thumbnail col-sm-12" alt="左边图">
						</td>
						<td class='col-sm-3'>
							<img src="{{v.rightTopImg}}" class="img-thumbnail col-sm-12" alt="右上图">
						</td>
						<td class='col-sm-3'>
							<img src="{{v.rightBottomImg}}" class="img-thumbnail col-sm-12" alt="右下图">
						</td>
						<td class='col-sm-2'>
							<button class="btn btn-info" type="button" ng-click="changeProductBigImg()">更新</button>
						</td>
					</tr>
		  		</table>
	  		</div>
  		</div>
  		<div class="changeProductBigImgbox">
  			
  			<div class="container containerbox2">
  				
	  			<form class="form-horizontal">
	  				<div class="form-group">
	  					<div class="col-sm-10 col-sm-offset-3" style="color:red;font-size: 18px;">
			    			当已填写更新内容但图片预览未成功时，请不要提交！！！
						</div>
	  				</div>
	  				
	  				 <div class="form-group">
					    <label for="leftImg" class="col-sm-3 control-label">左边图</label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="leftImg" placeholder="左边图（不填表示不更新）" ng-model="updataproductBigImgs.leftImg" >
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="rightTopImg" class="col-sm-3 control-label">右上图</label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="rightTopImg" placeholder="右上图（不填表示不更新）" ng-model="updataproductBigImgs.rightTopImg" >
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="rightBottomImg" class="col-sm-3 control-label">右下图</label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="rightBottomImg" placeholder="右下图（不填表示不更新）" ng-model="
					      updataproductBigImgs.rightBottomImg">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-3 col-sm-7">
					      <button type="button" class="btn btn-success" ng-click="updataproductBigImg()">提交</button>
					      <button type="button" class="btn btn-danger" ng-click="cancelupdataBigImg()">取消</button>
					    </div>
					  </div>
					  <div class="form-group">
					  		<div class="col-sm-offset-3 col-sm-7">
					  			<img src="{{updataproductBigImgs.leftImg}}" class="img-thumbnail col-sm-3 col-sm-offset-1" alt="左边图图片预览">
					  			<img src="{{updataproductBigImgs.rightTopImg}}" class="img-thumbnail col-sm-3 col-sm-offset-1" alt="右上图图片预览">
					  			<img src="{{updataproductBigImgs.rightBottomImg}}" class="img-thumbnail col-sm-3 col-sm-offset-1" alt="右下图图片预览">
					  		</div>
					  </div>
	  			</form>
	  		</div>
  		</div>
  	</div>
  	<!--  用户信息-->
  	<div class="adminBody">
  		<div class='container containerbox' >
			<div>
				<table  class="table table-bordered table-hover product-table">
		  			<tr>
		  				<th class='col-sm-1'>id</th>
					 	<th class='col-sm-2'>用户名</th>
					 	
					 	<th class='col-sm-2'>手机号码</th>
					 	<th class='col-sm-1'>vip会员</th>
					 	<th class='col-sm-1'>账号状态</th>
					  	<th class='col-sm-2'>操作</th>
					</tr>
					<tr ng-repeat="value in userList" >
						<td class='col-sm-1'>{{value.id}}</td>
						<td class='col-sm-2'>{{value.username}}</td>
						
						<td class='col-sm-2'>{{value.phone}}</td>
						<td class='col-sm-1'>{{value.isvip}}</td>
						<td class='col-sm-1'>{{value.status}}</td>
						<td class='col-sm-2'>
							<button class="btn btn-danger" ng-click="freeze()">禁用</button>
							<button class="btn btn-danger" ng-click="release()">解禁</button>
						</td>
					</tr>
		  		</table>
	  		</div>
  		</div>
  	</div>
  	<!-- vip用户 -->
  	<div class="adminBody">
  		<div class='container containerbox'>
			<div>
				<table  class="table table-bordered table-hover product-table">
		  			<tr>
		  				<th class='col-sm-1'>id</th>
					 	<th class='col-sm-2'>用户名</th>
					 	<th class='col-sm-3'>密码</th>
					 	<th class='col-sm-2'>手机号码</th>
					 	<th class='col-sm-1'>vip会员</th>
					 	<th class='col-sm-1'>账号状态</th>
					  	<th class='col-sm-2'>操作</th>
					</tr>
					<tr ng-repeat="value in vipuserList" >
						<td class='col-sm-1'>{{value.id}}</td>
						<td class='col-sm-2'>{{value.username}}</td>
						<td class='col-sm-3'>{{value.pwd}}</td>
						<td class='col-sm-2'>{{value.phone}}</td>
						<td class='col-sm-1'>{{value.isvip}}</td>
						<td class='col-sm-1'>{{value.status}}</td>
						<td class='col-sm-2'>
							<button class="btn btn-danger" ng-click="freeze()">禁用</button>
							<button class="btn btn-danger" ng-click="release()">解禁</button>
						</td>
					</tr>
		  		</table>
	  		</div>
  		</div>
  	</div>
  	<!-- 未完成订单 -->
  	<div class="adminBody">
  		<div class='container containerbox'>
			<div>
				<table  class="table table-bordered table-hover product-table" ng-repeat="value in orderList" >
					<tr>
						<th colspan="7" class="info" style="font-size: 24px;">订单{{value.orderNum}}</th>
					</tr>
		  			<tr>
		  				<th class='col-sm-2'>订单号/订单时间</th>
					 	<th class='col-sm-2'>收货人姓名/收货人手机号</th>
					 	<th class='col-sm-2'>收货人地址</th>
					 	<th class='col-sm-2'>总价/总重/运费</th>
					 	<th class='col-sm-1'>付款</th>
					 	<th class='col-sm-1'>状态</th>
					  	<th class='col-sm-2'>操作</th>
					</tr>
					<tr>
						<td class='col-sm-2'>订单号：{{value.orderNum}}<br>订单时间：{{value.addTime}}</td>
					 	<td class='col-sm-2'>收货人：{{value.message.username}}<br>联系方式：{{value.message.tel}}</td>
					 	<td class='col-sm-2'>{{value.message.address}}</td>
					 	<td class='col-sm-2'>{{value.totalC}}元/{{value.totalW}}kg/{{value.ymoney}}元</td>
					 	<th class='col-sm-1'>已付</th>
					 	<td class='col-sm-1'>{{value.status}}</td>
					  	<td class='col-sm-2'>
					  		<button class="btn-success btn" ng-click="changeOrder()" ng-disabled="changeOrders">操作</button>
					  	</td>
					</tr>
					<!-- 货物栏 -->
		 			<tr>
		 				<th class='col-sm-2' colspan="2">货物名称</th>
		 				<th class='col-sm-2' >货物数量</th>
		 				<th class='col-sm-2' colspan="2">单价</th>
		 				<th class='col-sm-2' colspan="2">货物重量</th>
		 			</tr>
		 			<tr ng-repeat="v in value.detail">
		 				<td class='col-sm-2' colspan="2">{{v.data.productTitle}}</td>
		 				<td class='col-sm-2' >{{v.num}}</td>
		 				<td class='col-sm-2' colspan="2">{{v.data.Price}}</td>
		 				<td class='col-sm-2' colspan="2">{{v.data.weight}}</td>
		 			</tr>	
		  		</table>
	  		</div>
	  		<div class="changeOrderbox container">
	  			<div class="bg-warning">
	  				当前订单状态为<span class="red">
	  					{{orderstatus}}
	  				</span>
	  				
	  			</div>
	  			<div style="text-align: left;">
	  				<button class="btn-success btn" ng-click="changeOrderstatus(1)">发货</button>
	  				<button class="btn-success btn" ng-click="changeOrderstatus(2)">订单完成</button>
	  				<button class="btn-success btn" ng-click="changeOrderstatus(3)">异常订单</button><br>
	  				<button class="btn-danger btn" ng-click="cancelchangeOrderstatus()">取消</button>
	  			</div>
	  		</div>
  		</div>
  	</div>
  	<!-- 已完成订单 -->
  	<div class="adminBody">
  		<div class='container containerbox'>
			<div>
				<table  class="table table-bordered table-hover " >
					<tr>
						<th colspan="2" class="info" style="font-size: 24px;">已完成订单</th>
						<th class="info" style="font-size: 24px;">订单汇总{{allokordertotalC}}元</th>
					</tr>		  			
					<tr>
		  				<th class='col-sm-2'>订单号</th>
					 	<th class='col-sm-2'>订单时间</th>
					 	<th class='col-sm-2'>订单金额</th>
					</tr>
					<tr ng-repeat="value in okorderList" >
						<td class='col-sm-2'>{{value.orderNum}}</td>
					 	<td class='col-sm-2'>{{value.addTime}}</td>
					 	<td class='col-sm-2'>{{value.totalC}}</td>
					</tr>
		  		</table>
	  		</div>
  		</div>
  	</div>
  	<!-- 查询订单 -->
  	<div class="adminBody adminBodyActive">
  		<div class='container containerbox'>
  			<form class="form-inline">
			  	<div class="form-group">
			    	<div class="col-sm-10">
				    	<input type="text" class="form-control search-box"  placeholder="请输入订单号" ng-model='searchorderinputValue'>
					</div>
			  	</div>
			  	<button type="button" class="btn btn-success" ng-click="searchMyorder()">搜索</button>
			</form>
			<div>
				<table  class="table table-bordered table-hover product-table" ng-repeat="value in searchokorderList" >
					<tr>
						<th colspan="7" class="info" style="font-size: 24px;">订单{{value.orderNum}}</th>
					</tr>
		  			<tr>
		  				<th class='col-sm-2'>订单号/订单时间</th>
					 	<th class='col-sm-2'>收货人姓名/收货人手机号</th>
					 	<th class='col-sm-2'>收货人地址</th>
					 	<th class='col-sm-2'>总价/总重/运费</th>
					 	<th class='col-sm-1'>付款</th>
					 	<th class='col-sm-1'>状态</th>
					  	<th class='col-sm-2'>操作</th>
					</tr>
					<tr>
						<td class='col-sm-2'>订单号：{{value.orderNum}}<br>订单时间：{{value.addTime}}</td>
					 	<td class='col-sm-2'>收货人：{{value.message.username}}<br>联系方式：{{value.message.tel}}</td>
					 	<td class='col-sm-2'>{{value.message.address}}</td>
					 	<td class='col-sm-2'>{{value.totalC}}元/{{value.totalW}}kg/{{value.ymoney}}元</td>
					 	<th class='col-sm-1'>已付</th>
					 	<td class='col-sm-1'>{{value.status}}</td>
					  	<td class='col-sm-2'>
					  		<button class="btn-success btn" ng-click="changeOrder()" ng-disabled="changeOrders">操作</button>
					  	</td>
					</tr>
					<!-- 货物栏 -->
		 			<tr>
		 				<th class='col-sm-2' colspan="2">货物名称</th>
		 				<th class='col-sm-2' >货物数量</th>
		 				<th class='col-sm-2' colspan="2">单价</th>
		 				<th class='col-sm-2' colspan="2">货物重量</th>
		 			</tr>
		 			<tr ng-repeat="v in value.detail">
		 				<td class='col-sm-2' colspan="2">{{v.data.productTitle}}</td>
		 				<td class='col-sm-2' >{{v.num}}</td>
		 				<td class='col-sm-2' colspan="2">{{v.data.Price}}</td>
		 				<td class='col-sm-2' colspan="2">{{v.data.weight}}</td>
		 			</tr>	
		  		</table>
	  		</div>
  		</div>
  	</div>
</div>
</body>
<script>
	var app = angular.module('myapp',[]);
    app.controller('mycontroller',function ($scope,$http) {
    	$scope.adminList=[];
    	$scope.select='用户名';
    	$scope.admin={sex:0};
    	$scope.soldOutProductList=[];
    	$scope.ischangeStock=false;
    	$scope.ischangeRecommend=false;
    	$scope.newstock="";
    	$scope.newRecommend="";
    	$scope.orderstatus="";
    	$scope.changeOrders=false;
    	$scope.allokordertotalC =0;
    	$scope.searchorderinputValue="";
    	$scope.searchokorderList=[];
    	// 修改密码
    	$scope.changemypwd=function(){
    		var h = $('.changemypwdbox').css('height');
    		// console.log(parseInt(h));
    		if(parseInt(h)>100){
    			// console.log(111);
    			$('.changemypwdbox').animate({'height':"0px"},500);
    		}else{
	    		$('.changemypwdbox').animate({'height':"196px"},500);
	    		$scope.oldpwd="";
	    		$scope.newpwd="";
	    		$scope.newpwd2="";
	    		$scope.postnewpwd=function(){
	    			if($scope.oldpwd==""){
	    				alert('旧密码不能为空，如果忘记请联系管理员！');
	    			}else if($scope.newpwd==""){
	    				alert('新密码不能为空');
	    			}else if($scope.newpwd != $scope.newpwd2){
	    				alert('新密码输入不一致');
	    			}else{
	    				var str = "oldpwd="+$scope.oldpwd +"&newpwd="+$scope.newpwd;
	    				$http.post('__APP__/index/changemypwd',str,{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
				            if(res.status==1){
				            	alert('密码修改成功');
				            	$scope.getAdminData();
				            }else{
				            	alert('旧密码输入错误');
				            }
				            $('.changemypwdbox').animate({'height':'0px'},500);
				            $scope.oldpwd="";
	    					$scope.newpwd="";
	    					$scope.newpwd2="";
				        	}).error(function (err) {
				            console.log(err);
				        })
	    			}
	    		}
    		}
    	}
    	// 获取管理员列表
    	$scope.getAdminData=function(){
	    	$http.post('__APP__/index/getAdminData',"",{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
	            // console.log(res);
	            $scope.adminList=res;
	            
	        	}).error(function (err) {
	            console.log(err);
	        })
    	}
		$scope.getAdminData();
		// 新增管理员
		$scope.addadmin=function(){
			console.log($scope.admin);
			var arr = []
			for (var i in $scope.admin) {
				var str = i+"="+$scope.admin[i];
				arr.push(str);
			}
			var newstr = arr.join("&");
			$http.post('__APP__/index/addadmin',newstr,{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
	           		if(res.status==1){
	           			alert('注册成功');
	           			$scope.getAdminData();
	           			$scope.admin={sex:0}
	           			$scope.adminpwd2="";
	           		}else{
	           			alert('注册失败');
	           			$scope.admin={sex:0};
	           			$scope.adminpwd2="";
	           		}
	            
	        	}).error(function (err) {
	            console.log(err);
	        })
		}
        // 获取商品列表
        $scope.getProductData=function(){
	        $http.post('__APP__/index/getProductData',"",{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
	            // console.log(res);
	            $scope.productList=res;
	            
	        	}).error(function (err) {
	            console.log(err);
	        })
        }
        $scope.getProductData();
        // 获取下架商品列表
        $scope.getsoldOutProductData=function(){
	        $http.post('__APP__/index/getProductData',"issoldout=0",{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
	            // console.log(res);
	            if(res.status==2){
					$scope.soldOutProductList=[];
	            }else{
	            	$scope.soldOutProductList=res;
	            }
	        	}).error(function (err) {
	            console.log(err);
	        })
        }
        $scope.getsoldOutProductData();
        // 获取大类图片信息
        $scope.getProductBigImgData=function(){
        	$http.post('__APP__/index/getProductBigImgData',"",{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
	            // console.log(res);
	            if(res.status==2){
					$scope.ProductBigImgList=[];
	            }else{
	            	$scope.ProductBigImgList=res.data;
	            }
	        	}).error(function (err) {
	            console.log(err);
	        })
        }
        $scope.getProductBigImgData();
        // 修改大类图片
        $scope.changeProductBigImg=function(){
        	console.log(this);
        	var id = this.v.id;
        	$('.changeProductBigImgbox').css({'display':'block','width':function(){
        		return $('body').css('width');
        	}})
        	$('.changeProductBigImgbox label').css({'color':'white'});
        	$scope.updataproductBigImgs={};
        	$scope.updataproductBigImg=function(){
        		console.log($scope.updataproductBigImgs);
        		var str = "id="+id;
        		for (var i in $scope.updataproductBigImgs) {
        			if($scope.updataproductBigImgs[i]!=''){
        				str += "&"+i+"="+$scope.updataproductBigImgs[i];
        			}
        		}
        		console.log(str);
	        	$http.post('__APP__/index/updataproductBigImg',str,{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
		            // $scope.adminList=res;
		            console.log(res);
		            if(res.status==1){
		            	for (var i = 0; i < $scope.ProductBigImgList.length; i++) {
		            		if($scope.ProductBigImgList[i].id==res.data.id){
		            			$scope.ProductBigImgList[i]=res.data;
		            			break;
		            		}
		            	};
		            }else{
		            	alert("系统出现错误");
		            }
		            $scope.cancelupdataBigImg();
		        	}).error(function (err) {
		            console.log(err);
		            $scope.cancelupdataBigImg();
		        })
        	}
        }
        $scope.cancelupdataBigImg=function(){
        	$('.changeProductBigImgbox').css({'display':'none'});
        	$scope.updataproductBigImgs={};
        }
        // 获取商店列表
        $scope.getShopData=function(){
        	$http.post('__APP__/index/getShopData',"",{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
	            // console.log(res);
	            $scope.shopList=res;
	            
	        	}).error(function (err) {
	            console.log(err);
	        })
        }
        $scope.getShopData();
        // 获取用户列表
        $scope.getUserData=function(){
        	$http.post('__APP__/index/getUserData',"",{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
	            // console.log(res);
	            $scope.userList=res;
	        	}).error(function (err) {
	            console.log(err);
	        })
        } 
        $scope.getUserData();
        // 获取vip用户列表
        $scope.getvipUserData=function(){
        	$http.post('__APP__/index/getvipUserData',"",{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
	            // console.log(res);
	            $scope.vipuserList=res;
	        	}).error(function (err) {
	            console.log(err);
	        })
        }
        $scope.getvipUserData();
        // 冻结用户
        $scope.freeze=function(){
        	
        	var id = this.value.id;
        	var h = $('.changemypwdbox2').css('height');
    		console.log(id);
    		if(parseInt(h)>100){
    			// console.log(111);
    			$('.changemypwdbox2').animate({'height':"0px"},500);
    		}else{
	    		$('.changemypwdbox2').animate({'height':"120px"},500);
	    		$('.changemypwdbox2 input').eq(0).focus();
	    		$scope.mypwd="";
	    		$scope.changeUser=function(){
	    			$scope.changeUsers(2,id);
	    		};
    		}
        }
        // 解封用户
        $scope.release=function(){
        	
        	var id = this.value.id;
        	var h = $('.changemypwdbox2').css('height');
    		// console.log(parseInt(h));
    		if(parseInt(h)>100){
    			// console.log(111);
    			$('.changemypwdbox2').animate({'height':"0px"},500);
    		}else{
	    		$('.changemypwdbox2').animate({'height':"120px"},500);
	    		$('.changemypwdbox2 input').eq(0).focus();
	    		$scope.mypwd="";
	    		$scope.changeUser=function(){
	    			$scope.changeUsers(1,id);
	    		};
    		}
        }
        // 改变用户状态
        $scope.changeUsers=function(type,id){
			if($scope.mypwd==""){
				alert('密码不能为空，如果忘记请联系管理员！');
				$('.changemypwdbox2').animate({'height':"0px"},500);
			}else{
				var str = "mypwd="+$scope.mypwd+"&id="+id+"&type="+type;
				$http.post('__APP__/index/changeUser',str,{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
					console.log(res);
		            if(res.status==1){
		            	alert('用户状态修改成功');
		            	// console.log(res);
		            	// console.log($scope.vipuserList);
		            	// console.log($scope.userList);
		            	var bol = true;
		            	for (var i = 0; i < $scope.vipuserList.length; i++) {
		            		if($scope.vipuserList[i].id==res.data.id){
		            			$scope.vipuserList[i] = res.data;
		            			bol = false;
		            			break;
		            		}
		            	}
		            	if(bol){
		            		for (var i = 0; i < $scope.userList.length; i++) {
			            		if($scope.userList[i].id==res.data.id){
			            			$scope.userList[i] = res.data;
			            			bol = false;
			            			break;
			            		}
		            		}
		            	}
		            	
		            }else if(res.status==2){
		            	alert('密码输入错误');
		            }else{
		            	alert('系统出现错误');
		            }
		            $('.changemypwdbox2').animate({'height':'0px'},500);
		            $scope.mypwd="";
		        	}).error(function (err) {
		            console.log(err);
		        })
			}
		}
        // 退出
        $scope.del=function () {
            $http.post('__APP__/index/del',"",{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
                console.log(res);
                if(res.status==1){
                    alert('退出成功！');
                    setTimeout("location.href='__APP__/index/'",1000);
                }else{
                    alert('系统出现错误!!');
                }
            }).error(function (err) {
                console.log(err);
            })
        }
        // 查询管理员
        $scope.searchadmin=function(){
        	//jq 获取
        	if($scope.inputValue!=undefined){
        		var type = $("#select option:selected").val();
        		var str = type +"="+$scope.inputValue;
        		console.log(str);
        		$http.post('__APP__/index/getAdminData',str,{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
		                console.log(res);
		                if(res.status==2){
		                	alert('没有查到你需要的数据');
		                } else{
		                	 $scope.adminList=res.data;
		                }
		                $scope.inputValue='';
		               
		            }).error(function (err) {
		                console.log(err);
		            })
        	}else{

        	}
        }
        // 添加商品
        $scope.addProduct=function(){
        	var str = "floorTitle="+floorTitle;
        	for (var i in $scope.product) {
        		str+= "&"+i+"="+$scope.product[i];
        	}
        	// console.log($scope.product);
        	var floorTitle = $("#productselect").val();
        	// console.log(floorTitle);
        	
        	console.log(str);
        	$http.post('__APP__/index/addProduct',str,{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
	              	if(res.status==1){
	              		alert('添加成功');
	              		var productType=$scope.product.productType;
	              		$scope.product={};
	              		$scope.product.productType=productType;
	              	}else{
	              		alert('添加失败');
	              		$scope.product={};
	              	}  
		                
	            }).error(function (err) {
	                console.log(err);
	            })
        }
        // 更新商品
        $scope.productUpdata=function(){
        	var id = this.v.id;
        	// console.log(this);
        	$('.changebox').css({'display':'block','width':function(){
        		return $('body').css('width');
        	}})
        	$('.changebox label').css({'color':'white'});
        	$scope.updataproducts={};
        	$scope.updataproduct=function(){
        		var str = "id="+id;
	        	for (var i in $scope.updataproducts) {
	        		str+= "&"+i+"="+$scope.updataproducts[i];
	        	}
	        	// console.log($scope.product);
	        	var floorTitle = $("#productselect").val();
	        	// console.log(floorTitle);
	        	
	        	// console.log(str);
	        	$http.post('__APP__/index/updataProduct',str,{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
	        			// console.log(res);
	        			// console.log($scope.productList);
		              	if(res.status==1){
		              		alert('修改成功');
		              		$scope.updataproducts={};
		              		var bol = true;
		              		for (var i = 0 ; i<$scope.productList.length;i++) {
			            		for (var j = 0; j < $scope.productList[i].data.length; j++) {
			            			if($scope.productList[i].data[j].id == res.data.id){
			            				$scope.productList[i].data[j]=res.data;
			            				bol = false;
			            				break;
			            			}
			            		}
			            		if(!bol){
			            			break;
			            		}
			            	}
		              		$('.changebox').css({'display':'none'});
		              	}else{
		              		alert('修改失败');
		              		$scope.updataproducts={};
		              	}  
			                
		            }).error(function (err) {
		                console.log(err);
		            })
        	}
        }
        // 取消更新
       	$scope.cancelupdataProduct=function(){
       		$('.changebox').css({'display':'none'});
       		$scope.updataproducts={};
       	} 
        // 改变库存
        $scope.changeStock=function(){
        	console.log(this);
        	var id = this.v.id;
        	$scope.ischangeStock=true;
        	$('.changemypwdbox3').animate({"height":"125px"},200);
        	$scope.changeProductStock=function(){
        		var str = "stock="+$scope.newstock+"&id="+id;
        		$http.post('__APP__/index/changeStock',str,{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
	            // console.log(res);
	            if(res.status==1){
	            	for (var i = 0 ; i<$scope.productList.length;i++) {
	            		for (var j = 0; j < $scope.productList[i].data.length; j++) {
	            			if($scope.productList[i].data[j].id == res.data.id){
	            				$scope.productList[i].data[j]=res.data;
	            				bol = false;
	            				break;
	            			}
	            		}
	            		if(!bol){
	            			break;
	            		}
	            	}
	            	$scope.cancelchangeStock();
	            }else{
	            	alert('修改失败');
	            }
	            
	        	}).error(function (err) {
	            console.log(err);
	        })
        	}
        }
        // 取消更新库存
        $scope.cancelchangeStock=function(){
        	$scope.ischangeStock=false;
        	$('.changemypwdbox3').animate({"height":"0px"},200);
        	$scope.newstock="";
    	
        }
        // 改变推荐内容
        $scope.changeRecommend=function(){
        	// console.log(this);
        	var id = this.v.id;
        	$scope.ischangeRecommend=true;
        	$('.changemypwdbox4').animate({"height":"125px"},200);
        	$scope.changeProductRecommend=function(){
        		var str = "recommend="+$scope.newRecommend+"&id="+id;
        		$http.post('__APP__/index/changeRecommend',str,{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
	            console.log(res);
	            console.log($scope.productList);
	            if(res.status==1){
	            	var bol = true;
	            	for (var i = 0 ; i<$scope.productList.length;i++) {
	            		for (var j = 0; j < $scope.productList[i].data.length; j++) {
	            			if($scope.productList[i].data[j].id == res.data.id){
	            				$scope.productList[i].data[j]=res.data;
	            				bol = false;
	            				break;
	            			}
	            		}
	            		if(!bol){
	            			break;
	            		}
	            	}
	            	$scope.cancelchangeRecommend();
	            }else{
	            	alert('修改失败');
	            }
	            
	        	}).error(function (err) {
	            console.log(err);
	        })
        	}
        }
        // 取消推荐
        $scope.cancelchangeRecommend=function(){
        	$scope.ischangeRecommend=false;
        	$('.changemypwdbox4').animate({"height":"0px"},200);
        	$scope.newRecommend="";
        }
        
       	// 下架商品
        $scope.soldout=function(){
        	var id = this.v.id;
        	var str = "id="+id;
        	// console.log(this);
        	$http.post('__APP__/index/soldout',str,{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
	            // console.log(res);
	            if(res.status==1){
	            	alert('下架成功');
	            	$scope.getProductData();
	            	$scope.newstock="";
	            	$scope.getsoldOutProductData();
	            }else{
	            	alert('下架失败');
	            	$scope.newstock="";
	            }
	            
	        	}).error(function (err) {
	            console.log(err);
	        })
        }
        // 重新上架
        $scope.putaway=function(){
        	var id = this.v.id;
        	var str = "id="+id;
        	// console.log(this);
        	$http.post('__APP__/index/putaway',str,{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
	            // console.log(res);
	            if(res.status==1){
	            	alert('上架成功');
	            	$scope.getProductData();
	            	$scope.getsoldOutProductData();
	            }else{
	            	alert('上架失败');
	            }
	            
	        	}).error(function (err) {
	            console.log(err);
	        })
        }
       	// 添加商店
       	$scope.addshop=function(){
       		var shoparr = [];
       		for (var i in $scope.shop) {
       			var str = i + "=" + $scope.shop[i];
       			shoparr.push(str);
       		};
       		var newstr = shoparr.join("&");
       		console.log(newstr);
       		$http.post('__APP__/index/addShop',newstr,{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
	            console.log(res);
	            if(res.status==1){
	            	alert('添加成功');
	            }else{
	            	alert('添加失败');
	            }
	            $scope.addshopreset();
            
        	}).error(function (err) {
            	console.log(err);
        	})
       	}
       	// 重置添加商店
       	$scope.addshopreset=function(){
       		for (var i in $scope.shop) {
       			if(i!='region'){
       				$scope.shop[i]='';
       			}
       		};
       		 $scope.addshopform.$setPristine();
       	}
       	// 重置添加商品
       	$scope.addProductreset=function(){
       		for (var i in $scope.product) {
       			$scope.product[i]='';
       		};
       		 $scope.myAddProductForm.$setPristine();
       	}
       	//修改商店信息
       	$scope.shopUpdata=function(){
       		var id = this.v.shopid;
        	// console.log(this.v.shopid);
        	$('.shopchange').css({'display':'block','width':function(){
        		return $('body').css('width');
        	}})
        	$('.shopchange label').css({'color':'white'});
        	$scope.newshop={};
        	$scope.shopUpdataOK=function(){
        		var str = "id="+id;
	        	for (var i in $scope.newshop) {
	        		str+= "&"+i+"="+$scope.newshop[i];
	        	}
	        	$http.post('__APP__/index/shopUpdata',str,{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
	        			// console.log(res);
		              	if(res.status==1){
		              		alert('修改成功');
		              		$scope.getShopData();
		              		$scope.cancelshopUpdata();
		              	}else if(res.status==0){
		              		alert('未填写信息');
		              		$scope.updataproducts={};
		              	}else{
		              		alert('修改失败');
		              		$scope.updataproducts={};
		              	}     
		            }).error(function (err) {
		                console.log(err);
		            })
        	}
       	}
       	$scope.cancelshopUpdata=function(){
       		$('.shopchange').css({'display':'none'});
       		$scope.newshop={};
       	}
       	// -=-=-=-=-=-=-=-订单信息-=-=-=-=-=-=-
       	// 获取订单
       	$scope.getOrderData=function(){
       		$http.post('__APP__/index/getOrderData',"",{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
	            console.log(res);
	            $scope.orderList=res;
            
        	}).error(function (err) {
            	console.log(err);
        	})
       	}
       	$scope.getOrderData();
       	// 订单操作
       	$scope.changeOrder=function(){
       		$scope.changeOrders=true;
       		// console.log(this);
       		var id =this.value.id ;
       		// var status = this.value.status;
       		$scope.orderstatus=this.value.status;
       		$(".changeOrderbox").animate({"height":"145px"},300);
       		$scope.changeOrderstatus=function(num){
       			var str = "id="+id+"&status="+num;
	       		$http.post('__APP__/index/changeOrderstatus',str,{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
		            if(res.status==1){
		            	$scope.getOrderData();
		            }else{
		            	alert("系统出现错误");
		            }
	            	$scope.cancelchangeOrderstatus();
	        	}).error(function (err) {
	            	console.log(err);
	        	})
       		}
       	}
       	// 取消
       	$scope.cancelchangeOrderstatus=function(){
       		$(".changeOrderbox").animate({"height":"0px"},300);
       		$scope.changeOrders=false;
       	}
       	// 获取订单
       	$scope.getokOrderData=function(){
       		$http.post('__APP__/index/getOkOrderData',"",{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
	            console.log(res);
	            if(res.status==2){

	            }else{
		            $scope.okorderList=res;
		            var allokordertotalC = 0;
		            for (var i = 0; i < $scope.okorderList.length; i++) {
		            	allokordertotalC+= Number($scope.okorderList[i].totalC);
		            };
		            $scope.allokordertotalC = allokordertotalC;
	            }
	            
        	}).error(function (err) {
            	console.log(err);
        	})
       	}
       	$scope.getokOrderData();
       	// 查询订单
       	$scope.searchMyorder=function(){
       		var str = "orderNum="+$scope.searchorderinputValue;
       		$http.post('__APP__/index/searchMyorder',str,{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
	            console.log(res);
	            if(res.status==2){
	            	alert("没有查询到该订单");
	            }else{
	            	$scope.searchokorderList=res;
	            }
        	}).error(function (err) {
            	console.log(err);
        	})
       	}
    })
    // jq
    $('.adminBar .item p').click(function(){
    	// console.log($(this));
    	$(this).parent().children().eq(1).css({'display':function(index,value){
    		return value == 'none' ? 'block' : 'none' ;
    	}});
    });
    // $('.changebox').css('width':)
    $("#checkfloorTitle").change(function(){
    	var index = $("#checkfloorTitle option:selected").val();
    	$(".productList").hide();
    	if(index==-1){
    		$(".productList").show();
    	}else{
    		$(".productList").eq(index).show();
    	}
    })
    $("#checkregion").change(function(){
    	var index = $("#checkregion option:selected").val();
    	$(".shopList").hide();
    	if(index==-1){
    		$(".shopList").show();
    	}else{
    		$(".shopList").eq(index).show();
    	}
    })
    var navlist = $('.navlist');
    for (let i = navlist.length - 1; i >= 0; i--) {
    	navlist[i].onclick=function(){
    		$('.adminBody').css({"display":function(index,value){
    			// console.log(index,value);
    			if(index==i){
    				return "block";
    			}else{
    				return "none";
    			}
    		}})
    	}
    }
</script>
</html>