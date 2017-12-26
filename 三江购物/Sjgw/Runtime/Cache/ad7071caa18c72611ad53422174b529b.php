<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>注册</title>
		<script type="text/javascript" src="__ROOT__/Sjgw/Common/js/angular.min.js"></script>
		<link rel="stylesheet" href="__ROOT__/Sjgw/Common/css/bootstrap.css">
		<style type="text/css">
			.panel {
				margin: 100px auto;
			}
			
			.title {
				text-decoration: none!important;
				color: white;
				font-size: 18px;
			}
		</style>
	</head>

	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class='container'>
				<div class="panel-heading">
					<a href="###/" class='title'>后台管理系统</a>
				</div>
			</div>
		</nav>
		<div class="container panel" ng-app="myapp" ng-controller="mycontroller">
			<div class="panel ">
				<div class="panel-body">
					<!--novalidate去除默认事件-->
					<form class="form-horizontal" novalidate="novalidate" name="myform">
						<div class="form-group">
							<div class="col-sm-4"></div>
							<div class="col-sm-4" style='font-size: 50px;text-align: center;'>登录</div>
						</div>
						<div class="form-group">
							<label for="username" class="col-sm-4 control-label">用户名</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="username" id="username" placeholder="用户名" ng-model="userinfo.username">
							</div>
						</div>
						<div class="form-group">
							<label for="pwd" class="col-sm-4 control-label">密码</label>
							<div class="col-sm-4">
								<input type="password" class="form-control" id="pwd" placeholder="密码" ng-model="userinfo.pwd" name="pwd" ng-required="true">
							</div>
						</div>
						<div class="form-group">
							<div class=" col-sm-4 col-md-offset-4">
								<button type="button" class="btn btn-success" ng-click="sub()" ng-disabled="!myform.$valid">登录</button>
								<button type="button" class="btn btn-danger" ng-click="reset()" ng-disabled="myform.$pristine">重置</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
	<script>
		var app = angular.module('myapp', []);
		app.controller('mycontroller', function($scope, $http) {
			$scope.userinfo = {
				username: '',
				pwd: '',
			}
			$scope.sub = function() {
				//   console.log($scope.userinfo);
				var str = 'username=' + $scope.userinfo.username + '&pwd=' + $scope.userinfo.pwd;
				console.log(str);
				// 向数据库发送数据
				$http({
					method: "post",
					headers: {
						"Content-Type": "application/x-www-form-urlencoded"
					},
					url: "__APP__/index/admin",
					data: str
				}).success((res) => {
					console.log(res);
					if(res.status == 1) {
						alert('登录成功！');
						$scope.reset();
						setTimeout("location.href='__APP__/index/'", 100);
					} else {
						alert('用户名或密码错误!!');
						$scope.reset();
					}
				}).error((err) => {
					console.log(err);
				})

			}
			$scope.reset = function() {
				$scope.userinfo = {
					username: '',
					pwd: '',
				}
				$scope.myform.$setPristine();
			}
		})
	</script>

</html>