$(document).ready(function(){
	var app =angular.module('myapp',[]);
	app.controller('mycontroller',function ($scope,$http) {
        
    })
})
//↓头部导航条右边效果
$(".top_bar .ufr .menu").mouseover(function() {
	$(this).css({
		"background": "white"
	});
	$(this).children().eq(0).children().eq(0).hide();
	$(this).children().eq(0).children().eq(2).css({"transform":"rotate(180deg)"});
	$(this).children().eq(1).show();
	$(this).children().eq(1).children().eq(0).show();
})
$(".top_bar .ufr .menu").mouseout(function() {
	$(this).css({
		"background": ""
	});
	$(this).children().eq(0).children().eq(0).show();
	$(this).children().eq(0).children().eq(2).css({"transform":""});
	$(this).children().eq(1).hide();
	$(this).children().eq(1).children().eq(0).show();
})

$(".top_bar .ufr .koudai").mouseover(function() {
	$(this).css({
		"background": "white"
	});
	$(this).children().eq(0).children().eq(0).hide();
	$(this).children().eq(0).children().eq(3).css({"transform":"rotate(180deg)"});
	$(this).children().eq(1).show();
})
$(".top_bar .ufr .koudai").mouseout(function() {
	$(this).css({
		"background": ""
	});
	$(this).children().eq(0).children().eq(0).show();
	$(this).children().eq(0).children().eq(3).css({"transform":""});
	$(this).children().eq(1).hide();
})